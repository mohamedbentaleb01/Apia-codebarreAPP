<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <style>
  body {
      background-image: url('');
      background-repeat: no-repeat;
      background-size: 100% ;
      backdrop-filter: blur(5px);
    }
  </style>

  <br><br><br><br>
  <img src="back.png" style="width : 10%;margin-left: 45%;" alt=""/>

  
<br><br>
  
<?php

require 'session.php';

$msg = $_GET['status'];

if($msg == "success"){
  
  echo'
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
  <div style="margin-left: 33%; margin-right:33%;" class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  Produit ajouté avec succée !
  </div>
  </div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>';
  
 header( "refresh:3; url=listproduits.php" );
}

if($msg == "updated"){

  $id = $_GET['id'];

  echo'
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
  <div style="margin-left: 33%; margin-right:33%;" class="alert alert-info d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  Produit Modifié avec succée !
  </div>
  </div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>';
  
 header( "refresh:3; url=produit.php?id=$id" );

}
if($msg == "Deleted"){

  $delid = $_GET['id'];
  echo'
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
  <div style="margin-left: 33%; margin-right:33%;" class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  Produit n° '.$delid.' est supprimé !
  </div>
  </div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>';
  
 header( "refresh:2; url=listproduits.php" );

}

if($msg == "barcode"){

  $id = $_GET['produit_id'];
      $produit = $_GET['nom'];
      $prix = $_GET['prix'];
      $qte = $_GET['qte_cb'];

  echo'<div class="alert alert-warning alert-dismissible fade show" style="margin-left: 33%; margin-right:33%;" style role="alert">
  <strong>Génération de code-barre en cours !</strong> Veuillez patienter SVP.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>
</div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>';

if(isset($_GET['submit']) && !empty($_GET['produit_id']) && !empty($_GET['prix']) && !empty($_GET['qte_cb'] && !empty($_GET['status']))){
header( "refresh:4; url=barcodeprint.php?id=$id&&nom=$produit&&prix=$prix&&qte_cb=$qte");
}
else {
  echo'<b style="color:red;">Something wrong</b>';
}
}

if($msg == "connected"){

  echo'<div class="alert alert-success alert-dismissible fade show" style="margin-left: 33%; margin-right:33%;" style role="alert">
  <strong>Bienvenu dans votre session !</strong> Veuillez patienter SVP.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>
</div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>
  ';
header( "refresh:2; url=espacemagasinier.php");

}

if($msg == "destroyed"){
  echo'<div class="alert alert-danger alert-dismissible fade show" style="margin-left: 33%; margin-right:33%;" style role="alert">
  <strong>Cette session est expirer ! </strong> Veuillez se reconnecter.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>
  ';
}

if($msg == "qte"){
  $id = $_GET['id'];
  echo'<div class="alert alert-success alert-dismissible fade show" style="margin-left: 33%; margin-right:33%;" style role="alert">
  <strong>Quantité du produit n°'.$id.' a été modifié avec succés ! </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>
</div><br><div align="center"><img src="Preloader_2.gif" align="center" style="" alt=""/></div>

  ';
  header( "refresh:3; url=gestionproduit.php");
}







exit();


?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>