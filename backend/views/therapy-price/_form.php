<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapy-price-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'therapy_id')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'minutes_duration')->textInput() ?>    
    
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>       

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
