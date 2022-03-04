<?php
	

	// connect to database
	$db = mysqli_connect('localhost', 'root','','mydb');

	// variable declaration
	$username = "";
	$email    = "";
	

	// call the register() function if register_btn is clicked
	if (isset($_POST['submit'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login'])) {
		login();
	}


	// REGISTER USER
	function register(){
		global $db;

		// receive all input values from the form
		$username    =  $_POST['username'];
		$password    =  $_POST['password'];
		$email       =  $_POST['email'];
		$CellPhone   =  $_POST['CellPhone'];
	

		// form validation: ensure that the form is correctly filled
		

		// register user if there are no errors in the form
		if ($db) {
			$password = md5($password);//encrypt the password before saving in the database

			
				$query = "INSERT INTO users (username,password, email,CellPhone) 
						  VALUES('$username','$password', '$email', $CellPhone)";
				mysqli_query($db, $query);

				// get id of the created user
				

				// put logged in user in session
				header('location: login.php');
				//header('location: home.php');				
			

		}


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

			
					
					

					header('location: dashbord.php');
			}else {
				echo "Wrong username/password combination";
			}
		}	
			else {
				echo "Wrong username/password combination";
			}
	 
	}

?>