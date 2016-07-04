<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
      /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idComentario',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'contenido',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fecha',
    ],
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idUsuario',
    ],*/
        //aqui hay que hacer algo para poder seleccionar el id del vehiculo, puede ser buscando
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'idVehiculo',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nCalidad',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nEconomia',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'valoracion',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'rendimientoR',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'Ver','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Actualizar', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Eliminar',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'¿Estás seguro?',
                          'data-confirm-message'=>'Seguro quieres eliminar este item'],
    ],

];   