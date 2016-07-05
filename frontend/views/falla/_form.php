<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Falla */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="falla-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costoReparacion')->textInput() ?>

    <?= $form->field($model, 'idComentario')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
