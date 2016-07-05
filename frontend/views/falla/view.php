<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Falla */
?>
<div class="falla-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idFalla',
            'categoria',
            'descripcion',
            'costoReparacion',
            'idComentario',
        ],
    ]) ?>

</div>
