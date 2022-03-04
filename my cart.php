<?php

session_start();
$connect = mysqli_connect('localhost','root','','mydb');
if (isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['shopping_cart']))
    {
        $item_array_id = array_column($_SESSION['shopping_cart'],"item_id");
        if(!in_array($_GET['id'], $item_array_id))
        {
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'item_id'       =>  $_GET['id'],
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
            'item_id'       =>  $_GET['id'],
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
            if($values['item_id'] == $_GET['id'])
            {
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item Removed Successfully")</script>';
                echo '<script>window.location="my cart.php"</script>';
            }
        } 
    }
    if($_GET['action'] == "confirm")
    {
        foreach($_SESSION['shopping_cart'] as $keys => $values)
        {
            if($values['item_id'] == $_GET['id'])
            {
                //unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item Added Successfully")</script>';
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
            {
                box-sizing: border-box;
                border: 0;
                margin: 0 auto 100px;
            }
            </style>
    </head>
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
    <body>
    <br />
    </div>
        <div class="main_content" style="float:right;">
               <?php
          ?>
        <div style="clear:both" align="center"></div>
        <br />
        <form method="POST" action="place_order.php">
        <div align="center" class='content'>
        <h3>Order Detail</h3><br /><br /><br />
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td width="10%">Item name</td>
                    <td width="10%">Quantity</td>
                    <td width="20%">Price</td>
                    <td width="15%">Total</td>
                    <td width="5%">Action</td>
                </tr>
                <?php
                if(!empty($_SESSION['shopping_cart']))
                {
                    $total_quantity = 0;
                    $total_cost = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <td><input type="text" name="item_name" value="<?php echo $values['item_name']; ?>"></input></td>
                            <td><input type="text" name="item_quantity" value="<?php echo $values['item_quantity']; ?>"></input></td>
                            <td><input type="text" name="item_price" value="<?php echo $values['item_price']; ?>"></input></td>
                            <td><input type="text" name="total_amount" value="<?php echo number_format($values['item_quantity'] * $values['item_price'],2); ?>"></input></td>
                            <td><a href="my cart.php?action=delete&id=<?php echo $values['item_id']; ?>"><span class="text-danger">Remove</span></a>
                            <td><a href="place_order.php?action=confirm&id=<?php echo $values['item_id']; ?>">
                            <button name="CONFIRM" class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">CONFIRM</button>
                            </td>
                        </tr>
                        <?php
                         $total_quantity =  $total_quantity + $values['item_quantity']; 
                         $total_cost =  $total_cost + ($values['item_quantity'] * $values['item_price']);
                    }
                    ?>
                    <tr>
                    <td colspan="2" align="right">Total Quantity</td>
                    <td align="right"><?php echo number_format( $total_quantity); ?></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="right">Total Cost</td>
                        <td align="right"><?php echo number_format( $total_cost,2); ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
            ?>
            </table>
            </form>
            </div>
    </body>
</html>