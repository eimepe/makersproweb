<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preguntas".
 *
 * @property integer $id
 * @property string $pregunta
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $idvideo
 * @property string $respuesta
 * @property string $npregunta
 */
class Preguntas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preguntas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pregunta', 'a', 'b', 'c', 'd', 'idvideo', 'respuesta', 'npregunta'], 'string', 'max' => 255]
        ];
    }
	
	 public function getVideon()
    {
        return $this->hasOne(Videos::className(), ['id' => 'idvideo']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pregunta' => 'Pregunta',
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'idvideo' => 'Video',
            'respuesta' => 'Respuesta',
            'npregunta' => 'Numero de Pregunta',
        ];
    }
}
