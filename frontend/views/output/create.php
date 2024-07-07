<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Output $model */

$this->title = Yii::t('app', 'Create output');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Output'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="output-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
