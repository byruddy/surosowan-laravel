<?php  
  // Connection and Helper
  require_once '../helper.php';


  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(!isset($_SESSION["loggedin"])){
      header("Location: ".BASE_URL.'login.php');
      exit;
  }

  // Define variables and initialize with empty values
  $judul = $isi_artikel = $id_inserted = "";
  $judul_err = $isi_artikel_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) > 0){
 
        // Validate judul
        if(empty(trim($_REQUEST["judul"]))){
            $judul_err = "Please enter a judul.";     
        } else {
            $judul = trim($_REQUEST["judul"]);
        }

        // Validate isi_artikel
        if(empty(trim($_REQUEST["isi_artikel"]))){
            $isi_artikel_err = "Please enter a isi_artikel.";     
        } elseif(strlen(trim($_REQUEST["isi_artikel"])) <= 25){
            $isi_artikel_err = "isi artikel harus setidaknya lebih dari 25 karakter.";
        } else {
            $isi_artikel = trim($_REQUEST["isi_artikel"]);
        }
        
        // Check input errors before inserting in database
        if(empty($judul_err) && empty($isi_artikel_err)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO artikel (pengguna_id, judul, isi_artikel, tgl_diubah, tgl_dibuat) VALUES (?, ?, ?, NOW(), NOW())";
             
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_id, $param_judul, $param_isi_artikel);
                
                // Set parameters
                $param_id          = $_SESSION['username'];
                $param_judul       = trim($_REQUEST['judul']);
                $param_isi_artikel = trim($_REQUEST['isi_artikel']);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $id_inserted = mysqli_stmt_insert_id($stmt);
                } else{
                    echo "Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
	    // Response
	    if (!empty($judul_err) || !empty($isi_artikel_err)) {
	    	$msg_err = $judul_err.'#'.$isi_artikel_err; // only 1 variable assign
	    	$_SESSION['failCreate'] = $msg_err;
	    	$_SESSION['dataForm']   = ['judul' => $_REQUEST['judul'], 'isi_artikel' => $_REQUEST['isi_artikel']];
	    	header('Location: '.BASE_URL.'views/artikel/buat/');
	    } else {
	    	$_SESSION['created']   = $id_inserted;
            header("Location: ".BASE_URL.'views/artikel/detail/?id='.$id_inserted);
        }

        // Close connection
        mysqli_close($link);

	} else {
        header("Location: ".BASE_URL, true, 400); // Bad Request
        exit;
    }