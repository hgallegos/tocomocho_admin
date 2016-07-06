<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Usuario;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NotificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute' => 'nombre usuario',
                'value' => 'usuario0.nombre'
            ],
            [
                'attribute' => 'marca',
                'value' => 'vehiculo0.marca'
            ],
            [
                'attribute' => 'modelo',
                'value' => 'vehiculo0.modelo'
            ],
            [
                'attribute' => 'anio',
                'value' => 'vehiculo0.anio'
            ],
            'descripcion',
            [
              'attribute' => 'status',
                'format' => 'raw',
               'value' => function ($dataProvider){
                    if($dataProvider->status == \common\models\Notificacion::STATUS_READ){
                        return "Leido";
                    }
                    else{
                        return "No leido";
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
</div>
