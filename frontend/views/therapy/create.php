<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Therapy */

$this->title = 'Create Therapy';
$this->params['breadcrumbs'][] = ['label' => 'Therapies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
