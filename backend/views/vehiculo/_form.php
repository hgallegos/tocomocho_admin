<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMarca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nPuertas')->textInput() ?>

    <?= $form->field($model, 'cilindrada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoCombustible')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transmision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'traccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tasacionFiscal')->textInput() ?>

    <?= $form->field($model, 'rendimientoTeorico')->textInput() ?>

    <?= $form->field($model, 'valorPermiso')->textInput() ?>

    <?= $form->field($model, 'precioVentaP')->textInput() ?>

    <?= $form->field($model, 'cSeguridad')->textInput() ?>

    <?= $form->field($model, 'alzavidrios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cierreCentralizado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'airbag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frenosABS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aireAcondicionado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomImagen')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
