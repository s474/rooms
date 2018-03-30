<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'room.name',
            'therapist.name',
            'client.name',
            'therapy.name',
            'appt_date:datetime',
            'minutes_duration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<br />
<br />

<?php

$events = array();
//Testing
$Event = new \yii2fullcalendar\models\Event();
$Event->id = 1;
$Event->title = 'Testing';
$Event->start = date('Y-m-d\TH:i:s\Z');
$event->nonstandard = [
    'field1' => 'Something I want to be included in object #1',
    'field2' => 'Something I want to be included in object #2',
];
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 2;
$Event->title = 'Testing';
$Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
$events[] = $Event;

?>

<?= \yii2fullcalendar\yii2fullcalendar::widget([
      'options' => [
        'lang' => 'fr',
        //... more options to be defined here!
      ],
      'events' => Url::to(['appointment/jsoncalendar'])
    ]);
?>
