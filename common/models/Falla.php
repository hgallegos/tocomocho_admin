<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Falla".
 *
 * @property integer $idFalla
 * @property string $categoria
 * @property string $descripcion
 * @property integer $costoReparacion
 * @property integer $idComentario
 *
 * @property Resenia $idComentario0
 */
class Falla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Falla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['costoReparacion', 'idComentario'], 'integer'],
            [['categoria', 'descripcion'], 'string', 'max' => 45],
            [['idComentario'], 'exist', 'skipOnError' => true, 'targetClass' => Resenia::className(), 'targetAttribute' => ['idComentario' => 'idComentario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFalla' => 'Id Falla',
            'categoria' => 'Categoria',
            'descripcion' => 'Descripcion',
            'costoReparacion' => 'Costo Reparacion',
            'idComentario' => 'Id Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComentario0()
    {
        return $this->hasOne(Resenia::className(), ['idComentario' => 'idComentario']);
    }
}
