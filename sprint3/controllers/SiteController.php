<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Movie;

class SiteController extends CommonController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        $movie = new Movie();
        $movie->generateData();
        $movies = array_slice($movie->getAllMovies(), 0, 4);
        return $this->render('index', ['movies' => $movies]);
    }

    /**
     * Displays FAQ page.
     *
     * @return string
     */
    public function actionFaq()
    {
        return $this->render('faq');
    }


}
