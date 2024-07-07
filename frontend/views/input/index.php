<?php

use common\models\Category;
use common\models\Input;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\InputSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Input');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create input'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'cost',
                'value' => function($data){
                    return  number_format($data->cost, 2, ',', ' ');
                }
            ],
            [
                'attribute' => 'category_id',
                'value'=>function($data){
                    return $data->category->name;
                },
                'filter' => Category::InputSelected()
            ],
            'description',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Input $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
