<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 10.03.2017
 * Time: 8:16
 */

namespace app\models;

use yii\base\Model;

class TestPost extends Model
{
    public $text;
    public $name;


    public function attributeLabels(){
        return[
            'text' => 'Введите сообщение',
            'name' => "Введите имя"
        ];
    }

    public function rules(){
        return[
            [['name','text'],'required','message' => 'поля обязательны для заполнения'],
        ];
    }

}