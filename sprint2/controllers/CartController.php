<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Movie;

class CartController extends CommonController
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

    public function actionStore()
    {
        $post = Yii::$app->request->post();
        $session = Yii::$app->session;
        $carts = $session->get("cart");
        $carts[] = $post;
        $session->set("cart", $carts);
        if (in_array($post, $session->get("cart"))) {
            // lock
            $movieModel = new Movie();
            $movieModel->lockSeats($post['id'], $post['playing_date'], $post['playing_time'], $post['seats']);
            $code = 0;
            $msg = 'ok';
        } else {
            $code = -1;
            $msg = 'failed';
        }
        echo json_encode(['code' => $code, 'msg' => $msg]);
        exit;
    }

}
