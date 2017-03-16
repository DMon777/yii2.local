<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 09.03.2017
 * Time: 11:24
 */

namespace app\controllers;


use yii\base\Controller;

class MyController extends Controller
{
    public function actionIndex(){
        $name = 'Dima';
        $arr = ['test','dog','pencil'];

        return $this->render('index',compact('name','arr'));
    }
}