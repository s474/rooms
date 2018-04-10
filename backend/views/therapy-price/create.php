<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */

$this->title = 'Create Therapy Price';
$this->params['breadcrumbs'][] = ['label' => 'Therapy Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapy-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
