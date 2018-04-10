<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use common\assets\SchedulerAsset;
SchedulerAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$resourcesJsonUrl = Url::to(['room/fullcaldendar-resources']);
$eventsJsonUrl = Url::to(['appointment/fullcaldendar-events']);

$schedulerJS = <<<EOF
  $(function() { // document ready

    $('#calendar').fullCalendar({
      defaultView: 'agendaDay',
      businessHours: true,  
      editable: true,
      selectable: true,
      eventLimit: true, // allow "more" link when too many events
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',           
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaDay,agendaTwoDay,agendaWeek,month'
      },            
      views: {
        agendaTwoDay: {
          type: 'agenda',
          duration: { days: 2 },

          // views that are more than a day will NOT do this behavior by default
          // so, we need to explicitly enable it
          groupByResource: true

          //// uncomment this line to group by day FIRST with resources underneath
          //groupByDateAndResource: true
        }
      },
        
      //// uncomment this line to hide the all-day slot
      //allDaySlot: false,                
             
      resources: '$resourcesJsonUrl',        
      events: '$eventsJsonUrl',  

      select: function(start, end, jsEvent, view, resource) {
        console.log(
          'select',
          start.format(),
          end.format(),
          resource ? resource.id : '(no resource)'
        );
      },
        
      dayClick: function(date, jsEvent, view, resource) {
        console.log(
          'dayClick',
          date.format(),
          resource ? resource.id : '(no resource)'
        );
      }
        
    });
  
  });            
EOF;
$this->registerJs($schedulerJS);

$this->title = 'Appointments';
?>

<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'start:datetime',
            [
                'attribute' => 'start',
                'format' => 'raw',
                'value' => function ($data) {
                    //return Html::a(Yii::$app->formatter->asDatetime($data->start), ['appointment/update', 'id' => $data->id]);
                    return Html::a(date('D jS M g:i A',strtotime($data->start)), ['appointment/update', 'id' => $data->id]);
                },
            ],            
            'therapist.name',
            'client.name',
            'therapy.name',
            'room.name',   
            'room.location.name',            
            'minutes_duration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>

<br />
<br />

<div id='calendar'></div>
