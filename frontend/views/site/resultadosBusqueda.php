<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<a href="">&#60;&#60;VOLVER</a></br></br>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h2>Resultados de Vehículos</h2></div>
<!-- Table -->
 <table class="table table-striped">
    <thead>
      <tr>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>AÑO</th>
        <th>ENLACE</th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($vehiculos as $vehiculo): ?>
    <tr>
        <td><?php echo $vehiculo->marca ;?></td>
        <td><?php echo $vehiculo->modelo ;?></td>
        <td><?php echo $vehiculo->anio ;?></td>
        <td><a href="<?= '../vehiculo/verauto?id='.$vehiculo->idVehiculo?>">ENLACE</a></td>
    </tr>
<?php endforeach; ?>
	</tbody>
</table>
</div>