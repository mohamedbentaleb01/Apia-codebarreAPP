<?php 

include("template.php");
require 'connexion.php';

$qte = $_GET['qte'];
$nompack = $_GET['pack'];
$datesortie = $_GET['dtsort'];
        

$msg = '';

$query = "SELECT * FROM produit ORDER BY dateentree DESC";
$result = $conn->query($query);





 echo'<br><br><br><br>';


 echo'<form method="POST" action=>';
  echo'<a href=sortie.php style=color:white;background-color:grey;><i class="fas fa-undo"></i>&nbspPrécedent</a><br>';
  echo'<center><h3><b>Ajouter les produits et valider :</b></h3></center><br>';

      echo"<table id='table' class='' style='width:55%;margin-left:20%;'>";
          echo"<thead  style=background-color:grey;color:white;font-size:18px;>";
              echo"<tr>
              <th scope=col></th>
              <th scope=col>Nom de produit</th>
              <th scope=col>Qté</th> 
              
              ";
              echo"</thead>";
  for($i=1; $i<=$qte; $i++)
  {
    ?>
    
    </tbody> 
    
    
    
    <tr><td style='color:white; background-color: grey;'width=2% id='numrows'><center><b><?php echo $i; ?></b></center></td>
        
        <!--  display select categories -->
          <td width=30% style="background-color: white;">
           
            <select class=form-select id="categorie" name="produit[]" required style="background-color: white;">
            <option selected value="">--------------------------------------------Selectionner un produit--------------------------------------------</option>
          <?php 
          
          if ($result->num_rows > 0) {
            foreach($result as $index=> $row) 
            {
              $qtestock = $row['qte'];
            echo '<option name="'.$row['qte'].'" id="'.$row['code'].'" value="'.$row['produit_id'].'"><b>'.$row['produit_id'].'</b>&nbsp&nbsp&nbsp'.$row['nom'].'</option>';
            }
          }
          
        echo "</select></td>";
        ?>

        <td width=3%; style="font-size:20px; background-color: white;"><b><input type=number id='cmdqte' name='cmdqte[]' min='1' max='30' placeholder='qte' style="background-color:white; font-size:18px;border-radius:10px;text-align:center;color:green;" required='required'/></b></td>
        
        
      
        </tr>
    </tbody> 
    <?php } ?>

</table>


<br>
<center><button type="submit" name="confirmer" onclick="return valider()" class="btn btn-success">Valider</button><center>



<!-- 
<script>
      $(document).ready(function(){
          $('select').change(function(){
            qte = $(this).find("option:selected").attr("name");
            var input = document.getElementById("cmdqte");
            input.setAttribute("max", qte);
          });
        });
</script> -->

<script language="javascript">
  function valider(){
    if(confirm("Etes-vous sure de ces choix ?")){
      windows.location.href='';
      return true;
    }else{
      return false;
    }

  }

</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- <script>
    // variables
    var id = "";
    var categorie = "";
    var code = ""; 
    
     $(document).ready(function(){
      
        $("select").change(function(){
          
            //attributes
            id = $(this).val(); //value
            categorie = $(this).find("option:selected").attr("id");//id
            code = $(this).find("option:selected").attr("name");//name

        });  
        });
      
</script> -->

<?php

if(isset($_POST["confirmer"]) && !empty($_POST["produit"]) && !empty($_POST["cmdqte"])){

  $produits = $_POST["produit"];// produit id
  $quantite = $_POST["cmdqte"];// quantité commendé

  $insertpack = "INSERT INTO pack (nompack, code, qte_prod, datesortie, date) VALUES ('$nompack',NULL,'$qte','$datesortie', NOW())";
      $result1=mysqli_query($conn,$insertpack);

        $idpack=mysqli_insert_id($conn);




foreach($produits as $index => $produit)
{
  $sqlcheck = "SELECT * FROM produit WHERE produit_id = $produit" ;
  $result1 = mysqli_query($conn,$sqlcheck);
  while($row1 = mysqli_fetch_row($result1)){
    $productname= $row1[2];//nom de produit
    $quantitystock = $row1[3];//quantité disponible en stock
    $categorie = $row1[1];
    $code = $row1[4];
    
    $array0 = $index;// index 
    $array = $quantite[$index];//quantite demandé
    $array2 = $quantitystock;/// quantité disponible en stock

      
      $diffqte = $array2 - $array ;
      //code barre du pack
      $codepack = $idpack.date('His');

      if($diffqte >= 2){

        $insertproduits = "INSERT INTO produit_commande(id_pack, nom, categorie, code, qte_cmd) VALUES ('$idpack', '$productname', '$categorie', '$code', '$array')";
        
        $result2 = mysqli_query($conn, $insertproduits);
        
        
        $updateproduit = "UPDATE produit SET qte = '$diffqte' WHERE produit_id = $produit";
        
        $resultup = mysqli_query($conn, $updateproduit);

        $updatepack = "UPDATE pack SET code = '$codepack' WHERE id= '$idpack'";

        $resultupdatepack = mysqli_query($conn, $updatepack);
      
        if($resultup && $resultupdatepack == TRUE){
          
        if($result2 && $result1 == TRUE ){
          $_SESSION['msg']='<div class="alert alert-success" role="alert">
          <i class="fas fa-cube"></i>
          <b>Pack Ajouté </b>!
        </div>';
        echo '<script> location.replace("sortie.php?status=packadded") </script>';
        }

        elseif($result2 && $result1 == FALSE){
        echo '<div class="alert alert-danger" role="alert">
          Veuillez réessayer plus tard !
        </div>';
        }
      } else echo'Query not updated !';

      }elseif($diffqte < 0){
        
        
        $_SESSION['msg2']="<div class='alert alert-danger' role='alert'>
        La quantité demandé de ce produit <b><span style=color:red>'.$productname.'</span></b> est plus grande de celle du stock ! Cliquer pour modifier le pack*.
      </div>";
      echo '<br><div class="alert alert-danger" role="alert">
          La quantité demandé de ce produit <b><a href=produit.php?id='.$produit.' style=color:red>'.$productname.'</a></b> est plus grande de celle du stock ! Veuillez réessayer*.
        </div>';
       return false;
        
      }

  }
  
}


  
}


?>




</form>