<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Blorp */

$this->title = 'Create Blorp';
$this->params['breadcrumbs'][] = ['label' => 'Blorps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blorp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
