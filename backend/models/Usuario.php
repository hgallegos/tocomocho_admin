<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property integer $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $nombre
 * @property double $valoracionDeUsuario
 * @property integer $tipo
 *
 * @property Notificacion[] $notificacions
 * @property Resenia[] $resenias
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'tipo'], 'integer'],
            [['valoracionDeUsuario'], 'number'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 30],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'nombre' => 'Nombre',
            'valoracionDeUsuario' => 'Valoracion De Usuario',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacions()
    {
        return $this->hasMany(Notificacion::className(), ['idUsuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResenias()
    {
        return $this->hasMany(Resenia::className(), ['idUsuario' => 'id']);
    }
}
