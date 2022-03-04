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
    <div class="main_content" style="float:right;">
    <div class="header">Welcome!! <br>You have confirmed your order<br>Make your payment and confirm here</div> 
               <?php
          ?>
        <div style="clear:both" align="center"></div>
        <br />
        <form method="POST" action="payment_success.php?action = add&id=<?php echo $row['product_id'];?>">
        <div class='content'>
        <h3>Confirmation Payment Details to your Order</h3><br /><br /><br />
        </div>
        <div class="table-responsive"  align="right" class='content'>
            <table class="table table-bordered">
                <?php
                if(!empty($_SESSION['shopping_cart']))
                {
                    $total_quantity = 0;
                    $total_cost = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <td width="10%">Item name chosen</td>
                            <td><?php echo $values['item_name']; ?></td>
                        </tr>
                        <tr>
                             <td width="10%">Quantity/Number of item chosen</td>
                            <td><?php echo $values['item_quantity']; ?></td>
                        </tr>
                        <tr>
                            <td width="20%">Price of item chosen</td>
                            <td><?php echo $values['item_price']; ?></td>
                        </tr>

                        <tr>
                            <td width="15%">Total of Price with respect to Quantity</td>
                            <td><input type="text" name="total_amount" value="<?php echo number_format($values['item_quantity'] * $values['item_price'],2); ?>"></input></td>
                        </tr>
                        <tr>
                            <td><label>Choose Your Payment method</label></td>
                            <td><input type="radio" name="Mobile number" value="Mobile number">Mobile number
                             <input type="radio" name="Bank Card number" value="Bank Card number">Bank Card Number
                            </td>
                        </tr>
                        <tr>
                             <td>Enter Payment number(mobile/Bank Card Number)
                             <td><input type="text" name="payment_number" placeholder="Payment Number" required></input></td>
                        </tr>
                        <tr>
                            <td width="5%">Confirmation of the payment</td>
                            <td><a href="payment_success.php?action=confirm&id=<?php echo $values['item_id']; ?>">
                            <button name="CONFIRM" class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Confirm Your Payment</button>
                            </td>
                        </tr>
                        
                        <?php
                    }
                    ?>
                  
                    <?php
                  
                }
            ?>
            </table>
            <button type='ok' name='payment' class='buy' onclick="pop()" >pay Now</button>
<div id="box"><h1><i>your control number is <?php echo (rand(991056,101901023092)); ?> <br/>
               our company number is 4040<br/>
			   available at all payment platforms <br></i></h1>
			   <button  onclick="pop()" class="close">close</button>
			   <a href="pickup.php" style="text-decoration:none;" class="close">pay</a>
            
            </form>
            </div>
    </body>
</html>