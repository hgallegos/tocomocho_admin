<?php

namespace common\models;

use Yii;
use yii\base\Model;

class BusquedaFormulario extends Model{
	public $marca;
	public $modelo;
	public $precioD;
	public $precioH;
	public $anioD;
	public $anioH;

	public function rules(){
		return [
			[['marca', 'modelo', 'precioD','precioH','anioD','anioH'], 'default'],
		];
	}
}
?>