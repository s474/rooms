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
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        
        <section class="sidebar">            
        <?php
            echo \kartik\datetime\DateTimePicker::widget([
                'type' => 4,
                //'readonly' => true,                
                'name' => 'datetime_10',
                'options' => ['placeholder' => 'Select operating time ...'],
                'convertFormat' => true,
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
                    'changeDate' => 'function(e) {  console.log(e); }',
                    'changeYear' => 'function(e) {  console.log(e); }',
                    'changeMonth' => 'function(e) {  console.log(e); }',
                ],                
            ]);
        ?>
        </section>
        
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],

                'items' => [
                    
                    
                    //['label' => 'Home', 'url' => ['/site/index']],
                    
                    /*
                    ['label' => 'Appointments', 'url' => ['/appointment/calendar'], 'items' => [
                        ['label' => 'Calendar', 'url' => ['/appointment/calendar']],
                        ['label' => 'Grid', 'url' => ['/appointment/index']],
                    ]],
                    */
                    
                    ['label' => 'Appointments', 'icon' => 'calendar', 'url' => ['/appointment/index']],
                    ['label' => 'Rooms', 'icon' => 'building-o', 'url' => ['/room/index']],
                    ['label' => 'Therapists', 'icon' => 'address-card-o', 'url' => ['/therapist/index']],  
                    ['label' => 'Therapies', 'icon' => 'plus-square', 'url' => ['/therapy/index']],
                    ['label' => 'Prices', 'icon' => 'gbp', 'url' => ['/therapy-price/index']],        
                    ['label' => 'Clients', 'icon' => 'address-book-o', 'url' => ['/client/index']],                    
                    
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
