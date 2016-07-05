<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Notificacion".
 *
 * @property integer $idNotificacion
 * @property integer $idUsuario
 * @property string $descripcion
 * @property integer $idVehiculo
 *
 * @property Usuario $idUsuario0
 * @property Vehiculo $idVehiculo0
 */
class Notificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Notificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idVehiculo'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'id']],
            [['idVehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['idVehiculo' => 'idVehiculo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNotificacion' => 'Id Notificacion',
            'idUsuario' => 'Id Usuario',
            'descripcion' => 'Descripcion',
            'idVehiculo' => 'Id Vehiculo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVehiculo0()
    {
        return $this->hasOne(Vehiculo::className(), ['idVehiculo' => 'idVehiculo']);
    }
}
