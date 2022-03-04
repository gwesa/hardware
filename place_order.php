<?php

$db = mysqli_connect('localhost', 'root','','mydb');
		$pro_name    =  "";
        $pro_qty     =  "";
        $pro_price   =  "";
        $price_amount=  "";

if (isset($_POST['CONFIRM'])) {
    place_order();
}
//place order
function place_order(){
    global $db;



    //receive all details from form
		$pro_name    =  $_POST['item_name'];
        $pro_qty     =  $_POST['item_quantity'];
        $pro_price   =  $_POST['item_price'];
        $price_amount=  $_POST['total_amount'];

        if ($db) {
            
				$query = "INSERT INTO cart (item_name,item_quantity,item_price,total_amount) 
                VALUES('$pro_name','$pro_qty','$pro_price','$price_amount')";
                $result=mysqli_query($db, $query);
                
           if($result){
              
               echo '<script>window.location="payment method.php"</script>';
           }
            }


        }
?>