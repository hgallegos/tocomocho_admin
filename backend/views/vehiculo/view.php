<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */
?>
<div class="vehiculo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'anio',
            'marca',
            'modelo',
            'nPuertas',
            'cilindrada',
            'tipoCombustible',
            'transmision',
            'traccion',
            'tasacionFiscal',
            'rendimientoTeorico',
            'valorPermiso',
            'precioVentaP',
            'cSeguridad',
            'alzavidrios',
            'cierreCentralizado',
            'airbag',
            'frenosABS',
            'aireAcondicionado',
            'nomImagen',
        ],
    ]) ?>

</div>
