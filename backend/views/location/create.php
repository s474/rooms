<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Location */

$this->title = 'Create Location';
?>
<div class="location-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
