<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 10.03.2017
 * Time: 10:58
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName(){
        return "products";
    }

    public function getCategories(){
        return $this->hasOne(Category::className(),['id' => 'parent_id']);
    }

}