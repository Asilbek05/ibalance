<?php
use kartik\select2\Select2;
use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Output $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="output-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => Category::OutputSelected($model),
        'options' => ['placeholder' => 'Select category'],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
