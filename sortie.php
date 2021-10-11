<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php 

include("template.php");
require 'connexion.php';
echo '<br><br><br>';
if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
if(isset($_SESSION['msg2'])){
echo $_SESSION['msg2'];
unset($_SESSION['msg2']);
}


$displaypack = "SELECT * FROM pack WHERE code IS NOT NULL ORDER BY date DESC";
$resultpack = mysqli_query($conn, $displaypack);

$arrayBarcodes=array();




?>


<form  method="GET" action="">
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                        style="border-radius: 10px; 
                        border : none;
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('packages.jpg');background-repeat:no-repeat; background-size:350px 136px;
                        position:relative; height:140px; width:320px; left:30px; top:200px;" 
                  >
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white"><i class="fas fa-cube"></i> <b>Ajouter un pack de produit </b></span>
                
</button>

<!-- form dialog for button 1 -->

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="position: fixed; margin-left:32%; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: #017115;">Pack de produits :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Entrer le nom du pack, ajouter le nbr des produits :</p>
      </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" style="color: #017115;"><b>Nom du pack :</b></label>
            <input type="text" class="form-control" placeholder="Nom de pack" name="pack" id="" required>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" style="color: #017115;"><b>Qté de produit :</b></label>
            <input type="number" class="form-control" placeholder="Qté" name="qte_prod" min="1" max='25' id="qte_prod" required>
          </div>
          <div class="mb-2">
            <label for="recipient-name" class="col-form-label" style="color: #017115;"><b>Date de sortie :</b></label>
            <input type="date" class="form-control" placeholder="Qté" name="datesortie" id="" required>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>&nbsp&nbsp&nbsp
        <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
      </div>
    </div>
  </div>
</div>

<style>
  .modal {  
    width: 10%;
    background-color: grey;
}
.modal-dialog {  
    height: 75%;
    left: 0%;
    width: 35%;
    bottom: 15%;
    border-radius: 5px;
}
</style>



<button name="Action2" style="border-radius: 10px;
                        border : none;
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('package.jpg');background-repeat:no-repeat; background-size:320px 138px;
                        position:relative; height:140px; width:320px; left:-300px; top:22px;" 
                  class="button" onclick="window.location.href=''">
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white"><i class="fas fa-cubes"></i> <b>Afficher les packs </b></span>
                
</button>

<?php 

if(isset($_GET["submit"]) && !empty($_GET["pack"]) && !empty($_GET["qte_prod"]) && !empty($_GET["datesortie"])){

  $nompack = $_GET["pack"];
  $qte = $_GET["qte_prod"];
  $datesortie = $_GET["datesortie"];

  echo '<script> location.replace("sortie2.php?qte='.$qte.'&&pack='.$nompack.'&&dtsort='.$datesortie.'"); </script>';

}else {
  echo'<script> location.replace("sortie.php?status=refused); </script>';
}
?>



<div class="card" style="margin-left:38%;margin-right:5%;background-color:white;position:absolute;top:150px;">
<div class="card-header" style="background-color:#017115;color:white;font-size:20px;text-align:center;">
    <b><u><i class="fas fa-th-list"></i>&nbspListe des packs<u></b>
  </div>
  
  <?php
      while($row=mysqli_fetch_row($resultpack)):
        $idpack = $row[0];
        $nompack = $row[1];
        $arrayBarcodes[]=(string)$row[2];
        $qte_prod = $row[3];
        $date = $row[4];
        $addeddate = $row[5];
  ?>
  
<center>
<div class="card mb" style="max-width: 800px; border-radius:2px;">

  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://img.icons8.com/color/480/000000/cydia.png"alt="" style="margin:50px;" width="50%">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <div class="etat" style="float:right;">
          <?php 
            $datenow = date("Y-m-d H:i:s");
            if ($datenow <= $date){
               echo '<span class="badge badge-warning" style="color:white;">En cours de livraison !</span>'; 
            }else{
              echo '<span class="badge badge-success" style="color:white;">Livré !</span>';
            }
          ?>
        </div>
        <a href='packdetail.php?id=<?=$idpack?>' style="color:black;"><h4 align="left" class="card-title"><?php echo $nompack;?></h4></a>
        <p class="text-muted"><?php echo 'Ce pack est composé de : <b>'.$qte_prod.'</b>&nbspProduit(s)';?></p>
        <p class="card-text">
          <details style="float:left;color:green;">
          <summary>Voir produits</summary><br><b>
        <?php 
        $displayitems = "SELECT * FROM produit_commande WHERE id_pack =". $idpack;
        $resultitems =  mysqli_query($conn, $displayitems);
      while($row1 = mysqli_fetch_row($resultitems)):
        $nomitem = $row1[2];
        $qteitem = $row1[5];
        
        echo $qteitem.'&nbsp&nbsp&nbsp'.$nomitem.'<br>';
       
        endwhile;
       ?>
       <br>
         </b>
        </details>
        </p><br><br>
        <div  style="float:right;">
    <?php 
    if ($datenow <= $date){
      echo'
     <a href="#"><i class="fas fa-trash-alt" style="color:grey;float:right;" onclick="return Delete();"></i></a>
     <a href="#"><i class="fas fa-edit" style="color:grey;float:right; margin-right:30px; onclick="return Modifier();""></i></a>';
    }
    ?>
    <hr>
    <p class="card-text"><small class="text-muted">Ajouté le : <?php echo $addeddate; ?></small></p>
      </div><br/>
      </div>
    </div>
  </div>
</div>

<?php 
      endwhile;
    ?>
</div><br>



</form>

<script language="javascript">
  function Delete(id){
    if(confirm("Voulez-vous supprimer ce pack ?")){
      windows.location.href='.php?id=' +id+'';
      return true;
    }else{
      return false;
    }

  }

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>