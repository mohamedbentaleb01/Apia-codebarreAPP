<?php

// Initialiser la session
  session_start();
  session_regenerate_id(true);
  // echo session_id();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit(); 
  }
  //destroy session after delay
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 480)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("location:index.php?status=destroyed");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>