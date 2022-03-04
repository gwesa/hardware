<?php
session_start();
    include('dbconnect.php');
		$sql="SELECT * FROM tbl_product";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		$pageno=ceil($count/6);
		for($i=1;$i<=$pageno;$i++) {
			$page_no = "<li><a href='#' page='$i' class='page'>$i</a></li>";
        }
        $td = "";
while ($row = mysqli_fetch_assoc($run_query)) {
    $product_id = $row['product_id'];
    $product_brand = $row['product_brand'];
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_desc = $row['product_desc'];
    $product_image = $row['product_image'];
    $product_keywords = $row['product_keywords'];
    $td .= "<tr>
    <td>$product_title</td>
    <td><img height='100px' width='110px' src='$product_image'></td>
    <td>$product_price</td>
    <td>$product_desc</td>
    <td>$product_keywords</td>
    <td style='width:10%;'>
    <a href='Untitled-1.php?product_id=$product_id'>Buy Now</a>
    <br><br>
    <a href='Add Cart.php'?product_id=$product_id'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
    </td>
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
            <li><a href="dashbord.php"><i class="fa fa-home" ></i>Home</a></li>
              <li><a href="products.php"><i class="fa fa-search"></i>Product</a></li>
              <li><a href="my cart.php"><i class="fa fa-shopping-cart" >My cart</i></li>
              <li><a href="#"><i class="fas fa-map"></i>Location</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main_content" style="float:right;">
        <div class="header">Welcome!! To our shopping system<br>Enjoy our service you can buy your products of your choise</div> 
            <div class='content'>
                <table border='0'>
                    <?php echo $td;?>
                </table>
            </div>
        </div>
    </div>    
</body>
</html>