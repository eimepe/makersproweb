<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "img".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $img
 * @property string $url
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	  public $file;
    public static function tableName()
    {
        return 'img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		['file', 'file',

   'skipOnEmpty' => false,

   'uploadRequired' => 'No has seleccionado ningún archivo', //Error

   'maxSize' => 50000000000, //1 MB

   'tooBig' => 'El tamaño máximo permitido es 200MB', //Error

   'minSize' => 10, //10 Bytes

   'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error

   'extensions' => 'mpg, MPG, mpeg, MPEG, mpe, MPE, mp4, MP4, jpg, git, png, JPG, GIT, PNG',

   'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error

   'maxFiles' => 4,

   'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
   ],
            [['nombre', 'url'], 'required'],
            [['nombre', 'img', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'img' => 'Img',
            'url' => 'Url',
        ];
    }
}
