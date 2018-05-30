<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Company;
use common\models\User;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model common\models\Administrator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php      
        if (\Yii::$app->user->can('super')) {
            echo $form->field($model, 'company_id')->dropdownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'),['prompt'=>'Select Company']); 
            echo $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>'Select User']);
        } else {
            echo $form->field($model, 'company_id')->hiddenInput()->label(false);
            echo $form->field($model, 'user_id')->hiddenInput()->label(false);  
            
            echo $form->field($user, 'first_name')->textInput(['maxlength' => true]);
            echo $form->field($user, 'last_name')->textInput(['maxlength' => true]);
        }        
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
