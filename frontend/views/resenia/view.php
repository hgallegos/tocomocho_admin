<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Resenia */
?>
<div class="resenia-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'contenido:ntext',
            'fecha',
            'valoracion',
            'rendimientoR',
        ],
    ]) ?>
    <a href="../vehiculo/verauto?id=<?= $id['idVehiculo'] ?>" class="btn btn-primary">
        Volver
    </a>
</div>
