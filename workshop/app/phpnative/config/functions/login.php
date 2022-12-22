<?php  
	// Connection and Helper
	require_once '../helper.php';

	// Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"])){
		header("Location: ".BASE_URL);
		exit;
	}

	// Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
	 
	    // Check if username is empty
	    if(empty(trim($_REQUEST["username"]))){
	        $username_err = "Please enter username.";
	    } else{
	        $username = trim($_REQUEST["username"]);
	    }
	    
	    // Check if password is empty
	    if(empty(trim($_REQUEST["password"]))){
	        $password_err = "Please enter your password.";
	    } else {
	        $password = trim($_REQUEST["password"]);
	    }

	    // Validate username
	    if(empty($username_err) && empty($password_err)){
	        // Prepare a select statement
	        $sql = "SELECT username, password FROM pengguna WHERE username = ?";
	        
	        if($stmt = mysqli_prepare($link, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "s", $param_username);
	            
	            // Set parameters
	            $param_username = $username;
	            
	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                // Store result
	                mysqli_stmt_store_result($stmt);
	                
	                // Check if username exists, if yes then verify password
	                if(mysqli_stmt_num_rows($stmt) == 1){                    
	                    // Bind result variables
	                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
	                    if(mysqli_stmt_fetch($stmt)){
	                        if(password_verify($password, $hashed_password)){
	                            
	                            // Store data in session variables
	                            $_SESSION["loggedin"] = true;
	                            $_SESSION["username"] = $username;                            
	                            // Redirect user to welcome page
	                            header("location: ".BASE_URL.'views/akun.php');
	                        } else{
	                            // Display an error message if password is not valid
	                            $password_err = "The password you entered was not valid.";
	                        }
	                    }
	                } else{
	                    // Display an error message if username doesn't exist
	                    $username_err = "No account found with that username.";
	                }
	            } else {
	                echo "Oops! Something went wrong. Please try again later or contact Administrator.";
	            }

	            // Close statement
	            mysqli_stmt_close($stmt);
	        }
	    }

	    // Response
	    if (!empty($username_err) || !empty($password_err)) {
	    	$msg_err = $password_err.$username_err; // only 1 variable assign
	    	$_SESSION['failSignIn'] = [$msg_err, $_REQUEST['username']];
	    	header('Location: '.BASE_URL.'login.php');
	    }
	    
	    // Close connection
	    mysqli_close($link);
	} else {
      header("Location: ".BASE_URL.'login.php', true, 400); // Bad Request
      exit;
  }