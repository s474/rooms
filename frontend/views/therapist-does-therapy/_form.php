<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TherapistDoesTherapy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapist-does-therapy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'therapist_id')->textInput() ?>

    <?= $form->field($model, 'therapy_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
