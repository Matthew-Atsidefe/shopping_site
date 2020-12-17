<?php

    if(!isset ($_GET ['categoryID'])) {
        header ("Location:Index.php");
    }

    $stock_sql="SELECT stock.stockID, stock.name, stock.price, category.name AS catname FROM stock JOIN category ON stock.categoryID=category.categoryID WHERE stock.categoryID=".$_GET['categoryID'];
    if($stock_query=mysqli_query($dbconnect, $stock_sql)) {
        $stock_rs=mysqli_fetch_assoc($stock_query);
    }

    if (mysqli_num_rows($stock_query)==0) {
    	echo "Sorry, we have no items currently in stock";
    } else {
    	?>
    	<h1><?php echo $stock_rs ['catname']; ?></h1>
    	<?php do {
    		?>
    		<div class="item">
    		<p><?php echo $stock_rs['name']; ?></p>
    		<p>$<?php echo $stock_rs['price']; ?></p>
    		</div>
    	<?php
    	} while ( $stock_rs=mysqli_fetch_assoc($stock_query));
    	?>

    <?php	
    }
    
?>