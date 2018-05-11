<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Movie;

class MovieController extends CommonController
{

    /**
     * Displays movie list.
     *
     * @return string
     */
    public function actionView()
    {
		// index.php?r=movie/view
        $movieModel = new Movie();
        $result = $movieModel->getAllMovies();
        return $this->render('view', ['result' => $result]);
    }
	
	
	public function actionDetail()
    {
        $movieModel = new Movie();
        $movieid = Yii::$app->request->get('id');
        if (empty($movieid)) {
            $this->redirect(['movie/view']);
        }
        $movie = $movieModel->getMovieById($movieid);
        $today = date("d/m/Y");
        $date = [$today];
        for($i = 1; $i <= 6; $i++) {
            $date[] = date("d/m/Y", strtotime("+ ".$i." days"));
        }
        $movie['playing_date'] = $date;
        return $this->render('detail', ['result' => $movie]);
    }

    public function actionSearch()
    {
        $movie = new Movie();
        $post = Yii::$app->request->post();
        if (empty($post['title']) && $post['playing_time'] == 0) {
            $result = $movie->getAllMovies();
        }
        if (empty($post['title']) && $post['playing_time'] != 0) {
            $result = $movie->getMoviesByDatetime($post['playing_time']); 
        }
        if (!empty($post['title']) && $post['playing_time'] == 0) {
            $result = $movie->getMoviesByName($post['title']);
        }
        if (!empty($post['title']) && $post['playing_time'] != 0) {
            $result = $movie->getMoviesByNameAndDatetime($post['title'], $post['playing_time']);
        }
        return $this->render('view', ['result' => $result]);
    }

}
