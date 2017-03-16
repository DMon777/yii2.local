<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 14.03.2017
 * Time: 20:42
 */

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use Yii;

class ImageForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'images';
    }


    public function rules()
    {
        return [
            [['img_url'], 'required' ],
            [['img_url'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'img_url' => 'изображение',
        ];
    }

    public function upload()
    {
        if ( $this->validate()) {
            $this->img_url->saveAs('uploads/' . $this->img_url->baseName . '.' . $this->img_url->extension);
            $name = $this->img_url->baseName.'.'.$this->img_url->extension;
            $this->img_url = $name;
            $this->save();
            return true;
        } else {
            return false;
        }
    }


}