<div class="container">
    <p>Dear, <?php echo $name; ?>:</p>
    <p>Thank you for your booking on Aurora Cinema Website!</p>
    <p>
        <?php $total_price = 0; ?>
        <?php
            foreach($tickets as $ticket): 
                $total_price += $ticket['quantity'] * $ticket['price'];
                echo "<p>".$ticket['movie_name'].": ".$ticket['playing_date']."-".$ticket['playing_time']." ".join(" , ", $ticket['seats'])."</p>";
            endforeach; 
        ?>
    </p>
    <p>Total Price: <span style="color:red;background-color:yellow">$ <?php echo $total_price; ?></span></p>
    <p>This is your Ticket Code: <span style="color:red;background-color:yellow"><?php echo $ticket_code; ?></span></p>
    <p>Please show it to our staff when you arrived at our Aurora Cinemas!</p>
</div>
