<?php
    use yii\widgets\ActiveForm;
	$this->title = "Movie detail - Cinema Aurora";
	
?>
<style>
    .row.text-center i {
        font-size: 18px;
        margin: 3px;
        color: #bbb;
    }
    .row.text-center i.disable {
        color: red;
    }
    .row.text-center i:hover {
        color: green;
    }
</style>
<div class="container" style="margin-top: 20px">

    <div class="row">
        
        <div class="col-sm-6 col-md-6">
            
            <a href="#" class="thumbnail">
                <img src="holder.js/600x600" alt="...">
            </a>

        </div>

        <div class="col-md-6 col-sm-6">
            <h3 class="text-center">Avegers</h3>
            <h3 class="text-center" style="color: #dd0000">$22.99</h3>
            <?php $form = ActiveForm::begin([
                'action' => Yii::$app->urlManager->createUrl(["cart/view"]),
            ]); ?>
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                </select>
              </div>
              <div class="form-group">
                <label for="quantity">Date</label>
                <select class="form-control">
                  <option>2018-05-02</option>
                  <option>2018-05-03</option>
                  <option>2018-05-04</option>
                  <option>2018-05-05</option>
                  <option>2018-05-06</option>
                </select>
              </div>
              <div class="form-group">
                <label for="quantity">Time</label>
                <select class="form-control">
                  <option>02:00PM - 04:00PM</option>
                  <option>04:00PM - 06:00PM</option>
                  <option>06:00PM - 08:00PM</option>
                </select>
              </div>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  choose my seats
                </button>
              <button type="submit" class="btn btn-success">Add To Cart</button>
            <?php ActiveForm::end(); ?>
            <p style="margin-top: 20px;">The describtion of the movie, Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.

Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.

Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hall #4</h4>
      </div>
      <div class="modal-body">
        <div style="background-color: #ccc;width: 200px;height: 15px;margin:auto"></div>
        <p class="text-center">Screen</p>
        <div class="row text-center">
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
        </div>
        <div class="row text-center">
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
        </div>
        <div class="row text-center">
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
        </div>
        <div class="row text-center">
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
        </div>
        <div class="row text-center">
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print disable"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
            <i class="glyphicon glyphicon-print"></i>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


