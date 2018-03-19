<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Therapist */

$this->title = 'Update Therapist: ' . $model->name;
?>
<div class="therapist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
