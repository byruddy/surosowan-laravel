<?php
// Connection and Helper
require_once '../helper.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL);
    exit;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){

    // Get my email
    // $result  = mysqli_query($link, "SELECT email FROM persons WHERE id='".$_REQUEST['id']."' LIMIT 1");
    // $myEmail = mysqli_fetch_assoc($result)['email'];

    // Prepare a select statement (Checking email unique)
    // $sql = "SELECT id FROM persons WHERE NOT email = '".$myEmail."' AND email = ?";
    
    // if($stmt = mysqli_prepare($link, $sql)){
    //     // Bind variables to the prepared statement as parameters
    //     mysqli_stmt_bind_param($stmt, "s", $param_email);
        
    //     // Set parameters
    //     $param_email = trim($_REQUEST["email"]);
        
    //     // Attempt to execute the prepared statement
    //     if(mysqli_stmt_execute($stmt)){
    //         /* store result */
    //         mysqli_stmt_store_result($stmt);
            
    //         if(mysqli_stmt_num_rows($stmt) == 1){
    //             echo 'This email is already taken, please resend data form and change it!';
    //         } else{
    //             $email = trim($_REQUEST["email"]);
    //         }
    //     } else{
    //         echo "Oops! Something went wrong. Please try again later.";
    //     }

    //     // Close statement
    //     mysqli_stmt_close($stmt);
    // }

    // Prepare an update statement
    $sql = "UPDATE pengguna SET nama = ?, jenis_kelamin = ?, tgl_diubah = NOW() WHERE username = ?";
     
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_nama, $param_jenis_kelamin, $param_username);
        
        // Set parameters
        $param_nama             = trim($_REQUEST['nama']);
        $param_jenis_kelamin    = trim($_REQUEST['jenis_kelamin']);
        $param_username         = $_SESSION['username'];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $_SESSION['updated'] = true;
            header("Location: ".BASE_URL.'views/akun.php');
        } else{
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
        }
    } else{
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);

        // Close statement
        mysqli_stmt_close($stmt);
    }
     
    // Close connection
    mysqli_close($link);
   
} else {

    header("Location: ".BASE_URL, true, 400); // Bad Request
    exit;

}