<?php

namespace app\controllers;

use Yii;
use app\models\Recipe;
use app\models\Ingredients;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;

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

    /**
     * Lists all Name models.
     * @return mixed
     */
    public function actionList() {
        return $this->render('list', ['recipes' => Recipe::getAll()]);
    }

    /**
     * Displays a single Name model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $recipe = Recipe::findOne($id);

        if($recipe == NULL) {
            return $this->render('list', ['recipes' => Recipe::getAll()]);
        }

        return $this->render('view', ['recipe' => $recipe]);
    }

    public function actionEdit($id) {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $recipe = Recipe::findOne($id);

        if($recipe == NULL) {
            return $this->render('list', ['recipes' => Recipe::getAll()]);
        }

        return $this->render('edit', ['recipe' => $recipe]);
    }

    public function actionDelete($id) {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $recipe = Recipe::findOne($id);

        if(!$recipe == NULL) {
            $ingredients = Ingredients::findAll(['recipe_id' => $id]);
            
            foreach($ingredients as $ingredient)
                $ingredient->delete();
            
            $recipe->delete();
        }

        return $this->render('list', ['recipes' => Recipe::getAll()]);
    }
}
