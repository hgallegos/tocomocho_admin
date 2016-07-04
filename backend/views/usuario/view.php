<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Usuario */
?>
<div class="usuario-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            'status',
            'nombre',
            'valoracionDeUsuario',
            'tipo',
        ],
    ]) ?>

</div>
