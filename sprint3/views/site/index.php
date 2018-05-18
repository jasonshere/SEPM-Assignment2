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
        'url' => 'web/images/movies/1-big.jpg',
        'src' => 'web/images/movies/1-big.jpg',
        'options' => ['title' => 'Tully']
    ],

    [
        'url' => 'web/images/movies/2-big.jpg',
        'src' => 'web/images/movies/2-big.jpg',
        'options' => ['title' => 'Overboard']
    ],
    
    [
        'url' => 'web/images/movies/4-big.jpg',
        'src' => 'web/images/movies/4-big.jpg',
        'options' => ['title' => 'Acrimony']
    ],

    [
        'url' => 'web/images/movies/5-big.jpg',
        'src' => 'web/images/movies/5-big.jpg',
        'options' => ['title' => 'Life of the Party']
    ],
];
$url = Yii::$app->urlManager->createUrl(['movie/detail']);
echo dosamigos\gallery\Carousel::widget([
    'items' => $items,
    'clientEvents' => [
        'onslide' => 'function(index, slide) {
            var mid = index + 1;
            var url = "'.$url.'&id="+mid;
            slide.onclick = function(){
                window.location.href=url;
            }
            $(slide).css("cursor", "pointer");
        }'
    ],
]);

?>
    <div class="container">
        <h3 class="text-center latest">Latest Movies</h3>
        <div class="row">
        <?php foreach($movies as $movie): ?>
          <div class="col-sm-3 col-md-3">
            <div class="thumbnail" style="height: 600px">
            <a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $movie['id']]); ?>" target="_blank">
                <img src="<?php echo $movie['post']; ?>" alt="<?php echo $movie['title']; ?>">
            </a>
              <div class="caption">
                <h3><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $movie['id']]); ?>" target="_blank"><?php echo $movie['title']; ?></a></h3>
                <p><?php echo substr($movie['description'], 0, 100); ?></p>
                <p><a href="<?php echo Yii::$app->urlManager->createUrl(['movie/detail', 'id' => $movie['id']]); ?>" class="btn btn-primary" role="button">View More</a></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </div>
</div>








