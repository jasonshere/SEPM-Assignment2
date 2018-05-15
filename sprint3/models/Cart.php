<?php

namespace app\models;
use yii\web\Session;

class Cart
{

    public function validateCard($cardNo)
    {
        $types = [
            'visaelectron', 'maestro', 'forbrugsforeningen', 'dankort', 'visa', 'mastercard', 'amex', 'dinersclub', 'discover', 'unionpay', 'jcb'
        ];
        foreach($types as $type) {
            $result = \gdianov\validators\CreditCardValidator::validateCard($type, $cardNo, true);
            if ($result) {
                return true;
            }
        }
        return false;
    }

    public function findAllPros($carts)
    {
        if (empty($carts)) {
            return [];
        }
        $results = [];
        $movieModel = new Movie();
        foreach ($carts as $cart) {
            $movie = $movieModel->getMovieById($cart['id']);
            $cart['movie_name'] = $movie['title'];
            $cart['movie_post'] = $movie['post'];
            $cart['movie_small_post'] = 'holder.js/50x50';
            $cart['movie_theater'] = $movie['theater'];
            $results[] = $cart;
        }
        return $results;
    }

    public function getId($carts)
    {
        if (empty($carts)) {
            return 1;
        }
        $id = 0;
        foreach ($carts as $cart) {
            $id = max($cart['cart_id'], $id);
        }
        return ++$id;
    }

    public function deleteById($cid) 
    {
        $session = new Session();
        $carts = $session->get("cart");
        $data = [];
        foreach($carts as $cart) {
            if ($cid != $cart['cart_id']) {
                $data[] = $cart;
            }
        }
        $session->set("cart", $data);
        return true;
    }

}
