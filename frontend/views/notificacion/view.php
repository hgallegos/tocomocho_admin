<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notificacion */
?>
<div class="notificacion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idNotificacion',
            'idUsuario',
            'descripcion',
            'idVehiculo',
        ],
    ]) ?>

</div>
