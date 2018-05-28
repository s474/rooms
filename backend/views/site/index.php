<?php

/* @var $this yii\web\View */

$this->title = '';
?>      

<h2>Admin area</h2>

<p>Hello <?= Yii::$app->user->identity->username; ?></p>

<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Default Box Example</h3>
<div class="box-tools pull-right">
<!-- Buttons, labels, and many other things can be placed here! -->
<!-- Here is a label for example -->
<span class="label label-primary">Label</span>
</div>
<!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body">
The body of the box
</div>
<!-- /.box-body -->
<div class="box-footer">
The footer of the box
</div>
<!-- box-footer -->
</div>
<!-- /.box -->

<?php
/*
var_dump(\Yii::$app->authManager->checkAccess(Yii::$app->user->id,'adminViewAppointment'));
var_dump(\Yii::$app->authManager->checkAccess(Yii::$app->user->id,'administrator'));
var_dump(\Yii::$app->user->can('adminViewAppointments'));
var_dump(\Yii::$app->user->can('administrator'));
var_dump(\Yii::$app->user->can('super'));
var_dump(Yii::$app->user);
 * 
 */
var_dump($adminAccs);
var_dump($therapistAccs);
var_dump($clientAccs);

?>

