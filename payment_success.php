
 <?php
 $db = mysqli_connect('localhost', 'root','','mydb');
 //$pro_name    =  "";
 //$pro_qty     =  "";
 //$pro_price   =  "";
 $price_amount   =  "";
 $payment_number =  "";

if (isset($_POST['CONFIRM'])) {
confirm_payment();
}
//confirm_payment
function confirm_payment(){
global $db;



//receive all details from form
 //$pro_name    =  $_POST['item_name'];
 //$pro_qty     =  $_POST['item_quantity'];
 //$pro_price   =  $_POST['item_price'];
 $price_amount  =  $_POST['total_amount'];
 $payment_number = $_POST['payment_number'];

 if ($db) {
	 
		 $query = "INSERT INTO payment (total_amount,payment_number) 
		 VALUES('$price_amount','$payment_number')";
		 $result=mysqli_query($db, $query);
	if($result){


		 header('location:payment method.php');
	}
	 }


 }

 ?>

