<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 10.03.2017
 * Time: 10:58
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName(){
        return "categories";
    }

    public function getProducts(){
        return $this->hasMany(Product::className(),['parent_id' => 'id']);
    }

}