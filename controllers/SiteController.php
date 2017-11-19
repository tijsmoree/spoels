<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Person;
use app\models\Admin;
use app\models\ProfileForm;
use app\models\PasswordForm;

class SiteController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
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
    public function actions() {
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
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
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
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     *
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    } */

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Displays profile page.
     *
     * @return string
     */
    public function actionProfile() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $profile = new ProfileForm();
        $pass = new PasswordForm();
        
        $id = Yii::$app->user->identity->id;
        $person = Person::findOne($id);
        $admin = Admin::findOne($id);
        
        if ($profile->load(Yii::$app->request->post()) && $profile->update($person)) {
            Yii::$app->session->setFlash('profileFormSubmitted');

            return $this->refresh();
        } elseif ($pass->load(Yii::$app->request->post()) && $pass->update($admin)) {
            Yii::$app->session->setFlash('passFormSubmitted');

            return $this->refresh();
        }
        
        return $this->render('profile', [
            'profile' => $profile,
            'pass' => $pass,
            'person' => $person,
            'admin' => $admin
        ]);
    }

    public function actionPerson($id = '') {
        $person = Person::findOne($id);
        if($person == NULL) {
            $persons = Person::findAll(['active' => true]);
            usort($persons, function($a, $b) {
                return strcmp($a->last_name, $b->last_name);
            });

            return $this->render('persons', ['persons' => $persons]);
        }

        return $this->render('person', ['person' => $person]);
    }
}
