<?php 

require 'connexion.php';
require 'session.php';

$id = $_POST['id'];
$qte = $_POST['qtechg'];

$query = "UPDATE produit SET qte = '$qte' WHERE produit_id = '$id'";
$result = mysqli_query($conn, $query);

if($result){
  header('location:status.php?status=qte&&id='.$id.'');
}else{
  echo '<div class="alert alert-danger alert-dismissible fade show" style="margin-left: 33%; margin-right:33%;" style role="alert">
  <a href="gestionproduit.php"><strong>Veillez réessayé !</strong></a> .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>';
}

// mysqli_close($conn);


?>