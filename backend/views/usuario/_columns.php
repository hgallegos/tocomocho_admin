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
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'auth_key',
    ],*/
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'password_hash',
    ],*/
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'password_reset_token',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'email',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
            'format' => 'raw',
            'value' => function ($dataProvider){
                if($dataProvider->status == \common\models\Usuario::STATUS_ACTIVE){
                    return "Activo";
                }
                else{
                    return "Inactivo";
                }
            },
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nombre',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'valoracionDeUsuario',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tipo',
        'format' => 'raw',
        'value' => function ($dataProvider){
            if($dataProvider->tipo == \common\models\Usuario::ROLE_ADMIN){
                return "Administrador";
            }else {
                return "Usuario";
            }
        }
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
                          'data-confirm-title'=>'¿Est&aacute;s seguro?',
                          'data-confirm-message'=>'Seguro quieres eliminar este item'],
    ],

];   