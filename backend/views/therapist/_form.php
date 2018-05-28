<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Therapist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->dropdownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'),['prompt'=>'Select Company']); ?>
    
    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
