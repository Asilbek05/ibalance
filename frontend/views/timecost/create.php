<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TimeCost $model */

$this->title = Yii::t('app', 'Create Time Cost');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Time Costs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-cost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
