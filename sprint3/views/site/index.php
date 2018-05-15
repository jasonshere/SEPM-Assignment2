<?php
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'Cinema Aurora';
?>
<div class="site-index">
<?php

   /*$items = [
    [
        'title' => 'Tully',
        //'href' => 'https://www.imdb.com/title/tt5610554/videoplayer/vi505788441?ref_=tt_ov_vi',
        'type' => 'image/jpeg',
        'poster' => 'web/images/movies/1.jpg'
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
    */

$items = [
    [
        'url' => 'web/images/movies/1.jpg',
        'src' => 'web/images/movies/1.jpg',
        'options' => ['title' => 'Tully']
    ],

    [
        'url' => 'web/images/movies/2.jpg',
        'src' => 'web/images/movies/2.jpg',
        'options' => ['title' => 'Overboard']
    ],
    
    [
        'url' => 'web/images/movies/3.jpg',
        'src' => 'web/images/movies/3.jpg',
        'options' => ['title' => 'Les Guardians']
    ],

    [
        'url' => 'web/images/movies/4.jpg',
        'src' => 'web/images/movies/4.jpg',
        'options' => ['title' => 'Acrimony']
    ],

    [
        'url' => 'web/images/movies/5.jpg',
        'src' => 'web/images/movies/5.jpg',
        'options' => ['title' => 'Life of the Party']
    ],
];

echo dosamigos\gallery\Carousel::widget(['items' => $items]);

?>

    <div class="container">
        <h3 class="text-center latest">Latest Movies</h3>
        <div class="row">
        <?php foreach($movies as $movie): ?>
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail" style="height: 600px">
            <img src="<?php echo $movie['post']; ?>" alt="<?php echo $movie['title']; ?>">
              <div class="caption">
                <h3><?php echo $movie['title']; ?></h3>
                <p><?php echo substr($movie['description'], 0, 100); ?></p>
                <p><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $movie['id']]); ?>" class="btn btn-primary" role="button">View More</a></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </div>


</div>
