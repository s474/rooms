<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"> </span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>        
        
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <?php
                
                    if (Yii::$app->user->isGuest) {
                        echo '<li>' . Html::a('Sign up', ['/user/registration/register']) . '</li>';
                        echo '<li>' . Html::a('Log in ', ['/user/security/login']) . '</li>';
                    } else {
                        if (Yii::$app->session->get('rms_id'))
                            echo '<li>' . Html::a('RMSID (' . Yii::$app->session->get('rms_id') . ')', ['site/index']) . '</li>';
                        echo '<li>' . Html::a('Logout (' . Yii::$app->user->identity->username . ')', ['/user/security/logout'], ['data-method' => 'POST']) . '</li>'; 
                    }                                

                ?>                
                                
                <li>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
