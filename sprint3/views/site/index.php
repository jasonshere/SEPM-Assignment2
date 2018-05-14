<?php
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'Cinema Aurora';
?>
<div class="site-index">
<?php

   $items = [
    [
        'title' => 'Avengers',
        'href' => 'https://www.youtube.com/watch?v=gQrkvZeE3Uc',
        'type' => 'text/html',
        'youtube' => 'gQrkvZeE3Uc',
        'poster' => 'holder.js/1450x450'
    ],
    [
        'title' => 'Sintel',
        'href' => 'http://media.w3.org/2010/05/sintel/trailer.mp4',
        'type' => 'video/mp4',
        'poster' => 'http://media.w3.org/2010/05/sintel/poster.png'
    ],
    [
        'title' => 'Sintel',
        'href' => 'http://media.w3.org/2010/05/sintel/trailer.mp4',
        'type' => 'video/mp4',
        'poster' => 'http://media.w3.org/2010/05/sintel/poster.png'
    ],
]; 

    echo dosamigos\gallery\Carousel::widget([
        'items' => $items, 'json' => true,
        'clientEvents' => [
            'onslide' => 'function(index, slide) {
                console.log(slide);
            }'
        ],
    ]);

?>

    <div class="container">
        <h3 class="text-center latest">Latest Movies</h3>
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <img src="holder.js/400x200" alt="Avengers 3D">
              <div class="caption">
                <h3>Avengers 3D</h3>
                <p>Avengers 3D</p>
                <p><a href="#" class="btn btn-primary" role="button">Add To Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <img src="holder.js/400x200" alt="Avengers 3D">
              <div class="caption">
                <h3>Avengers 3D</h3>
                <p>Avengers 3D</p>
                <p><a href="#" class="btn btn-primary" role="button">Add To Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <img src="holder.js/400x200" alt="Avengers 3D">
              <div class="caption">
                <h3>Avengers 3D</h3>
                <p>Avengers 3D</p>
                <p><a href="#" class="btn btn-primary" role="button">Add To Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <img src="holder.js/400x200" alt="Avengers 3D">
              <div class="caption">
                <h3>Avengers 3D</h3>
                <p>Avengers 3D</p>
                <p><a href="#" class="btn btn-primary" role="button">Add To Cart</a></p>
              </div>
            </div>
          </div>
        </div>
    </div>


</div>
