<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Movie;
use app\models\Cart;
use yii\web\Session;
use lulubin\qrcode\QrCode;

class CartController extends CommonController
{
    /**
     * Displays cart view page.
     *
     * @return string
     */
    public function actionView()
    {
        $session = new Session();
        $cart = $session->get("cart");
        $cartModel = new Cart();
        $cart = $cartModel->findAllPros($cart);
        return $this->render('view', ['cart' => $cart]);
    }

    public function actionPay()
    {
        if (Yii::$app->request->isPost) {
            $cartModel = new Cart();
            $cardNo = Yii::$app->request->post("card_no");
            $email = Yii::$app->request->post('email');
            $name = Yii::$app->request->post('name');
            $address = Yii::$app->request->post('address');
            $tickets = (new Session())->get("cart");
            if (!$cartModel->validateCard($cardNo)) {
                $code = -1;
                $msg = 'The card number is incorrect!';
            } else {
                // send email
                if (Yii::$app->mailer->compose('pay/email', ['ticket_code' => md5(time()), 'name' => $name])
                    ->setFrom('admin@gmail.com')
                    ->setTo($email)
                    ->setSubject('Your Ticket')
                    ->send() ) {
                        $code = 0;
                        $msg = 'The ticket has been sent to your email!';
                        (new Session())->destroy();
                    } else {
                        $code = -1;
                        $msg = 'Paid failed!';
                    }
            }
            echo json_encode(['code' => $code, 'msg' => $msg]);
            exit;
        }
        return $this->render('pay');
    }

    public function actionStore()
    {
        $post = Yii::$app->request->post();
        $session = Yii::$app->session;
        $carts = $session->get("cart");
        $cartModel = new Cart();
        $post['cart_id'] = $cartModel->getId($carts);
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

    public function actionDelete()
    {
        $cart_id = Yii::$app->request->post("cart_id");
        $cartModel = new Cart();
        if ($cartModel->deleteById($cart_id)) {
            $code = 0;
            $msg = 'Successfully deleted!';
        } else {
            $code = -1;
            $msg = 'Deleted failed!';
        }
        echo json_encode(['code' => $code, 'msg' => $msg]);
        exit();
    }

}
