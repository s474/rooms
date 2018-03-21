<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RoomSupportsTherapy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-supports-therapy-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'room_id')->hiddenInput()->label(false); ?>
    
    <?= $form->field($model, 'therapy_id')->dropdownList($ddTherapies,['prompt'=>'Select Therapy']); ?>   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
