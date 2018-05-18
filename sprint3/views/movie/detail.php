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
</style>
<div class="container" style="margin-top: 20px">

    <div class="row">
        
        <div class="col-sm-6 col-md-6">
            
            <a href="#" class="thumbnail">
                <img src="<?php echo $result['big_post']; ?>" alt="<?php echo $result['title']; ?>">
            </a>

        </div>

        <div class="col-md-6 col-sm-6">
            <h3 class="text-center"><?php echo $result['title']; ?></h3>
            <h3 class="text-center" style="color: #dd0000">$ <?php echo $result['price']; ?> / ea</h3>
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input class="form-control" name="quantity" type="number" value="1" disabled>
              </div>
              <div class="form-group">
                <label for="quantity">Date</label>
                <select id="playing_date" name="playing_date" class="form-control">
                <?php
                    foreach($result['playing_date'] as $date) {
                        echo '<option value="'.$date.'">'.$date.'</option>';
                    }
                ?>
                </select>
              </div>
              <div class="form-group">
                <label for="quantity">Time</label>
                <select id="playing_time" name="playing_time" class="form-control">
                <?php
                    foreach($result['playing_time'] as $time) {
                        echo '<option value="'.$time.'">'.$time.'</option>';
                    }
                ?>
                </select>
              </div>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  choose my seats
                </button>
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
              <button type="submit" class="btn btn-success" id="add_to_cart">Add To Cart</button>
            <p style="margin-top: 20px;"><?php echo $result['description']; ?></p>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $result['theater']; ?></h4>
      </div>
      <div class="modal-body">
        <div style="background-color: #ccc;width: 200px;height: 15px;margin:auto"></div>
        <p class="text-center">Screen</p>
        <?php for($row = 1;$row <= 5;$row++): ?>
        <div class="row text-center">
            <?php for($seat = 1; $seat <= 10; $seat++): ?>
                <i class="glyphicon glyphicon-print seat-<?php echo $row."-".$seat; ?>"></i>
            <?php endfor; ?>
        </div>
        <?php endfor; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_seats">Save</button>
      </div>
    </div>
  </div>
</div>
<?php $this->beginBlock("seats") ?>

    (function($) {  
    $.fn.clickToggle = function(func1, func2) {  
        var funcs = [func1, func2];  
        this.data('toggleclicked', 0);  
        this.click(function() {  
            var data = $(this).data();  
            var tc = data.toggleclicked;  
            $.proxy(funcs[tc], this)();  
            data.toggleclicked = (tc + 1) % 2;  
         });  
        return this;  
     };  
    }(jQuery)); 


    var seats = <?php echo json_encode($result['seats']); ?>;
    var playing_date = $("#playing_date").val();
    var playing_time = $("#playing_time").val();
    var playing_datetime = playing_date+' '+playing_time;
    var currentSeats = seats[playing_datetime];
    for (var i in currentSeats) {
        $(".seat-"+currentSeats[i]).css("color", "red");
    }

    $("#playing_date").change(function(){
        $(":input[name=quantity]").val(1);
        $(".glyphicon.glyphicon-print").css("color", "#bbb").removeClass("selected");
        playing_date = $(this).val();
        playing_datetime = playing_date+' '+playing_time;
        var currentSeats = seats[playing_datetime];
        for (var i in currentSeats) {
            $(".seat-"+currentSeats[i]).css("color", "red");
        }
    });
    
    $("#playing_time").change(function(){
        $(":input[name=quantity]").val(1);
        $(".glyphicon.glyphicon-print").css("color", "#bbb").removeClass("selected");
        playing_time = $(this).val();
        playing_datetime = playing_date+' '+playing_time;
        var currentSeats = seats[playing_datetime];
        for (var i in currentSeats) {
            $(".seat-"+currentSeats[i]).css("color", "red");
        }
    });
    $(".glyphicon.glyphicon-print").clickToggle(function(){
        if ($(this).css("color") != "rgb(255, 0, 0)") {
            $(this).css("color", "green");
            $(this).addClass("selected");
        }
    }, function(){
        if ($(this).css("color") != "rgb(255, 0, 0)") {
            $(this).css("color", "#bbb");
        }
    });

    $("#save_seats").click(function(){
        var seats = new Array();
        $(".glyphicon.glyphicon-print.selected").each(function(data){
            seats.push(this.className.split(" ")[2]);
        });
        var count = seats.length;
        $(":input[name=quantity]").val(count);
        $('#myModal').modal('hide');
    });

    $("#add_to_cart").click(function(){
        var id = $(":input[name=id]").val();
        var price = <?php echo $result['price']; ?>;
        var quantity = $(":input[name=quantity]").val();
        var seats = new Array();
        $(".glyphicon.glyphicon-print.selected").each(function(data){
            seats.push(this.className.split(" ")[2]);
        });
        var playing_date = $(":input[name=playing_date]").val();
        var playing_time = $("#playing_time").val();
        if (seats.length <= 0) {
            alert("Please choose your seat!");
        } else {
            $.post("<?php echo Yii::$app->urlManager->createUrl(['cart/store']); ?>", {
                "id": id,
                "price": price,
                "quantity": quantity,
                "seats": seats,
                "playing_date": playing_date,
                "playing_time": playing_time
            }, function(data){
                if (data.code == 0) {
                    alert("Add Tickets Successfully!");
                    window.location.href = "<?php echo Yii::$app->urlManager->createUrl(['cart/view']); ?>";
                } else {
                    alert("Add Tickets Failed, Please Readd!");
                }
            }, "json");
        }
    });


        
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks["seats"], \yii\web\View::POS_END); ?>
