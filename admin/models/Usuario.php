<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $clave
 * @property string $nombre
 * @property string $cc
 * @property string $tel
 * @property string $direccion
 * @property string $correo
 * @property string $austiciador
 * @property string $platino
 * @property string $esmeralda
 * @property string $diamante
 * @property string $edad
 * @property string $estado
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'clave', 'nombre', 'cc', 'tel', 'direccion', 'correo', 'austiciador', 'platino', 'esmeralda', 'diamante', 'edad', 'estado'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'clave' => 'Clave',
            'nombre' => 'Nombre',
            'cc' => 'Cc',
            'tel' => 'Tel',
            'direccion' => 'Direccion',
            'correo' => 'Correo',
            'austiciador' => 'Austiciador',
            'platino' => 'Platino',
            'esmeralda' => 'Esmeralda',
            'diamante' => 'Diamante',
            'edad' => 'Edad',
            'estado' => 'Estado',
        ];
    }
}
