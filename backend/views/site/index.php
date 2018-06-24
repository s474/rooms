<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Admin area';
?>      
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
            <p>Hello <b><?= Yii::$app->user->identity->username; ?></b>, you have the following accounts...</p>
            <br />
            <?php
            foreach($adminAccs as $adminAcc) {
                echo '<div class="switchSessionBtn">' . 
                    Html::a($adminAcc->company->name . ' Administrator', ['switch-session', 'id' => $adminAcc->id, 'type'=>'Administrator'], ['class' => 'btn btn-success']) . '</div>';
            }
            foreach($therapistAccs as $therapistAcc) {
                echo '<div class="switchSessionBtn">' . 
                    Html::a($therapistAcc->company->name . ' Therapist', ['switch-session', 'id' => $therapistAcc->id, 'type'=>'Therapist'], ['class' => 'btn btn-success']) . '</div>';
            }
            foreach($clientAccs as $clientAcc) {
                echo '<div class="switchSessionBtn">' . 
                    Html::a($clientAcc->company->name . ' Client', ['switch-session', 'id' => $clientAcc->id, 'type'=>'Client'], ['class' => 'btn btn-success']) . '</div>';
            }
            ?>                          
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>
