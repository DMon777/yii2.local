<?php
/**
 * Created by PhpStorm.
 * User: Димон
 * Date: 09.03.2017
 * Time: 12:06
 */

namespace app\controllers;

use app\models\Category;
use app\models\ImageForm;
use app\models\Product;
use app\models\TestForm;
use app\models\TestPost;
use app\models\Articles;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\UploadedFile;

class PostController extends Controller
{

    public $layout = 'basic';

    public function actionShow(){
        $this->view->title = "Статьи";
        $arr = ['test','dog','pencil'];
       // $cats = Category::find()->all();
      //  $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
       // $cats = Category::find()->asArray()->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->all();
        //$cats = Category::find()->asArray()->where(['like','title','pp'])->all();
       // $cats = Category::find()->asArray()->where(['<=','id','695'])->all();
        //$cats = Category::find()->asArray()->where(['<=','id','695'])->limit(1)->all();
        //$cats = Category::findOne(['parent' => 691]);
        //$cats = Category::findAll(['parent' => 691]);
      //  $sql = "SELECT * FROM categories WHERE title LIKE '%pp%'";
       // $cats = Category::findBySql($sql)->all();

       // $sql = "SELECT * FROM categories WHERE title LIKE :search";
        //$cats = Category::findBySql($sql,[':search' => '%pp%'])->all();
        $cats = Category::find()->with('products')->all();

        $prod = Product::findOne(9353);
        return $this->render('show',['arr' => $arr,'cats' => $cats,'prod' => $prod]);
    }

    public function actionIndex(){
        $this->view->title = 'post index';
        $this->view->registerMetaTag(['name' => 'keywords','content' => 'kewords for index']);
        $this->view->registerMetaTag(['name' => 'description','content' => 'description for index']);
        $model = new TestForm();
        if($model->load(Yii::$app->request->post())){

            if($model->save()){
                Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        $posts = TestForm::findOne(2);
        $posts->text = "hello i'm tolik!!!";
        $posts->save();
       // debug($posts);

//        $model->name = "Dima";
//        $model->email = "bessalov88@mail.ru";
//        $model->text = "hello Dima Yii2 is awesome!!!";
//        $model->save();


        return $this->render('index',compact('model'));
    }

    public function actionAjax(){
        $this->layout = false;
        if(Yii::$app->request->isAjax){
            echo Yii::$app->request->post('name');
        }
    }

    public function actionImages(){
        $this->view->title = "Загрузка изображений";
        $model  = new ImageForm();

        if($model->load(Yii::$app->request->post()) ){
            $model->img_url = UploadedFile::getInstance($model, 'img_url');
            $model->upload();
            $this->refresh();
        }
        $images = ImageForm::find()->asArray()->all();
        return $this->render('images',['model' => $model,'images' => $images]);
    }

    public function actionNavigation()
    {
        $this->view->title = "Постраничная навигация";
        $products = Product::find();
        $totalCount = $products->count();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $totalCount
        ]);

        $products = $products
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $session = Yii::$app->session;
        $session['auth'] = [
           'user' => 'Dimulia'
        ];

        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'name',
            'value' => 'valera'
        ]));
        $cookies->remove('name');


        return $this->render('navigation',['pagination' => $pagination,
        'products' => $products
        ]);
    }

    public function actionPostGet()
    {
        $model = new TestPost();

        if($model->load(Yii::$app->request->post()) && $model->validate() ){
            $name = Yii::$app->request->post()['TestPost']['name'];
            $text = Yii::$app->request->post()['TestPost']['text'];

        }
        else {
            $name = "Имя не определено";
            $text = 'пустое сообщение';
        }

        if(Yii::$app->request->get()){
            $age = Yii::$app->request->get('age');
        }
        else $age = 'Возраст не определен';

        $session = Yii::$app->session;
        if($session['auth']['user']){
            $boxer = $session['auth']['user'];
        }
        else $boxer = null;

        $cookies = Yii::$app->request->cookies;
        if($cookies->has('name')){
            $name_from_cookie = $cookies->getValue('name');
        }
        else{
            $name_from_cookie = 'куки на зададаны';
        }


        return $this->render('postget',['model' => $model,'name' => $name,
        'age' => $age,'text' => $text,'boxer' => $boxer,
        'name_from_cookie' => $name_from_cookie
        ]);
    }

    public function actionArticles(){
        $this->view->title = "articles";

        $articles = Articles::find()->all();

        return $this->render('articles',compact('articles'));
    }

}
