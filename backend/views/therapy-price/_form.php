<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapy-price-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
    
        if ($from_therapy == '1') {
            echo '111' . $form->field($model, 'therapy_id')->hiddenInput()->label(false);
        } else { 
            echo '222' . $form->field($model, 'therapy_id')->dropdownList($ddTherapies,['prompt'=>'Select Therapy']);
        }
    ?>

    <?= $form->field($model, 'minutes_duration')->textInput() ?>    
    
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>       

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= "from_therapy = " . $from_therapy; ?>