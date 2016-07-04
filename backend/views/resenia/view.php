<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Resenia */
?>
<div class="resenia-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idComentario',
            'contenido:ntext',
            'fecha',
            'idUsuario',
            'idVehiculo',
            'nCalidad',
            'nEconomia',
            'valoracion',
            'rendimientoR',
        ],
    ]) ?>

</div>
