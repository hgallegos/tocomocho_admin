<?php

/* @var $this yii\web\View */


use common\models\Usuario;

$this->title = 'Tocomocho';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');


?>
<div class="site-index">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">
                        <?= $numberOfUsers ?>
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-yellow"><i class="fa fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reseñas</span>
                    <span class="info-box-number">
                        <?= $numberOfReviews ?>
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-bell"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Notificaciones</span>
                    <span class="info-box-number">
                        <?= $numberOfNotify ?>
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-red"><i class="fa fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Vehículos</span>
                    <span class="info-box-number">
                        <?= $numberOfCars ?>
                    </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Últimos usuarios registrados</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="users-list clearfix">
                        <?php $tam = count($lastUsers);
                            for ($i = 0; $i<$tam; $i++){
                                ?><li>
                                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image" />
                                    <span class="users-list-name"><?= $lastUsers[$i]->nombre ?></span>
                                    <span class="users-list-date"><?= $lastUsers[$i]->email ?></span>
                                </li><?php
                            }
                        ?>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-4">
            <!-- Construct the box with style you want. Here we are using box-danger -->
            <!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
            <!-- The contextual class should match the box, so we are using direct-chat-danger -->
            <div class="box box-danger direct-chat direct-chat-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Últimas reseñas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <?php $tam = count($lastReviews);
                            $par = 2;
                            for ($i=0; $i<$tam; $i++){
                                $nombre = Usuario::find()
                                    ->select('nombre')
                                    ->where(['id' => $lastReviews[$i]->idUsuario])
                                    ->limit(1)->all();
                                if($par%2 != 0){
                                    ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"><?= $nombre[0]->nombre ?></span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="<?= $directoryAsset ?>/img/avatar5.png" alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?= $lastReviews[$i]->contenido ?>
                                        </div><!-- /.direct-chat-text -->
                                    </div><!-- /.direct-chat-msg -->
                                    <?php
                                }else{
                                    ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right"><?= $nombre[0]->nombre ?></span>
                                        </div><!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="<?= $directoryAsset ?>/img/avatar5.png" alt="message user image"><!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            <?= $lastReviews[$i]->contenido ?>
                                        </div><!-- /.direct-chat-text -->
                                    </div><!-- /.direct-chat-msg -->
                                    <?php

                                }
                                $par++;
                            }


                        ?>



                    </div><!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="Contact Avatar">
                                    <div class="contacts-list-info">
              <span class="contacts-list-name">
                Count Dracula
                <small class="contacts-list-date pull-right">2/28/2015</small>
              </span>
                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                    </div><!-- /.contacts-list-info -->
                                </a>
                            </li><!-- End Contact Item -->
                        </ul><!-- /.contatcts-list -->
                    </div><!-- /.direct-chat-pane -->
                </div><!-- /.box-body -->
                
            </div><!--/.direct-chat -->
        </div>
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Últimos vehículos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table-hover">
                        <tbody>
                            <tr>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[0]->nomImagen ?>"  width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[0]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[0]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[1]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[1]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[1]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[2]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[2]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[2]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[3]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[3]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[3]->modelo,0,15); ?></span>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[4]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[4]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[4]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[5]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[5]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[5]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[6]->nomImagen ?>" width="120" height="85"  alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[6]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[6]->modelo,0,15); ?></span>
                                </th>
                                <th class="text-center">
                                    <img src="http://tocomocho.site/images/<?= $lastCars[7]->nomImagen ?>" width="120" height="85" alt="User Image" />
                                    <span class="users-list-name"><?= $lastCars[7]->marca ?></span>
                                    <span class="users-list-date"><?= substr($lastCars[7]->modelo,0,15); ?></span>
                                </th>
                            </tr>
                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
