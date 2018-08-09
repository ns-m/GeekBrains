<?php

namespace app\controllers;

use app\models\Event;
use app\models\Note;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
//        $model = new Note();
////        $model->setAttributes([
////            'id' => 5,
////            'name' => 'foo',
////        ]);
//        $model->setAttributes($_GET);
//
////        d($model->toArray());
//
////        VarDumper::dump($model->getAttributes());
//
//        if (!$model->validate()){
//            return VarDumper::dumpAsString($model->getErrors());
//        }
//        return 'good';
//        $db = \Yii::$app->getDb();
//        $id = 2;
////        $db_foo = \Yii::$app->db_foo;
////        d($db, $db_foo);
////        $result = $db
////            ->createCommand('SELECT * FROM event WHERE id = :id')
////            ->bindParam(':id', $id)
////            ->queryAll()
////            ;
//        $result = $db->queryBuilder->

//        print_r($result);
//        $result = Event::find()->all();
//        $result = Event::find()
////            ->andWhere('id=2')
////            ->andWhere(['id' =>2])
//              ->andWhere([
//                    'or',
//                    ['=', 'id', 1],
//                    ['=', 'id', 2],
//                ])
//            ->one();
////        print_r($result);
//        echo $result->name;
//
//        exit;
//        return '';
//        foreach (Event::find()->each() as $model){
//            print_r($model->name . '<br/>');
//        }
//        exit;
//        $model = Event::findOne(['id' => 3]);
////        $model->doCoolThing();
////        die;
//        $model->name = 'Model 3';
//        $model->save();
//        $model = new Event();
//        $model->setAttributes([
//            'name'=>'Model X',
//            'start_at'=>date('Y-m-d'),
//            'end_at'=>date('Y-m-d')
//        ]);
//        $model->save();
//        Event::find()->andFilterWhere(['id'=>null])->all();


        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
