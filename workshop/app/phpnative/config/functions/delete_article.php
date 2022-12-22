<?php
// Connection and Helper
require_once '../helper.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL.'login.php');
    exit;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET" && count($_GET) > 0){

    // Prepare an delete statement
    $sql = "DELETE FROM artikel WHERE id = ? AND pengguna_id = ?";
     
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "is", $param_id, $param_pengguna_id);
        
        // Set parameters
        $param_id               = trim($_REQUEST['id']);
        $param_pengguna_id      = $_SESSION['username'];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $_SESSION['deleted'] = $param_id;
            header("Location: ".BASE_URL.'views/artikel.php');
        } else{
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
        }
    } else {
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