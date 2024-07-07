<?php

namespace common\models;

use Symfony\Component\VarDumper\Cloner\Data;
use Yii;

/**
 * This is the model class for table "input".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $cost
 * @property int $category_id
 * @property string|null $description
 * @property string|null $created_at
 *
 * @property Category $category
 * @property User $user
 */
class Input extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'input';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id'], 'required'],
            [['user_id', 'category_id'], 'integer'],
            [['cost'],'number'],
            [['created_at'], 'safe'],
            [['created_at'], 'default', 'value' => date("m")],
            [['description'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'cost' => 'Cost',
            'category_id' => 'Category name',
            'description' => 'Description',
            'created_at' => 'Month number',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
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
    public static function getCost(){
        $month = date('m') -1;
        $params = [];
        $user_id = Yii::$app->user->identity->getId();
        $sql = 'SELECT SUM(cost) AS kirim
        FROM input
        Where  ';
        $sql .= 'user_id = :user_id';
        $params[':user_id'] = $user_id;
        $sql .= ' and created_at = :created_at';
        $params[':created_at'] = $month;
        $data = Yii::$app->getDb()->createCommand($sql, $params)->queryAll();
        return $data;
    }
    public static function MonthCost($month){
        $params = [];
        $user_id = Yii::$app->user->identity->getId();
        $sql = 'SELECT SUM(cost) AS kirim
        FROM input
        Where ';

        $sql .= 'user_id = :user_id';
        $params[':user_id'] = $user_id;
        $sql .= ' and created_at = :created_at';
        $params[':created_at'] = $month;
        $data = Yii::$app->getDb()->createCommand($sql, $params)->queryAll();
        return $data;
    }
}
