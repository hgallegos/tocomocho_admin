<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Vehiculo;

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
					<?php
					$i=0;
					$j=0;
					$array;
					for($i=0; $i<41; $i++){
						$array[$j] = $j;
						$j=$j+500000;
					}?>
				<?= $form->field($model, 'precioD')->label('Precio Desde')
				->dropDownList($array,['prompt'=>'Seleccione']); ?>
					</div>
					<div class="col-sm-6 col-md-6">
					<?php
					$i=41;
					$j=20000000;
					$array2;
					for($i=41; $i>0; $i--){
						$array2[$j] = $j;
						$j=$j-500000;
					}?>
				<?= $form->field($model, 'precioH')->label('Precio Hasta')
				->dropDownList($array2,['prompt'=>'Seleccione']); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<?php
					$i=0;
					$j=1990;
					$array3;
					for($i=1990; $i<=2016; $i++){
						$array3[$i] = $i;
					}?>
				<?= $form->field($model, 'anioD')->label('Año Desde')
				->dropDownList($array3,['prompt'=>'Seleccione']); ?>
					</div>
					<div class="col-sm-6 col-md-6">
					<?php
					$i=0;
					$j=1990;
					$array4;
					for($i=2016; $i>=1990; $i--){
						$array4[$i] = $i;
					}?>
				<?= $form->field($model, 'anioH')->label('Año Hasta')
				->dropDownList($array4,['prompt'=>'Seleccione']); ?>
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
	<?php $vehiculo = Vehiculo::findOne($resenia->idVehiculo); ?>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    <br>
		      <img class="img-rounded" src="http://tocomocho.site/images/<?php echo $vehiculo->nomImagen; ?>" alt="-">
		      <div class="caption">
		        <h3 style="font-weight:bold;"><?php echo $vehiculo->marca; ?></h3>
		        <h4>MODELO <?php echo $vehiculo->modelo; ?></h4>
		        <p>"<?php echo $resenia->contenido; ?>"</p>
		        <p><a href="<?='resenia/autover?idVehiculo='.$resenia->idVehiculo?>" class="btn btn-primary" role="button">Ir al detalle</a></p>
		      </div>
		    </div>
		  </div>
<?php endforeach; ?>
	</div>

<!-- d -->
</div>
