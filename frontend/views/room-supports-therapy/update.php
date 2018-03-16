<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\RoomSupportsTherapy */

$this->title = 'Update Room Supports Therapy: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Room Supports Therapies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-supports-therapy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
