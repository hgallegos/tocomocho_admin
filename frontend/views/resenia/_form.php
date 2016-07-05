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

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

    <?= $form->field($model, 'idVehiculo')->textInput() ?>

    <?= $form->field($model, 'nCalidad')->textInput() ?>

    <?= $form->field($model, 'nEconomia')->textInput() ?>

    <?= $form->field($model, 'valoracion')->textInput() ?>

    <?= $form->field($model, 'rendimientoR')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
