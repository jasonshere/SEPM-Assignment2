<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <!-- Start Home -->
    <div class="pageheader">
        <div class="container">
            <img class="logo" src="web/images/logo.png">
            <h2 class="logo_title">Cinema Aurora</h2>
        </div>
    </div>
    <!-- End Home -->
    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <?php $form = ActiveForm::begin([
                        'action' => yii\helpers\Url::to(['movie/search']),
                    ]) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <input name="title" type="text" class="form-control" placeholder="Please Input Movie's Name" style="border: 1px solid #ccc;margin-left:9px;height:34px;border-radius:5px;margin-top:3px;">
                        </div>
                        <div class="col-md-4">
                            <select name="playing_time" class="form-control" style="margin-top:3px;border:1px solid #ccc;background:transparent;color:#ffffff;outline:none;">
                              <option value="0">Please Choose Session Time</option>
                              <?php
                                foreach ($this->params['session_time'] as $session_time) {
                                    echo '<option>'.$session_time.'</option>';
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="search" style="margin-top:3px;width:150px;">
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">            
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <i class="fa fa-user"></i>
                        </a>
                        <ul class="dropdown-menu cart-list">
                            <li><a href="#">My Tickets</a></li>
                            <li><a href="#">My Orders</a></li>
                            <li><a href="#">My Cart</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php echo count($this->params['cart']); ?></span>
                        </a>
                        <ul class="dropdown-menu cart-list">
                            <?php foreach ($this->params['cart'] as $cart): ?>
                            <li>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $cart['id']]); ?>" class="photo"><img src="<?php echo strstr($cart['movie_post'],"holder.js")?$cart['movie_small_post']:$cart['movie_post']; ?>" style="width:50px;height:50px" class="cart-thumb" alt="<?php echo $cart['movie_name']; ?>" /></a>
                                <h6><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $cart['id']]); ?>"><?php echo $cart['movie_name']; ?></a></h6>
                                <p><?php echo $cart['quantity']; ?>x - <span class="price">$<?php echo $cart['price']; ?></span></p>
                            </li>
                            <?php endforeach; ?>
                            <?php if (count($this->params['cart']) > 0): ?>
                            <li class="text-center">
                            <button class="btn btn-success" onclick="window.location.href='<?php echo Yii::$app->urlManager->createUrl('cart/view'); ?>'">Go To Cart</button>
                            </li>
                            <?php else: ?>
                            <li class="text-center">
                                <Strong>There are not any items yet.</Strong>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <!--<li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>-->
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/index']); ?>">Home</a></li>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/view']); ?>">Movies</a></li>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/faq']); ?>">FAQ</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   

        <!-- Start Side Menu -->
        <!--<div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">User Centre</h6>
                <ul class="link">
                    <li><a href="#">My Movies</a></li>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">My Cart</a></li>
                </ul>
            </div>
            <div class="widget">
                <h6 class="title">Menu</h6>
                <ul class="link">
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/index']); ?>">Home</a></li>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/view']); ?>">Movies</a></li>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/faq']); ?>">FAQ</a></li>
                </ul>
            </div>
        </div>-->
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->

    <div class="container-fluid" style="margin:0;padding:0">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; RMIT-SEPM-Group 21 <?= date('Y') ?></p>
        
        <p class="pull-left" style="margin-left: 10px;">All images and information are from <a href="http://www.imdb.com" target="_blank">www.imdb.com</a>.</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
