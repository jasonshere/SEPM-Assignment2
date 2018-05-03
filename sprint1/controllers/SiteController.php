<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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
    public function actionIndex()
    {


        $movies = [
            [
                'id' => 1,
                'theater' => 'Hall#1',
                'title' => '3D Avengers',
                'subtitle' => '3D Avengers',
                'post' => 'holder.js/400x300',
                'price' => '$22.99',
                'describtion' => '',
                'playing_date' => [
                    'Monday',
                    'Tuesday',
                    'Wednesday'
                ],
                'playing_time' => [
                    '11:00AM - 02:00PM',
                    '02:00PM - 05:00PM',
                    '05:00PM - 08:00PM',
                    '08:00PM - 11:00PM',
                ],
                'seats' => [
                    [
                        'Monday 11:00AM - 02:00PM' => [
                            '05', '08', '10'
                        ],
                    ],
                ],
            ]
        ];

        $str = json_encode($movies);
        
        file_put_contents("/home/wwwroot/sepm/sprint1/data/sepm.dat", $str);

        return $this->render('index');
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
