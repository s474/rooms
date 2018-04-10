<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use common\assets\SchedulerAsset;
SchedulerAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$calenderJsonUrl = Url::to(['appointment/json-calendar']);

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

      resources: [
        { id: '1', title: 'Room A' },
        { id: '2', title: 'Room B', eventColor: 'green' },
        { id: '3', title: 'Room C', eventColor: 'orange' },
        { id: '4', title: 'Room D', eventColor: 'red' }
      ],
                
      events: '$calenderJsonUrl',  

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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div id='calendar'></div>    
    
    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'room_id',
            'therapist_id',
            'client_id',
            'therapy_id',
            //'timestamp:datetime',
            //'minutes_duration',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
