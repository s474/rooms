<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */

$this->title = 'Create Price';
?>
<div class="therapy-price-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'from_therapy' => $from_therapy,
        'ddTherapies' => $ddTherapies,
    ]) ?>

</div>
