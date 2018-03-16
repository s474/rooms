<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Therapist */

$this->title = 'Update Therapist: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Therapists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="therapist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
