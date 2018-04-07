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
            [['nombre', 'img', 'url'], 'required'],
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
