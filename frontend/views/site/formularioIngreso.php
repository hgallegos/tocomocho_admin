<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="wrapper-busqueda">
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Panel de Búsqueda</h3>
			  </div>
			  <div class="panel-body">
				<div class="form-group ">
				<?php $form = ActiveForm::begin();
				//<?= $form->field($model, 'tipo') 
					// [
			//      'action' => ['confirmar-ingreso'],
			//      'method' => 'get',
			//  ]); ?>
				<?= $form->field($model, 'marca')?>
				<?= $form->field($model, 'modelo') ?>
				<div class="row">
					<div class="col-sm-6 col-md-6">
				<?= $form->field($model, 'precioD')->label('Precio Desde')  ?>
					</div>
					<div class="col-sm-6 col-md-6">
				<?= $form->field($model, 'precioH')->label('Precio Hasta')  ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6">
				<?= $form->field($model, 'anioD')->label('Año Desde') ?>
					</div>
					<div class="col-sm-6 col-md-6">
				<?= $form->field($model, 'anioH')->label('Año Hasta') ?>
					</div>
				</div>
				<?= Html::submitButton('Enviar', ['class' => 'btn btn-primary'])?>
				<?php ActiveForm::end();?>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-sm-6 col-md-8">
			<h1 style="text-align:justify; color:white;">En TOKOMOCHO.site podrás buscar el vehículo ideal para ti desde un catálogo hasta la fecha de 24.223 vehículos comercializados en Chile.</h1>
			<h2></h2>
		</div>
	</div>

	<div class="row">
		</br></br>
		<!-- <p>Marca y Tipo deben ir con dropdown - Año y Precio deben ir por rangos</p> -->

	<!-- 	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		<div class="col-lg-3" style="background-color: black; height: 500px;">
		</div>
	 -->
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="..." alt="imagen bacan">
		      <div class="caption">
		        <h3>Reseña 1</h3>
		        <p>El auto es muito bueno</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		</div>
	</div> <!-- FIN ROW -->

</div>
