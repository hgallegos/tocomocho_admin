<?php
/**
 * Created by PhpStorm.
 * User: MatGastonPCAdmin
 * Date: 04-07-2016
 * Time: 23:50
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2><?= $autoData['marca'] ?> <?= $autoData['modelo'] ?> <?= $autoData["anio"] ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
                    <div class="product_image_container">

                        <img src="http://tocomocho.site/images/<?= $autoData['nomImagen'] ?>" width="240" height="170">

                    </div>

                    <table class="table store_price_table table-condensed  ">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Rating</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $b_hide = true;
                                $valoracion = 0;
                                for($i = 0; $i<sizeof($reviws); $i++){
                                    $valoracion += $reviws[$i]['valoracion'];
                                if($reviws[$i]['idUsuario'] == Yii::$app->user->getId()){
                                    $b_hide = false;
                                }
                            ?>

                        <tr>
                            <td>
                                <a href="../resenia/view?id=<?= $reviws[$i]['idComentario'] ?>" rel="nofollow"><?= $reviws[$i]['nombre'] ?></a>
                            </td>
                            <td>

                                <div style="width: 100px;" title="Calificación" class="star" data-value="4.92" data-rating-url="/stores/56/ratings/">
                                    <img title="Calificación" alt="1" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/star-<?php if($reviws[$i]['valoracion'] >= 1){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="Calificación" alt="2" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/star-<?php if($reviws[$i]['valoracion'] >= 2){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="Calificación" alt="3" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/star-<?php if($reviws[$i]['valoracion'] >= 3){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="Calificación" alt="4" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/star-<?php if($reviws[$i]['valoracion'] >= 4){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="Calificación" alt="5" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/star-<?php if($reviws[$i]['valoracion'] == 5){ echo 'on'; }else{ echo 'off'; } ?>.png">
                                    <input readonly="readonly" value="4.92" name="score" type="hidden">
                                </div>

                            </td>

                            <td>&nbsp;</td>

                        </tr>

                        <?php }
                        if(sizeof($reviws) != 0){
                            $valoracion = $valoracion / sizeof($reviws);
                        }?>
                        </tbody>
                    </table>
                    <?php if($isLogin){ ?>
                    <?php if($b_hide){ ?>
                    <div>
                        <a href="../resenia/create_ver?idVehiculo=<?= $idVehiculo ?>" class="btn btn-primary">
                            ¿Eres dueño?
                            ¡Déjanos tus comentarios!
                        </a>
                    </div>
                        <?php } ?>
                    <div class="row">
                        <div class="option_button col-xs-12">
                            <div class="btn-group">
                                <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                                    Imágen no Corresponde
                                </a>

                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <strong><h4>Datos del Vehículo</h4></strong>
                            <ul class="with_margin_top list-without-decoration-2">
                                <li><strong>Marca:</strong> <?= $autoData['marca']?> </li>
                                <li><strong>Modelo:</strong> <?= $autoData['modelo']?></li>
                                <li><strong>Año:</strong> <?= $autoData['anio']?></li>
                                <li><strong>Tipo:</strong> <?= $autoData['tipo']?></li>
                                <li><strong>ID Fabricante:</strong> <?= $autoData['idMarca']?></li>
                            </ul>
                            <strong><h4>Especificaciones del Modelo</h4></strong>
                            <ul class="with_margin_top list-without-decoration-2">
                                <li><strong>Combustible:</strong> <?php if($autoData['tipoCombustible'] == 'DIES'){ echo 'Diesel';}elseif($autoData['tipoCombustible'] == 'BENC'){ echo 'Bencina'; }else{ echo $autoData['tipoCombustible']; } ?></li>
                                <li><strong>Cilindrada:</strong> <?= $autoData['cilindrada']?></li>
                                <li><strong>Transmisión:</strong> <?php if($autoData['transmision'] == 'MEC'){ echo 'Mecánica';}elseif($autoData['transmision'] == 'AUT'){ echo 'Automática'; }else{ echo $autoData['transmision']; } ?> </li>
                                <li><strong>Puertas:</strong> <?= $autoData['nPuertas']?> </li>
                            </ul>
                            <strong><h4>Comodidad/Seguridad</h4></strong>
                            <ul class="with_margin_top list-without-decoration-2">
                                <li><strong>Alzavidrios Eléctricos:</strong> <?= $autoData['alzavidrios']?> </li>
                                <li><strong>Cierre Centralizado:</strong> <?= $autoData['cierreCentralizado']?> </li>
                                <li><strong>Airbag:</strong> <?= $autoData['airbag']?> </li>
                                <li><strong>Frenos ABS:</strong> <?= $autoData['frenosABS']?> </li>
                                <li><strong>Aire Acondicionado:</strong> <?= $autoData['aireAcondicionado']?> </li>
                            </ul>


                            <h4>Promedio Rating</h4>

                            <div style="width: 180px;" title="muy bueno" id="product_rating" class="big_star" data-value="5.0" data-rating-url="/products/26371/ratings/"><img title="muy bueno" alt="1" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/big-star-<?php if($valoracion >= 1){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="muy bueno" alt="2" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/big-star-<?php if($valoracion >= 2){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="muy bueno" alt="3" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/big-star-<?php if($valoracion >= 3){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="muy bueno" alt="4" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/big-star-<?php if($valoracion >= 4){ echo 'on'; }else{ echo 'off'; } ?>.png">&nbsp;<img title="muy bueno" alt="5" src="https://solotodo.s3.amazonaws.com/javascripts/raty/img/big-star-<?php if($valoracion >= 5){ echo 'on'; }else{ echo 'off'; } ?>.png"><input readonly="readonly" value="5" name="score" type="hidden"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div class="row">

                <div class="rankings col-xs-12">
                    <div class="well">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-4  col-xs-12">
                                <p><strong>Tasación Fiscal</strong></p>
                                <em>$<?= number_format($autoData['tasacionFiscal'], 0, ",", ".") ?> </em>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-4  col-xs-12">
                                <p><strong>Valor Comercial Estimado</strong></p>
                                <em>$<?= number_format((int)$autoData['tasacionFiscal']*(1.25), 0, ",", ".") ?> </em>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-4  col-xs-12">
                                <p><strong>Valor Permiso Circulación</strong></p>
                                <em>$<?= number_format($autoData['valorPermiso'], 0, ",", ".") ?> </em>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


