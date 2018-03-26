<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Blorp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blorp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
