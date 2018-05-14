<?php
	$this->title = "All Movies - Cinema Aurora";
	
?>

<div class="container" style="margin-top: 20px;">

	<div class="row">

    <?php foreach($result as $movie): ?>

      <div class="col-sm-6 col-md-4" style="min-height:430px;height: 430px;overflow:hidden;margin-bottom:20px;">
        <a href="<?php echo Yii::$app->urlManager->createUrl(["movie/detail", "id" => $movie['id']]); ?>">
		<div class="thumbnail" style="min-height:430px;height: 430px;overflow:hidden;">
        <img src="<?php echo $movie['post']; ?>" alt="<?php echo $movie['title']; ?>" style="width:200px;height:300px;">
		  <div class="caption">
            <h3><?php echo $movie['title']; ?></h3>
            <p><?php echo $movie['description']; ?></p>
		  </div>
        </div>
        </a>
	  </div>

    <?php endforeach; ?>

	</div>

</div>
