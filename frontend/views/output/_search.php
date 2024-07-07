<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var common\models\OutputSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="output-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-3">
            <?=DateTimePicker::widget([
                    'name' => '',

                    'options' => [
                            'placeholder' => 'End Date Time',
                            'autocomplete' => 'off'
                            ],
                    'convertFormat' => false,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:i:ss',
                        'startDate' => '01-Mar-2014 12:00 AM',
                        'todayHighlight' => true,

                    ]
                ]); ?>
        </div>

        <div class="col-lg-3">
            <?=  DateTimePicker::widget([
                    'name' => 'datetime_11',

                    'options' => [
                            'placeholder' => 'End Date Time',
                            'autocomplete' => 'off'
                            ],
                    'convertFormat' => false,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd hh:i:ss',
                        'startDate' => '01-Mar-2014 12:00 AM',
                        'todayHighlight' => true,

                    ]
                ]); ?>
        </div>
        <div class="col-lg-6">
            <?php  echo $form->field($model, 'cost')->textInput();?>
        </div>
    
    </div>
    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
