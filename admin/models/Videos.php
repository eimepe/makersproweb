<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property integer $id
 * @property string $video
 * @property string $categoria
 * @property string $numerovideo
 */
class Videos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	 public $file;

    public static function tableName()
    {
        return 'videos';
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

   'extensions' => 'mpg, MPG, mpeg, MPEG, mpe, MPE, mp4, MP4, 3gp, 3gpp, mp3',

   'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error

   'maxFiles' => 4,

   'tooMany' => 'El máximo de archivos permitidos son {limit}',
   'on'=>'create'//Error
   ],
            [['video', 'categoria','subcategoria','ultcategoria', 'numerovideo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video' => 'Video',
            'categoria' => 'Categoria',
            'numerovideo' => 'Numerovideo',
        ];
    }
}
