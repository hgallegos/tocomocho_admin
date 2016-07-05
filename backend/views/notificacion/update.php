<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Notificacion */

$this->title = 'Update Notificacion: ' . $model->idNotificacion;
$this->params['breadcrumbs'][] = ['label' => 'Notificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNotificacion, 'url' => ['view', 'id' => $model->idNotificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
