<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "puntajesvideos".
 *
 * @property integer $id
 * @property string $iduser
 * @property string $idvideo
 * @property string $puntaje
 * @property string $idcategoria
 */
class Puntajesvideos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puntajesvideos';
    }

    /**
     * @inheritdoc
     
    public function rules()
    {
        return [
            [['iduser'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'idvideo' => 'Idvideo',
            'puntaje' => 'Puntaje',
            'idcategoria' => 'Idcategoria',
        ];
    }*/
}
