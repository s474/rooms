<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TherapistDoesTherapy */

$this->title = 'Create Therapist Does Therapy';
$this->params['breadcrumbs'][] = ['label' => 'Therapist Does Therapies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapist-does-therapy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
