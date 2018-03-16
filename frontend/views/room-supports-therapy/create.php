<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\RoomSupportsTherapy */

$this->title = 'Create Room Supports Therapy';
$this->params['breadcrumbs'][] = ['label' => 'Room Supports Therapies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-supports-therapy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
