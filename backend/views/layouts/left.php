<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->nombre ?></p>
            </div>
        </div>

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

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Tocomocho', 'options' => ['class' => 'header']],
                    ['label' => 'Inicio', 'icon' => 'fa fa-home', 'url' => ['/']],
                    ['label' => 'Usuarios', 'icon' => 'fa fa-users', 'url' => ['/usuario']],
                    ['label' => 'Vehiculos', 'icon' => 'fa fa-car', 'url' => ['/vehiculo']],
                    ['label' => 'Reseñas', 'icon' => 'fa fa-comments', 'url' => ['/resenia']],
                    ['label' => 'Iniciar Sesión', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Notificaciones',
                        'icon' => 'fa fa-bell',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Principal', 'icon' => 'fa fa-inbox', 'url' => ['/notificacion'],],
                            ['label' => 'Borrados', 'icon' => 'fa fa-dashboard', 'url' => ['/notificacion/basura'],],

                        ],
                    ],
                    ['label' => 'Otros', 'options' => ['class' => 'header']],
                    ['label' => 'Volver a Tocomocho', 'icon' => 'fa  fa-level-up', 'url' => ['../']],
                    ['label' => 'Acerca de', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['../site/about']],
                ],


            ]
        ) ?>

    </section>

</aside>
