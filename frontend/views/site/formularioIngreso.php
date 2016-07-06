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
				<?php $form = ActiveForm::begin();?>
<!-- 					// [
				    'action' => 'resultado'
				]; -->
				<?= $form->field($model, 'marca')?>
				<?= $form->field($model, 'modelo')?>
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
			<h1 id="textoPrincipal" style="text-align:justify; color:white;">
				En <span id="spanSitio">TOKOMOCHO.site</span> podrás buscar tu vehículo ideal, 
				desde un catálogo que cuenta hasta la fecha con 24.223 vehículos
				 comercializados en Chile.</h1>
		</div>
	</div>


		</br></br></br></br>
<h1 id="textoPrincipal" style="text-align:justify; color:white;">
Últimas Reseñas
</h1>
		</br></br>
	 <div class="row">
<?php foreach ($resenias as $resenia): ?>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="..." alt="-">
		      <div class="caption">
		        <h3>Reseña</h3>
		        <p><?php echo $resenia->contenido; ?></p>
		        <p><a href="<?='resenia/autover?idVehiculo='.$resenia->idVehiculo?>" class="btn btn-primary" role="button">Ir al detalle</a></p>
		      </div>
		    </div>
		  </div>
<?php endforeach; ?>
	</div>

<!-- d -->
</div>
