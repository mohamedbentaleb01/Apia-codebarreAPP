<script src="JsBarcode.all.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
<?php 
require ('template.php');
require 'connexion.php';

$arrayBarcodes=array();

$id = $_GET['id'];

$query = "SELECT * FROM pack WHERE id =".$id;
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_row($result)){
$pack = $row[1];
$arrayBarcodes[]=(string)$row[2];
$qte_prod = $row[3];
$datesortie = $row[4];
$addeddate = $row[5];



if($result == TRUE){
 echo'<br><br><br><br>
 <div class="card text-center">
 <div class="card-header" style="background-color:white";>
 <h4 class="card-title" style="font-family: Lato, sans-serif;"><img src="packGIF.gif" style="width:60px;" alt=""/>&nbsp&nbsp&nbsp'.$pack.'</h4>
 </div>
 <div class="card-body" style="background-color:#FDFEFE;">
 <h6 class="text-muted">Ce pack est composé de <b>'.$qte_prod.'</b> produit(s) :</h6>
   <p class="card-text" align="left" style="margin-left:25%;margin-right:20%"><br/>'; 
        $displayitems = "SELECT * FROM produit_commande WHERE id_pack =". $id;
        $resultitems =  mysqli_query($conn, $displayitems);
        
        echo'<table class="table"><thead class="thead-dark"><tr>';
        echo'<th>Image</th>';
        echo'<th>Code</th>';
        echo'<th>Produit</th>';
        echo'<th>Qte commendé</th></tr></thead>';

        echo'<tbody class="tbody-white"><tr>';
      while($row1 = mysqli_fetch_row($resultitems)):
        $nomitem = $row1[2];
        $qteitem = $row1[5];
        $idproduit = $row1[0];
        $code = $row1[4];

        $displayimage = "SELECT * from produit where code =".$code;
        $resultimage = mysqli_query($conn, $displayimage);
        while($row2 = mysqli_fetch_row($resultimage)){
          $imageURL = 'uploads/'.$row2[8];

        
        
        echo '<td width=20%;><img style="width:50%;border:1px solid black; border-radius:30px;" src='.$imageURL.' alt=""/></td>';
        echo '<td width=20%;><b>'.$code.'</b></td>';
        echo '<td>'.$nomitem.'</td>';
        echo '<td><center><b>'.$qteitem.'</b></center></td></tr>';
        }
        endwhile;

        echo'</tbody>';
        echo'</table>';
   
   echo'<br/></p class="text-muted">Code-barre du pack :<br/><svg id='."barcode".''.$row[2].'></svg></div>
 <div class="card-footer text-muted">
   Ajouter le : '.$addeddate.'</br>
   Sortie le : '.$datesortie.'
 </div>
</div>';
}else{
  echo'<div class="alert alert-danger" role="alert">
   Une erreur est survenu veuillez réssayer !
</div>';
}
}
?>

<script type="text/javascript">
  //convert json to JS array data.
  function arrayjsonbarcode(j) {
    json = JSON.parse(j);
    arr = [];
    for (var x in json) {
      arr.push(json[x]);
    }
    return arr;
  }

  //convert PHP array to json data.
  jsonvalue = '<?php echo json_encode($arrayBarcodes) ?>';
  values = arrayjsonbarcode(jsonvalue);

  //generate barcodes using values data.
  for (var i = 0; i < values.length; i++) {
    JsBarcode("#barcode" + values[i], values[i].toString(), {
      format: "codabar",
      lineColor: "#000",
      width: 2,
      height: 30,
      displayValue: true
      }
    );
  }
</script>





