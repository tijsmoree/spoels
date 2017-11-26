<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;

class PersonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Name models.
     * @return mixed
     */
    public function actionList() {
        return $this->render('list', ['persons' => Person::getAll()]);
    }

    /**
     * Displays a single Name model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $person = Person::findOne($id);

        if($person == NULL) {
            return $this->render('list', ['persons' => Person::getAll()]);
        }

        return $this->render('view', ['person' => $person]);
    }

}
