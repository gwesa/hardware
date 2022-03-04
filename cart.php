<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:cart.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hardware Shopping web</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Hardware Shopping store</a>
			</div>


		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>Price in TSh.</b></div>
					</div>
					<br><br>
					<?php
                if(!empty($_SESSION['shopping_cart']))
                {
                    $total_quantity = 0;
                    $total_cost = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                    {
                        ?>
					<div id='cartdetail'>
					<div class="row">
					<div class="col-md-2"><?php echo $row['product_title']; ?></div>
						<div class="col-md-2"><img src="<?php echo $row['product_image'];?>" class="img-responsive" width="60px" height="60px"></div>
						<div class="col-md-2"><?php echo $row['product_price']; ?></div>
						<div class="col-md-2"><?php echo $values['item_quantity']; ?></div>
						<div class="col-md-2"><?php echo number_format($values['item_quantity'] * $values['item_price'], 2); ?></div>
					</div>
					</div>
					<?php
                         $total_quantity =  $total_quantity + $values['item_quantity']; 
                         $total_cost =  $total_cost + ($values['item_quantity'] * $values['item_price']);
                    }
                    ?>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total Quantity: <?php echo number_format( $total_quantity); ?></b>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total Cost: <?php echo number_format( $total_cost,2); ?></b>
						</div>
					</div>
					<?php
				}
				?>
					<div class="panel-footer">

					</div>
				</div>
				<a href="my cart.php?action=confinm&item_quantity=<?php echo $total_quantity; ?>">
				<button class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Checkout</button>
			</div>

			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
<div class="foot"><footer>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
