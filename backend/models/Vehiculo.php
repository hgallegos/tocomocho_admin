<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Vehiculo".
 *
 * @property integer $idVehiculo
 * @property string $idMarca
 * @property integer $anio
 * @property string $tipo
 * @property string $marca
 * @property string $modelo
 * @property integer $nPuertas
 * @property string $cilindrada
 * @property string $tipoCombustible
 * @property string $transmision
 * @property string $traccion
 * @property integer $tasacionFiscal
 * @property integer $rendimientoTeorico
 * @property integer $valorPermiso
 * @property integer $precioVentaP
 * @property integer $cSeguridad
 * @property string $alzavidrios
 * @property string $cierreCentralizado
 * @property string $airbag
 * @property string $frenosABS
 * @property string $aireAcondicionado
 * @property string $nomImagen
 *
 * @property Notificacion[] $notificacions
 * @property Resenia[] $resenias
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio', 'nPuertas', 'tasacionFiscal', 'rendimientoTeorico', 'valorPermiso', 'precioVentaP', 'cSeguridad'], 'integer'],
            [['idMarca'], 'string', 'max' => 40],
            [['tipo', 'marca', 'modelo', 'cilindrada', 'tipoCombustible', 'transmision', 'traccion', 'alzavidrios', 'cierreCentralizado', 'airbag', 'frenosABS', 'aireAcondicionado', 'nomImagen'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVehiculo' => 'Id Vehiculo',
            'idMarca' => 'Id Marca',
            'anio' => 'Anio',
            'tipo' => 'Tipo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'nPuertas' => 'N Puertas',
            'cilindrada' => 'Cilindrada',
            'tipoCombustible' => 'Tipo Combustible',
            'transmision' => 'Transmision',
            'traccion' => 'Traccion',
            'tasacionFiscal' => 'Tasacion Fiscal',
            'rendimientoTeorico' => 'Rendimiento Teorico',
            'valorPermiso' => 'Valor Permiso',
            'precioVentaP' => 'Precio Venta P',
            'cSeguridad' => 'C Seguridad',
            'alzavidrios' => 'Alzavidrios',
            'cierreCentralizado' => 'Cierre Centralizado',
            'airbag' => 'Airbag',
            'frenosABS' => 'Frenos Abs',
            'aireAcondicionado' => 'Aire Acondicionado',
            'nomImagen' => 'Nom Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacions()
    {
        return $this->hasMany(Notificacion::className(), ['idVehiculo' => 'idVehiculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResenias()
    {
        return $this->hasMany(Resenia::className(), ['idVehiculo' => 'idVehiculo']);
    }
}
