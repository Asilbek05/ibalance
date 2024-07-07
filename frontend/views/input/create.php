<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Input $model */

$this->title = Yii::t('app', 'Create input');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'input'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
