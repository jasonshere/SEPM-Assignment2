<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Session;
use app\models\Movie;
use app\models\Cart;

class CommonController extends Controller
{
    public $session_time;
    public function init()
    {
        $movie = new Movie();
        Yii::$app->view->params['session_time'] = $movie->getAllMoviesPlaytime();
        $cart = new Cart();
        $session = new Session();
        $cartModel = new Cart();
        $data = $session->get("cart");
        $cart = $cartModel->findAllPros($data);
        Yii::$app->view->params['cart'] = $cart;
    }

}
