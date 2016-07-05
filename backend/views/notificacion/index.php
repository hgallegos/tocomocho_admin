<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Usuario;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NotificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notificacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'idUsuario',
            'descripcion',
            'idVehiculo',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
