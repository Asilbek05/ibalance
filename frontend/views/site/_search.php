<?php

use common\models\Clases;
use common\models\Courses;
use common\models\SubjectsCourse;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;

?>
<div class="salary-search">

    <?php 
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    
    <div class="row">
        <div class="col-lg-4">
        <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Boshlanish sanasi ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>
        </div>
        <div class="col-lg-4">
        <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Tugash sanasi ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', '<i class="bx bx-search-alt" ></i>  Qidirish'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 30px']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<hr>