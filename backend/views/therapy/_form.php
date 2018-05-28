<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $model common\models\Therapy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapy-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php      
        if (\Yii::$app->user->can('super')) {
            echo $form->field($model, 'company_id')->dropdownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'),['prompt'=>'Select Company']); 
        } else {
            echo $form->field($model, 'company_id')->hiddenInput()->label(false);          
        }        
    ?>    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'needs_special_room')->DropDownList(['0' => 'No', '1' => 'Yes']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
