<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RoomSupportsTherapy */

$this->title = 'Create Room Supports Therapy';
?>
<div class="room-supports-therapy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ddTherapies' => $ddTherapies,
    ]) ?>

</div>
