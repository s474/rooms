<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Administrator */

$this->title = 'Update Administrator';
?>
<div class="administrator-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
