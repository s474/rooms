<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$DragJS = <<<EOF
/* initialize the external events
-----------------------------------------------------------------*/
$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });
});             
EOF;

$this->registerJs($DragJS);

$this->title = 'Appointments';

$JSCode = <<<EOF
function(start, end) {
    console.log('JSCode');
    var title = prompt('Event Title:');
    var eventData;
    if (title) {
        eventData = {
            title: title,
            start: start,
            end: end
        };
        $('#w1').fullCalendar('renderEvent', eventData, true);
    }
    $('#w1').fullCalendar('unselect');
}
EOF;
$JSDropEvent = <<<EOF
function(date) {
    alert("Dropped on " + date.format());
    if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
    }
}
EOF;
$JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    alert('Event: ' + calEvent.title);
    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
    alert('View: ' + view.name);
    // change the border color just for fun
    $(this).css('border-color', 'red');
}
EOF;
$JSDragStart = <<<EOF
function(event, jsEvent, ui, view) {
    console.log(event);
}
EOF;
?>


<div class="appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'room.location.name',
            'room.name',
            'therapist.name',
            'client.name',
            'therapy.name',
            'start:datetime',
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

<?= \yii2fullcalendar\yii2fullcalendar::widget([
        'clientOptions' => [
            //'selectable' => true,
            //'selectHelper' => true,
            'droppable' => true,
            'editable' => true,
            'drop' => new JsExpression($JSDropEvent),
            'select' => new JsExpression($JSCode),
            'eventClick' => new JsExpression($JSEventClick),
            'eventDragStart' => new JSExpression($JSDragStart),
            'defaultDate' => date('Y-m-d'),
            //'weekends' => false
        ],        
        'options' => [
            //'lang' => 'fr',
            //... more options to be defined here!
        ],
        'events' => Url::to(['appointment/json-calendar'])
    ]);
?>

<!--
<div id="external-events">
    <h4>Draggable Events</h4>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
    <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
    <p>
        <input type="checkbox" id="drop-remove">
        <label for="drop-remove">remove after drop</label>
    </p>
</div>
-->
