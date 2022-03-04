<?php

session_start();
//$product_id = $_REQUEST['product_id'];
$connect = mysqli_connect('localhost','root','','mydb');
if (isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['shopping_cart']))
    {
        $item_array_id = array_column($_SESSION['shopping_cart'],"item_id");
        if(!in_array($_GET['product_id'], $item_array_id))
        {
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'item_id'       =>  $_GET['product_id'],
                'item_name'     =>  $_POST['hidden_name'],
                'item_price'     =>  $_POST['hidden_price'],
                'item_quantity'     =>  $_POST['quantity']
            );
            $_SESSION['shopping_cart'][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="dashbord.php"</script>';
        }

    }
    else
    {
        $item_array = array(
            'item_id'       =>  $_GET['product_id'],
            'item_name'     =>  $_POST['hidden_name'],
            'item_price'     =>  $_POST['hidden_price'],
            'item_quantity'     =>  $_POST['quantity']
        );
        $_SESSION['shopping_cart'][0] = $item_array;
    }
}

if(isset($_GET['action']))
{
    if($_GET['action'] == "delete")
    {
        foreach($_SESSION['shopping_cart'] as $keys => $values)
        {
            if($values['item_id'] == $_GET['product_id'])
            {
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item Removed Successfully")</script>';
                echo '<script>window.location="my cart.php"</script>';
            }
        } 
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            shopping cart
        </title>
        <style>
            .product{
                border:1px;
                background-color: #f1f1f1
            }
        </style>
    </head>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Dashbord</h2>
            <ul>
                <li><a href="dashbord.php"><i class="fa fa-home" ></i>Home</a></li>
                <li><a href="products.php"><i class="fa fa-search"></i>Product</a></li>
                <li><a href="#"><i class="fa fa-search" >Search</i></li>
                <li><a href="#"><i class="fa fa-product-hunt" >Setting</i></li>
                <li><a href="my cart.php"><i class="fa fa-shopping-cart" >My cart</i></li>
                <li><a href="#"><i class="fas fa-map"></i>Location</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    <body>
        <div class="main_content" style="float:right;">
            <div class="container" style="width:700px" align="center">
                <h3>Shopping Cart<h3><br />
                <?php
                  $query = "SELECT * FROM tbl_product ORDER BY product_id ASC";
                  $result = mysqli_query($connect, $query);
                 
                 if(mysqli_num_rows($result)>0){
                 while($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-md-4" align="right">
                    <form method="POST" action="my cart.php?action = add&id=<?php echo $row['product_id'];?>">
                        <div class="product">
                            <table>
                                <tr>
                                    <th><img src="<?php echo $row['product_image'];?>" class="img-responsive" /><br>
                                    <h4 class="text-info"><?php echo $row['product_title']; ?></h4>
                                    <h4 class="text-danger"><?php echo $row['product_price']; ?></h4>
                                    <input type="text" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="hidden_name" value="<?php echo $row['product_title']; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row['product_price']; ?>" />
                                    <input type="submit" name="add_to_cart" style="margin-top:5px" class="btn btn-success" value="Place Order" /></th>
                                </tr>
                            </table>
                        </div>

                    </form>

                </div>
                <?php
                   }
                 }
                ?>
            <div style="clear:both"></div>
           <br />
       
        </div>
        </div>

    </body>
</html>