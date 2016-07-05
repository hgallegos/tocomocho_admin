<?php
use yii\helpers\Html;
?>
<p>Usted ha ingresado la siguiente informacion:</p>

<ul>
    <li><label>Marca</label>: <?= Html::encode($model->marca) ?></li>
    <li><label>Modelo</label>: <?= Html::encode($model->modelo) ?></li>
    <li><label>Precio</label>: <?= Html::encode($model->precio) ?></li>
    <li><label>Tipo</label>: <?= Html::encode($model->tipo) ?></li>
    <li><label>Año</label>: <?= Html::encode($model->anio) ?></li>
</ul>