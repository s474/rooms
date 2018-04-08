<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * fullcalendar-scheduler asset bundle.
 */
class SchedulerAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'rooms/common/web/css/fullcalendar-scheduler/fullcalendar.min.css',
        'rooms/common/web/css/fullcalendar-scheduler/scheduler.min.css',
    ];
    public $js = [
        'rooms/common/web/js/fullcalendar-scheduler/moment.min.js',
        'rooms/common/web/js/fullcalendar-scheduler/fullcalendar.min.js',
        'rooms/common/web/js/fullcalendar-scheduler/scheduler.js',      
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
