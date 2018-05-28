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

    <?= $form->field($model, 'company_id')->dropdownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'),['prompt'=>'Select Company']); ?>
    
    <?= $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>'Select User']); ?>

    <?= $form->field($model, 'colour')->widget(ColorInput::classname(), [
            'options' => ['placeholder' => 'Select colour ...'],
        ]);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>