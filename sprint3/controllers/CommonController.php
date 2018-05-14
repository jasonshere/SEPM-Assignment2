<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Movie;

class CommonController extends Controller
{
    public $session_time;
    public function init()
    {
        $movie = new Movie();
        Yii::$app->view->params['session_time'] = $movie->getAllMoviesPlaytime();
    }

}
