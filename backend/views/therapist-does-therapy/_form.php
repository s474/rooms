<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Therapy;

/* @var $this yii\web\View */
/* @var $model common\models\TherapistDoesTherapy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="therapist-does-therapy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'therapist_id')->hiddenInput()->label(false); ?>

    
<?php

    $items = Therapy::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();
?>
    
    <?= $form->field($model, 'therapy_id')->dropdownList($items,['prompt'=>'Select Therapy']); ?>   
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
