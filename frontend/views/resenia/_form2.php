<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Resenia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resenia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fecha')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'idUsuario')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'idVehiculo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nCalidad')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nEconomia')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'valoracion')->dropDownList(['1' => '1 Estrella', '2' => '2 Estrellas', '3' => '3 Estrellas', '4' => '4 Estrellas', '5' => '5 Estrellas'], ['prompt'=>'Selecciona una Calificación']) ?>

    <?= $form->field($model, 'rendimientoR')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
