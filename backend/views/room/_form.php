<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model common\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'name')->textInput() ?>    
   
    <?= $form->field($model, 'location_id')->dropDownList(
            ArrayHelper::map(common\models\Location::find()->all(),'id','name'),
            ['prompt'=>'Select Location']
        );
    ?>
    
    <?= $form->field($model, 'colour')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select colour ...'],
        ]);
    ?>
    
    <div class="form-group">        
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
