<?php
// Connection and Helper
require_once '../helper.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("Location: ".BASE_URL);
    exit;
}


// Define variables and initialize with empty values
$judul_err = $isi_artikel_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){

    // Validate judul
    if(empty(trim($_REQUEST["judul"]))){
        $judul_err = "Please enter a judul.";     
    } else {
        $param_judul = trim($_REQUEST["judul"]);
    }

    // Validate isi_artikel
    if(empty(trim($_REQUEST["isi_artikel"]))){
        $isi_artikel_err = "Please enter a isi_artikel.";     
    } elseif(strlen(trim($_REQUEST["isi_artikel"])) <= 25){
        $isi_artikel_err = "isi artikel harus setidaknya lebih dari 25 karakter.";
    } else {
        $param_isi_artikel = trim($_REQUEST["isi_artikel"]);
    }


    // Check input errors before inserting in database
    if(empty($judul_err) && empty($isi_artikel_err)){


        // Prepare an update statement
        $sql = "UPDATE artikel SET judul = ?, isi_artikel = ?, tgl_diubah = NOW() WHERE id = ? AND pengguna_id = ?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssis", $param_judul, $param_isi_artikel, $param_id, $param_pengguna_id);
            
            // Set parameters
            $param_id               = trim($_REQUEST['id']);
            $param_pengguna_id      = $_SESSION['username'];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['updated'] = true;
                header("Location: ".BASE_URL.'views/artikel/detail/?id='.$param_id);
            } else{
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Response
    if (!empty($judul_err) || !empty($isi_artikel_err)) {
        $msg_err = $judul_err.'#'.$isi_artikel_err; // only 1 variable assign
        $_SESSION['failUpdate'] = $msg_err;
        $_SESSION['dataForm']   = ['judul' => $_REQUEST['judul'], 'isi_artikel' => $_REQUEST['isi_artikel']];
        header('Location: '.BASE_URL.'views/artikel/ubah/?id='.$_REQUEST['id']);
    }

    // Close connection
    mysqli_close($link);
     
   
} else {

    header("Location: ".BASE_URL, true, 400); // Bad Request
    exit;

}