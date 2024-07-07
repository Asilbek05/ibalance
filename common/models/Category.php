<?php

namespace common\models;

use Symfony\Component\Finder\Finder;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property int|null $type
 *
 * @property Input[] $inputs
 * @property Output[] $outputs
 * @property User $user
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Inputs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInputs()
    {
        return $this->hasMany(Input::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Outputs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOutputs()
    {
        return $this->hasMany(Output::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public static function InputSelected()
    {
        $user_id = Yii::$app->user->identity->getId();
        $model = self::find()->andwhere('type = 1')->andWhere(['user_id' => $user_id])->all();
        return ArrayHelper::map($model, 'id', 'name');
    }
    public static function OutputSelected()
    {
        $user_id = Yii::$app->user->identity->getId();
        $model = self::find()->andwhere('type = 2')->andWhere(['user_id' => $user_id])->all();
        return ArrayHelper::map($model,'id','name');
    }
}
