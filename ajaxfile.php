<?php 

require 'connexion.php';
$userid = $_POST['userid'];

$list = "SELECT * FROM produit WHERE code = ".$userid; 
$result = mysqli_query($conn, $list);
while($row = mysqli_fetch_row($result)):
  $id = $row[0];
  $name = $row[2];
  $categorie = $row[1];
  $qte = $row[3];
  $imageURL = 'uploads/'.$row[8];
  $code = $row[4];
?>
<img class='mx-auto img-thumbnail' src="<?php echo $imageURL; ?>" width="30%" height="5px" style="float: left;" />
<h5 style="font-size:19px;font-family: 'Fjalla One', sans-serif;"><b><?php echo $name;?></b></h5>
<p class="text-muted">Modifier la qté :</p>
  <b>
    <input type="number" name="qtechg" style="width:50px;" value="<?php echo $qte; ?>" min="0"/>
  </b>
  <input type="hidden" name="id" value="<?php echo $id;?>"/>


<?php 

endwhile;

?>