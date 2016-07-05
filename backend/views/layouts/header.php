<?php
use yii\helpers\Html;
use common\models\Notificacion;
use common\models\Usuario;
/* @var $this \yii\web\View */
/* @var $content string */

$notifyUnread = Notificacion::find()
    ->where(['status' => Notificacion::STATUS_UNREAD])
    ->count();
$notify = Notificacion::find()
    ->where(['status' => Notificacion::STATUS_UNREAD])
    ->all();
$tam = count($notify);
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="label label-success"><?= $notifyUnread ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes <?= $notifyUnread ?> notificaciones no leidas</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                    if($notifyUnread != 0){
                                        for ($i = 0; $i<$tam; $i++){
                                        ?><li><!-- start message -->
                                            <a>
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle"
                                                         alt="User Image"/>
                                                </div>
                                                <h4>
                                                    <?php
                                                        $nombre = Usuario::find()
                                                            ->select('nombre')
                                                            ->where(['id' => $notify[$i]->idUsuario])
                                                            ->limit(1)->all();
                                                        echo $nombre[0]->nombre
                                                    ?>
                                                </h4>
                                                <p><?= substr($notify[$i]->descripcion, 0, 29) ?></p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <?php
                                        }
                                    }else{
                                        ?><li ><!-- start message -->

                                                    <h4 align="center">
                                                        No tienes notificaciones.
                                                    </h4>


                                            </li>
                                            <!-- end message -->
                                        <?php
                                    }

                                ?>

                            </ul>
                        </li>
                        <li class="footer"><a href="http://localhost/tocomocho_admin/admin/notificacion">Ver todas las notificaciones</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/avatar5.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->nombre ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo Yii::$app->user->identity->nombre?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Cerrar Sesión',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>
</header>
