<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Client */

$this->title = 'Create Client';
?>
<div class="client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
