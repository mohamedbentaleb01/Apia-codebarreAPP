<?php 

require 'connexion.php';

if (isset($_POST['categorie']) && !empty($_POST['categorie'])) {
 
  $categorie = $_POST['categorie'];
  // Fetch state name base on country id
  $query = "SELECT * FROM produit where categorie = '$categorie' ORDER BY dateentree DESC "; 
  $result = $conn->query($query);
  
  if ($result->num_rows > 0) {
  echo '<option value="" selected="" disabled>Selectionner un produit de "'.$categorie.'"</option>';
  
  while ($row = $result->fetch_assoc()) {
  echo '<option id="'.$row['code'].'" value="'.$row['qte'].'">'.$row['nom'].'</option>';
 
  }
}
  
else {
  echo '<option value="">not available</option>';
} 
}
?>