<?php

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

<div id='calendar'></div>
