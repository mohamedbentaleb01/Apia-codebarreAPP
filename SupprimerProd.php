<?php 
require 'session.php';
require 'connexion.php';

$id = $_GET['id'];


$date = date("Y-n-j G:i:s");

// echo $id;

$deletequery = "DELETE FROM produit WHERE produit_id = '$id'";

if ($conn->query($deletequery) === TRUE){

  header('location:status.php?status=Deleted&&id='.$id.'');

}else 
{
  "Error deleting record: " . $conn->error;
}

$conn->close();




?>