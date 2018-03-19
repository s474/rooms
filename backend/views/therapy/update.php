<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Therapy */

$this->title = 'Update Therapy: ' . $model->name;
?>
<div class="therapy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
