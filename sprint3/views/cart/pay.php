<?php
    $this->title = "Cart - Cinema Aurora";
    use yii\bootstrap\ActiveForm;
?>
<form id="payForm" action="" method="post">
<div class="container" style="margin-top: 20px">
<div class="row">
<div class="col-sm-6 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading" style="height: 64px">
            <h3 class="panel-title text-center">Please input your information:</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address" required>
          </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6">
<!-- <REDIT CARD FORM STARTS HERE -->
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table" >
                <div class="row display-tr" >
                    <h3 class="panel-title display-td pull-left text-center" style="margin-left: 15px;margin-top:5px;">Payment Details</h3>
                    <div class="display-td pull-right" >
                        <img class="img-responsive pull-right" src="web/images/ccard.png">
                    </div>
                </div>                    
            </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="cardNumber">CARD NUMBER</label>
                                <div class="input-group">
                                    <input
                                        id="card_number"
                                        type="tel"
                                        class="form-control"
                                        name="cardNumber"
                                        placeholder="Valid Card Number"
                                        autocomplete="cc-number"
                                        required autofocus 
                                    />
                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                <input 
                                    id="card_ext"
                                    type="tel" 
                                    class="form-control" 
                                    name="cardExpiry"
                                    placeholder="MM / YY"
                                    autocomplete="cc-exp"
                                    required 
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 pull-left">
                            <div class="form-group">
                                <label for="cardCVC">CV CODE</label>
                                <input 
                                    id="cvc"
                                    type="tel" 
                                    class="form-control"
                                    name="cardCVC"
                                    placeholder="CVC"
                                    autocomplete="cc-csc"
                                    required
                                />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="display:none;">
                        <div class="col-xs-12">
                            <p class="payment-errors"></p>
                        </div>
                    </div>
            </div>
        </div>            
        <!-- CREDIT CARD FORM ENDS HERE -->
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-xs-12">
            <input id="payBtn" type="submit" class="subscribe btn btn-success btn-lg btn-block" value="Start Paying" >
        </div>
    </div>       
</div>
</div>
</form>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PAYMENT STATUS</h4>
      </div>
      <div class="modal-body text-center" style="font-size: 18px;">
          <i class="glyphicon glyphicon-ok-sign" style="color: green;"></i>
          Congradulations! Paied Successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $this->beginBlock("pay") ?>
    $(function(){
        $("#payForm").submit(function(){
            $("#payBtn").attr("disabled", true);
            var name = $("#name").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var card_no = $("#card_number").val();
            var card_ext = $("#card_ext").val();
            var card_cvc = $("#cvc").val();
            $.post('<?php echo Yii::$app->urlManager->createUrl(['cart/pay']); ?>', {"name": name, "email": email, "address": address, "card_no": card_no, "card_ext": card_ext, "card_cvc": card_cvc}, function(data){
                if (data.code == 0) {
                    var html = '<i class="glyphicon glyphicon-ok-sign" style="color: green;"></i>';
                } else {
                    var html = '<i class="glyphicon glyphicon-remove" style="color: red;"></i>'; 
                }
                html += data.msg;
                $(".modal-body").html(html);
                $("#myModal").modal("show");
                $("#payBtn").attr("disabled", false);
            }, "json");
            return false;
        });
    });

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks["pay"], \yii\web\View::POS_END); ?>




