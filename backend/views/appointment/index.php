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
      minTime: '08:00:00',
      maxTime: '18:00:00',
      slotDuration: '00:30:00',
      contentHeight: 'auto',
      editable: false,
      selectable: true,
      eventLimit: true, // allow "more" link when too many events
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',           
      header: {
        //left: 'prev,next today',
        //center: 'title',
        left: 'title',
        right: 'agendaDay,agendaTwoDay,agendaWeek,month'
        //right: 'agendaDay,agendaTwoDay'
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
      allDaySlot: false,                
             
      resources: '$resourcesJsonUrl',        
      events: '$eventsJsonUrl',  

      select: function(start, end, jsEvent, view, resource) {
        
        /*
        console.log(
          'select',
          start.format(),
          end.format(),
          resource ? resource.id : '(no resource)'
        );
        */
        
        window.location.href = "index.php?r=appointment%2Fcreate";
      },
        
      dayClick: function(date, jsEvent, view, resource) {
        console.log(
          'dayClick',
          date.format(),
          resource ? resource.id : '(no resource)'
        );
      },
        
      eventClick: function(calEvent, jsEvent, view) {

        //alert('Event: ' + calEvent.title);
        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //alert('View: ' + view.name);

        // change the border color just for fun
        //$(this).css('border-color', 'red');
        
        //console.log(calEvent);
        //console.log(jsEvent);
        //console.log(view);
        
        window.location.href = "index.php?r=appointment%2Fupdate&id=" + calEvent.id;
      },        
        
    });
  
  });            
EOF;
$this->registerJs($schedulerJS);

$this->title = 'Appointments';
?>

<div class="appointment-index">
        
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>        
   
    
    <div id='calendar'></div>
     
    <br />
    
    <!--
    <div class="box">
        
        <div class="box-header with-border">
            <h3 class="box-title">Appointment Grid</h3>
            <div class="box-tools pull-right">                
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>         
        
        
        <div class="box-body">
             
            <?php 
                /*
                echo GridView::widget([
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
                        'therapyPrice.therapy.name',
                        //'therapyPrice.description',                        
                        'room.name',
                        [
                            'label' => '',
                            'attribute' => 'room.colour',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return '<div style="width: 25px; height: 20px; border: solid 1px #222; background-color:' . $data->room->colour . '"></span>';
                            },
                        ],
                        'room.location.name',            
                        'therapyPrice.minutes_duration',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                 * 
                 */
                        
            ?>
       
        </div>        
        <div class="box-footer">
        </div>
    </div>
    -->
    
    <p><?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?></p>        
    
</div>
