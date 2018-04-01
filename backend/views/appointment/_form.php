<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Room;
use common\models\Therapist;
use common\models\Therapy;
use common\models\Client;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>
            
    <?= $form->field($model, 'room_id')->dropdownList(ArrayHelper::map(Room::find()->all(), 'id', 'name'),['prompt'=>'Select Room']); ?>
    
    <?= $form->field($model, 'therapist_id')->dropdownList(ArrayHelper::map(Therapist::find()->all(), 'id', 'name'),['prompt'=>'Select Therapist']); ?>

    <?= $form->field($model, 'therapy_id')->dropdownList(ArrayHelper::map(Therapy::find()->all(), 'id', 'name'),['prompt'=>'Select Therapy']); ?>
    
    <?= $form->field($model, 'client_id')->dropdownList(ArrayHelper::map(Client::find()->all(), 'id', 'name'),['prompt'=>'Select Client']); ?>   
    
    <?= $form->field($model, 'start')->widget(
            DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                ],                
            ]); ?>    
    
    <?= $form->field($model, 'minutes_duration')->dropdownList(['15'=>'15','30'=>'30','45'=>'45','60'=>'60'],['prompt'=>'Select Duration']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
