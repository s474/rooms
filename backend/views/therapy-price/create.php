<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TherapyPrice */

$this->title = 'Create Price';
?>
<div class="therapy-price-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="box">                
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>            
            <div class="box-tools pull-right">
                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>                
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
                'from_therapy' => $from_therapy,
                'ddTherapies' => $ddTherapies,
            ]) ?>
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>

</div>
