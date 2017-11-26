<?php

namespace app\controllers;

use Yii;
use app\models\Recipe;
use app\models\Ingredients;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\RecipeForm;

class RecipeController extends Controller
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

    public function actionList() {
        return $this->render('list', ['recipes' => Recipe::getAll()]);
    }

    public function actionView($id) {
        $recipe = Recipe::findOne($id);

        if($recipe == NULL) {
            return $this->render('list', ['recipes' => Recipe::getAll()]);
        }

        return $this->render('view', ['recipe' => $recipe]);
    }

    public function actionEdit($id = '') {
        if (Yii::$app->user->isGuest)
            return $this->goHome();

        $recipe = Recipe::findOne($id);

        if($recipe == NULL)
            return $this->render('list', ['recipes' => Recipe::getAll()]);

        return $this->render('edit', ['recipe' => $recipe]);
    }

    public function actionDelete($id = '') {
        if (Yii::$app->user->isGuest)
            return $this->goHome();

        $recipe = Recipe::findOne($id);

        if(!$recipe == NULL && $recipe->deleteFully())
            Yii::$app->session->setFlash('recipeDeleted');

        return $this->render('list', ['recipes' => Recipe::getAll()]);
    }

    public function actionCreate() {
        if (Yii::$app->user->isGuest)
            return $this->goHome();

        $form = new RecipeForm();

        if ($form->load(Yii::$app->request->post()) && $form->insert()) {
            Yii::$app->session->setFlash('recipeCreated');

            return $this->render('list', ['recipes' => Recipe::getAll()]);
        }

        return $this->render('create', [
            'form' => $form
        ]);
    }
}