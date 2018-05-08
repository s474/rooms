<aside class="main-sidebar">

    <section class="sidebar">
        
        <!-- Sidebar user panel -->
        <!--
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        -->
        
        <!-- search form -->
        <!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        -->
        <!-- /.search form -->
        
        <?php
            
            /*
            if (in_array($this->context->module->requestedRoute,[
                'appointment/index',
                'room/index',
                'therapist/index',
                ])) {
            
             * 
             */ 
                echo '<div class="sidebar-calendar">';
                echo \kartik\datetime\DateTimePicker::widget([
                    'type' => 4,                                    
                    'name' => 'datetime_sidebar',
                    'options' => ['placeholder' => 'Select operating time ...'],
                    'convertFormat' => true,
                    //'readonly' => true,                    
                    'pluginOptions' => [
                        'format' => 'd-M-Y g:i A',
                        'startDate' => '01-Mar-2014 12:00 AM',
                        'todayHighlight' => true,
                        'minView' => '2',                                                
                    ],
                    'pluginEvents' => [
                        'show' => 'function(e) {  console.log(e); }',
                        'hide' => 'function(e) {  console.log(e); }',
                        'clearDate' => 'function(e) {  console.log(e); }',
                        'changeDate' => 'function(e) { $("#calendar").fullCalendar("gotoDate", e.date); }',
                        'changeYear' => 'function(e) {  console.log($("#calendar")); }',
                        'changeMonth' => 'function(e) {  console.log(e); }',
                    ],                
                ]); 
                echo '</div>';

            //}
        ?>

               
        <span style="background-color:white;"><?php //var_dump(\Yii::$app->user)?></span>
        
        
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [                    
                    [
                        'label' => 'Companies', 
                        'icon' => 'server', 
                        'url' => ['/company/index'], 
                        'visible' => \Yii::$app->user->can('editCompany')
                    ],
                    [
                        'label' => 'Users', 
                        'icon' => 'users', 
                        'url' => ['/user/admin/index'], 
                        'visible' => \Yii::$app->user->can('super')
                    ],
                    [
                        'label' => 'Appointments', 
                        'icon' => 'calendar', 
                        'url' => ['/appointment/index'], 
                        'visible' => \Yii::$app->user->can('viewAppointment')
                    ],
                    [
                        'label' => 'Rooms', 
                        'icon' => 'building-o', 
                        'url' => ['/room/index'], 
                        'visible' => \Yii::$app->user->can('viewRoom')
                    ],
                    [
                        'label' => 'Administrators', 
                        'icon' => 'address-card-o', 
                        'url' => ['/administrator/index'], 
                        'visible' => \Yii::$app->user->can('viewAdministrator')
                    ],                    
                    [
                        'label' => 'Clients', 
                        'icon' => 'address-card-o', 
                        'url' => ['/client/index'], 
                        'visible' => \Yii::$app->user->can('viewClient')
                    ],                    
                    [
                        'label' => 'Therapists', 
                        'icon' => 'address-card-o', 
                        'url' => ['/therapist/index'], 
                        'visible' => \Yii::$app->user->can('viewTherapist')
                    ],  
                    [
                        'label' => 'Therapies', 
                        'icon' => 'plus-square', 
                        'url' => ['/therapy/index'], 
                        'visible' => \Yii::$app->user->can('viewTherapy')
                    ],
                    [
                        'label' => 'Prices', 
                        'icon' => 'gbp', 
                        'url' => ['/therapy-price/index'], 
                        'visible' => \Yii::$app->user->can('viewTherapyPrice')
                    ],                            
                    
                    /*                                        
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],                    
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                     * 
                     */

                ],
            ]
        ) ?>

    </section>

</aside>
