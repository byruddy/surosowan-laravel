<?php
	// Connection
	require_once('connection.php');

  // Set Default Time
  date_default_timezone_set('Asia/Jakarta'); 

  // BASE URL (Path sesuai server)
  $realpath    = str_replace('\\', '/', dirname(__FILE__));
  $projectName = substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", -6);
  define("BASE_URL", "http://$_SERVER[HTTP_HOST]$projectName");

  // NAME_APP (Nama aplikasi simple)
  define("NAME_APP", "Penulis");

