<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 10.03.2017
 * Time: 8:16
 */

namespace app\models;

use yii\db\ActiveRecord;

class TestForm extends ActiveRecord
{
//    public $name;
//    public $email; если работаем с ActiveRecord то свойства объявлять не
//    public $text; обязательно, они будут браться из базы данных

    public static function tableName(){
        return "posts";
    }


    public function attributeLabels(){
        return[
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Сообщение',
        ];
    }

    public function rules(){
        return[
            [['name','text'],'required','message' => 'поля обязательны для заполнения'],
            ['email','email'],
          //  ['name','string','min' => 2,'tooShort' => "Мало" ],
          //  ['name','string','max' => 5,'tooLong' => "Много" ],
//            ['name','string','length' => [2,5] ],
//            ['name','myRule'],
            ['text','trim']
        ];
    }

//    public function myRule($attribute)
//    {
//        if (!in_array($this->$attribute, ['Дима', 'Саша'])) {
//            $this->addError($attribute, 'Мы не принимаем никого кроме Дим и Саш');
//        }
//    }

}