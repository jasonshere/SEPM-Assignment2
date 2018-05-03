<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class CartController extends Controller
{
    /**
     * Displays cart view page.
     *
     * @return string
     */
    public function actionView()
    {
        return $this->render('view');
    }


    public function actionPay()
    {
        return $this->render('pay');
    }

}
