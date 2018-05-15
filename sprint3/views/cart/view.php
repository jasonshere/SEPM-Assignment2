<?php
    $this->title = "Cart - Cinema Aurora";
?>
<div class="container" style="margin-top: 20px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col">Movie's Name</th>
                <th scope="col">Playing Time</th>
                <th scope="col">Hall No.</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Seats</th>
                <th scope="col" class="text-right">Price</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
        <?php foreach($cart as $data): ?>
            <tr>
                <td><img style="width:50px;height:50px;" src="<?php echo strstr($data['movie_post'], "holder.js")?$data['movie_small_post']:$data['movie_post']; ?>" /> </td>
                <td><?php echo $data['movie_name']; ?></td>
                <td><label class="label label-danger"><?php echo $data['playing_date'].' - '. $data['playing_time']; ?></label></td>
                <td><label class="label label-success"><?php echo $data['movie_theater']; ?></label></td>
                <td><?php echo $data['quantity']; ?></td>
                <td><?php echo "<label class=\"label label-primary\">". join("</label>  <label class=\"label label-primary\">", $data['seats']); ?></label></td>
                <td class="text-right"><span><?php echo $sub = $data['price'] * $data['quantity']; ?></span> $</td>
                <td class="text-right"><button class="btn btn-sm btn-danger delete_cart" data="<?php echo $data['cart_id']; ?>"><i class="fa fa-trash"></i> </button> </td>
            </tr>
            <?php $total += $sub; ?>
        <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total</strong></td>
                <td class="text-right"><strong><span class="total_price"><?php echo $total; ?></span> $</strong></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><button onclick="location.href='<?php echo Yii::$app->urlManager->createUrl(['cart/pay']); ?>'" class="btn btn-success pay">Pay</button></td>
            </tr>
        </tbody>
    </table>
</div>

<?php $this->beginBlock("delete_cart") ?>
    $(function(){
        $(".delete_cart").click(function(){
            if (!confirm('Do you make sure to delete it?')) {
                return false;
            }
            var obj = $(this);
            var cart_id = parseInt($(this).attr('data'));
            $.post("<?php echo Yii::$app->urlManager->createUrl('cart/delete'); ?>", {"cart_id": cart_id}, function(data){
                if (data.code == 0) {
                    obj.parent().parent().remove();
                    var price = parseFloat($(".total_price").html());
                    var p = parseFloat(obj.parent().prev().find("span").html());
                    $(".total_price").html(price - p);
                    if ($(".total_price").html() == "0") {
                        $(".pay").attr("disabled", true);
                    }
                }
            }, "json");
        });
        if ($(".total_price").html() == "0") {
            $(".pay").attr("disabled", true);
        }
    });

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks["delete_cart"], \yii\web\View::POS_END); ?>
