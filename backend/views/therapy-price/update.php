<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */

$this->title = 'Update Price';
?>
<div class="therapy-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'from_therapy' => $from_therapy,
        'ddTherapies' => $ddTherapies,
    ]) ?>

</div>
