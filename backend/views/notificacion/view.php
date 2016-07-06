<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notificacion */

$this->title = "Notificacion de ".$model->usuario0->nombre ;
$this->params['breadcrumbs'][] = ['label' => 'Notificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacion-view">

    <h1><?= Html::encode($this->title) ?> </h1>
    <p>
        <?= Html::a('No leido', ['unread', 'id' => $model->idNotificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar permanentemente', ['delete', 'id' => $model->idNotificacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro quieres eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usuario0.nombre',
            'vehiculo0.marca',
            'vehiculo0.modelo',
            'vehiculo0.anio',
            'descripcion',
        ],
    ])?>

</div>
