<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Therapy */

$this->title = 'Create Therapy';
?>
<div class="therapy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
