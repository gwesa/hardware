<?php
	

	// connect to database
	$db = mysqli_connect('localhost', 'root','','mydb');

	// variable declaration
	$product_cart  = "";
    $product_brand    = "";
    $product_title    = "";
    $product_price    = "";
    $product_desc    = "";
    $product_image    = "";
    $product_keywords    = "";
	

	// call the register() function if register_btn is clicked
	if (isset($_POST['submit'])) {
		register();
    }
    
    // ADD PRODUCT
	function register(){
		global $db;

		// receive all input values from the form
		$product_cart      =  $_POST['product_cart'];
		$product_brand     =  $_POST['product_brand'];
		$product_title     =  $_POST['product_title'];
        $product_price     =  $_POST['product_price'];
        $product_desc      =  $_POST['product_desc'];
        $product_image     =  $_POST['product_image'];
        $product_keywords  =  $_POST['product_keywords'];
	

		// form validation: ensure that the form is correctly filled
		

		// register user if there are no errors in the form
		if ($db) {

			
				$query = "INSERT INTO tbl_product (product_cart,product_brand, product_title,product_price,product_desc,product_image,product_keywords) 
						  VALUES('$product_cart','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
				mysqli_query($db, $query);

				// get id of the created user
				

				// put logged in user in session
				header('location: Admin Products.php');
		}
    }
    ?>