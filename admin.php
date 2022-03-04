<?php

	// connect to database
	$db = mysqli_connect('localhost', 'root','','mydb');

	// variable declaration
	$username = "";
	$email    = "";
    
    // call the login() function if register_btn is clicked
	if (isset($_POST['login'])) {
		login();
    }
    
    
    function login(){
		global $db;

		// grap form values
		$username = $_POST['username'];
		$password = $_POST['password'];

		// make sure form is filled properly
		

		// attempt login if no errors on form
		if ($db) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {

			
					
					

					header('location: adminpage.php');
			}else {
				echo "Wrong username/password combination";
			}
		}	
			else {
				echo "Wrong username/password combination";
			}
	 
	}
?>