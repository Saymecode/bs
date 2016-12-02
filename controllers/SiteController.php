<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Product;
use app\models\Category;
use yii\data\Pagination;
use app\assets\AppAsset;
use app\models\RegForm;
use app\models\LoginForm;
use app\models\User;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Product::find();
        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $products->count(),

        ]);

        $products = $products->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', compact('products', 'pagination'));
    }
    public function actionSearch(){
        $searchText = Yii::$app->request->post('searchText');

        $products = Product::find()->where("`name` LIKE '%$searchText%'");
        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $products->count(),

        ]);

        $products = $products->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', compact('products', 'pagination'));
    }
    public function actionTime()
    {
        return $this->render('time-date', ['response' => '=P']);
    }

    public function actionDate()
    {
        return $this->render('time-date', ['response' => date('d.m.Y')]);
    }
    public function actionLogin(){
        if(!Yii::$app->user->isGuest):
            return $this->goHome();
        endif;
        $model = new LoginForm();
        $isLogined = true;
        if($model->load(Yii::$app->request->post())&&
            $isLogined = $model->login()):
            return $this->goBack();
        endif;
        return $this->render('login',
            ['model'=>$model, 'isLogined'=>$isLogined]
        );
    }
    public function actionReg(){
        $model = new RegForm();
        $logForm = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()):
            if($user = $model->reg()):
                if($user->status === User::STATUS_ACTIVE):
                    $logForm->username = $model->username;
                    $logForm->password = $model->password;
                    if(Yii::$app->getUser()->login($user)):
                        $logForm->login();
                        return $this->goHome();
                    endif;
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Error during registration');
                Yii::error('Error registration');
                return $this->refresh();
            endif;
        endif;
        return $this->render('reg',
            ['model'=>$model]
        );
    }
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->redirect(['/site/index']);
    }
    public function actionFilter(){
        $category = Yii::$app->request->get('id');
        $products = Product::getProductsByCategory($category);

        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => $products->count(),

        ]);

        $products = $products->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', compact('products', 'pagination'));
    }
}
