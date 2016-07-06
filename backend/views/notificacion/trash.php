<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Usuario;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NotificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borrador';
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
                'value' => 'usuario.nombre'
            ],
            [
                'attribute' => 'marca',
                'value' => 'vehiculo.marca'
            ],
            [
                'attribute' => 'modelo',
                'value' => 'vehiculo.modelo'
            ],
            [
                'attribute' => 'anio',
                'value' => 'vehiculo.anio'
            ],
            'descripcion',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
</div>
