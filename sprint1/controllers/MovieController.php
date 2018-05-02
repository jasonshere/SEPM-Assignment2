<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class MovieController extends Controller
{

    /**
     * Displays movie list.
     *
     * @return string
     */
    public function actionView()
    {
		// index.php?r=movie/view
        return $this->render('view');
    }
	
	
	 public function actionDetail()
    {
		// index.php?r=movie/detail
        return $this->render('detail');
    }

}
