<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TherapistDoesTherapy */

$this->title = 'Create Therapist Does Therapy';
?>
<div class="therapist-does-therapy-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'ddTherapies' => $ddTherapies,
    ]) ?>
<?php

?>
    
    
</div>
