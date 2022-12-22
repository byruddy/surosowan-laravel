<?php  
	// Connection and Helper
	require_once '../helper.php';


  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"])){
      header("Location: ".BASE_URL);
      exit;
  }

	// Define variables and initialize with empty values
  $username = $password = $confirm_password = $nama = $jenis_kelamin = "";
  $username_err = $password_err = $nama_err = $jenis_kelamin_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
 
        // Validate username
        if(empty(trim($_REQUEST["username"]))){
            $username_err = "Please enter a username.";
        } else {
            // Prepare a select statement (Checking username unique)
            $sql = "SELECT * FROM pengguna WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_REQUEST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_REQUEST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Validate password
        if(empty(trim($_REQUEST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_REQUEST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_REQUEST["password"]);
        }
        
        // Validate confirm password
        // if(empty(trim($_REQUEST["confirm_password"]))){
        //     $confirm_password_err = "Please confirm password.";     
        // } else {
        //     $confirm_password = trim($_REQUEST["confirm_password"]);
        //     if(empty($password_err) && ($password != $confirm_password)){
        //         $confirm_password_err = "Password did not match.";
        //     }
        // }
        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($nama_err) && empty($jenis_kelamin_err)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO pengguna (username, password, nama, jenis_kelamin, tgl_diubah, tgl_dibuat) VALUES (?, ?, ?, ?, NOW(), NOW())";
             
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_nama, $param_jenis_kelamin);
                
                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                $param_nama     = trim($_REQUEST['nama']);
                $param_jenis_kelamin= trim($_REQUEST['jenis_kelamin']);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("Location: ".BASE_URL.'register.php');
                } else{
                    echo "Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
	    // Response
	    if (!empty($username_err) || !empty($password_err) || !empty($nama_err) || !empty($jenis_kelamin_err)) {
	    	$msg_err = $username_err.'#'.$password_err.'#'.$nama_err.'#'.$jenis_kelamin_err; // only 1 variable assign
	    	$_SESSION['failSignUp'] = $msg_err;
	    	$_SESSION['dataForm']   = ['username' => $_REQUEST['username'], 'nama' => $_REQUEST['nama'], 'jenis_kelamin' => $_REQUEST['jenis_kelamin']];
	    	header('Location: '.BASE_URL.'register.php');
	    } else {
	    	$_SESSION['registered']   = $_REQUEST['username'];
	    	header('Location: '.BASE_URL.'login.php');
        }

        // Close connection
        mysqli_close($link);

	} else {
        header("Location: ".BASE_URL, true, 400); // Bad Request
        exit;
    }