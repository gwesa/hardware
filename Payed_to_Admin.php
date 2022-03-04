<?php
session_start();
    include('dbconnect.php');
		$sql="SELECT * FROM payment";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		$pageno=ceil($count/6);
		for($i=1;$i<=$pageno;$i++) {
			$page_no = "<li><a href='#' page='$i' class='page'>$i</a></li>";
        }
        $td = "";
while ($row = mysqli_fetch_assoc($run_query)) {
    $user_id = $row['user_id'];
    $total_price = $row['total_amount'];
    $payment_number = $row['payment_number'];
    $transaction = $row['transaction_id'];
    
    $td .= "<tr>
    <td>$user_id</td>
    <td> $total_price</td>
    <td>$payment_number</td>
    <td> $transaction</td>
    </tr>";
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/project.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" style="float:left;">
            <h2>Dashbord</h2>
            <ul>
            <li><a href="products.php"><i class="fa fa-search"></i>Product</a></li>
              <li><a href="Order_to_Admin.php"><i class="fa fa-search"></i>Order Placed</a></li>
              <li><a href="Payed_to_Admin.php"><i class="fa fa-search"></i>Product Payed</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main_content" style="float:right;">
        <div class="header">Order payed by Customers</div> 
            <div class='content'>
                <table border='0'>
                    <?php echo $td;?>
                </table>
            </div>
        </div>
    </div>    
</body>
</html>