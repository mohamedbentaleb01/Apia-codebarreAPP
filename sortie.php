<?php 

include("template.php");
require 'connexion.php';
$msg = '';
?>
<form  method="GET" action="">
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                        style="border-radius: 20px; 
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('packages.jpg');background-repeat:no-repeat; background-size:350px 136px;
                        position:relative; height:140px; width:320px; left:610px; top:100px;" 
                  >
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white"><i class="fas fa-cube"></i> <b>Pack de produits <p class="text-muted">(Differents catégories)</p></b></span>
                
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
            <input type="text" class="form-control" placeholder="Nom de pack" name="pack" id="">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label" style="color: #017115;"><b>Qté de produit :</b></label>
            <input type="number" class="form-control" placeholder="Qté" name="qte_prod" id="">
          </div>
          <div class="mb-2">
            <label for="recipient-name" class="col-form-label" style="color: #017115;"><b>Date de sortie :</b></label>
            <input type="date" class="form-control" placeholder="Qté" name="datesortie" id="">
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>&nbsp&nbsp&nbsp
        <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
      </div>
    </div>
  </div>
</div>













<button name="Action2" style="border-radius: 20px;
                        
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('package.jpg');background-repeat:no-repeat; background-size:320px 138px;
                        position:relative; height:140px; width:320px; left:-80px; top:100px;" 
                  class="button" onclick="window.location.href=''">
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white"><i class="fas fa-cubes"></i> <b>Pack de produits <p class="text-muted">( Une seule catégorie)</p></b></span>
                
</button><br>

<br><br><br><br><br><br><br>
<?php 



if(isset($_GET["submit"]) && !empty($_GET["pack"]) && !empty($_GET["qte_prod"]) && !empty($_GET["datesortie"])){

  $nompack = $_GET["pack"];
  $qte = $_GET["qte_prod"];
  $datesortie = $_GET["datesortie"];

  // $insert = "INSERT INTO pack (nom, qte, datesortie) VALUES ('$nompack','$qte','$datesortie')";
  
  // $sql = mysqli_query($conn, "SELECT * From produit");

  echo'<input type="hidden" name="pack" value='.$nompack.'/>';
  echo'<input type="hidden" name="qte_prod" value='.$qte.'/>';
  echo'<input type="hidden" name="datesortie" value='.$datesortie.'/>';


      echo"<table width=50px>";
          echo"<thead  style=background-color:darkseagreen;>";
              echo"<tr> 
              
              <th scope=col>Catégories</th>
              <th scope=col>Nom de produit</th>
              <th scope=col>Qté</th> 
              <th scope=col>Code-barre</th>
              ";
              echo"</thead>";

  for($i=1;$i<=$qte;$i++){

    echo"</tbody style=background-color:white> ";
    
    echo"<tr>".
        "<td width=20% style=background-color:white>
        <select class=form-select name=categorie id=categorie required>
          <option selected disabled>Selectionner un produit</option>
          <option>Alimentaire</option>
          <option>Huiles cosmétiques</option>
          <option>Soins visage</option>
          <option>Soins capilaire</option>
          <option>Rituels hammam</option>
          <option>Gels Hydroalcooliques</option>
        </select><button type='submit' name='submit2'>submit</button></td>";

        if(isset($_GET['submit2']) && !empty($_GET['categorie'])){
          
          $searchvalue = $_GET['categorie'];
          

          $sqlsearch =  mysqli_query($conn, "SELECT * FROM produit WHERE categorie = '$searchvalue'");
        }


        echo"<td width=30% style=background-color:white>
        <select class=form-select name=''  required>
        <option selected= disabled>Selectionner un produit</option>";

          while($row = mysqli_fetch_array($sqlsearch))

            {
              
                
                echo "<option value='". $row['code'] ."'>". $row['nom']."</option>";  
              
            }	
       echo"</select>
        </td>".

        
        "<td width=10%; style=background-color:white;><input type='number' name=''/></td>".
        "<td style=background-color:white>'$searchvalue'</td>";
    echo "</tr>"; 
 
  }
  echo"</tbody>";
echo"</table>"; 
echo"</form>";
}
else{
  
// echo"<b ><p align=center style=color:red;background-color:white;margin-left:35%;margin-right:42%;>Veuillez renseignier tous les champs!</p></b>";
  
}





?>















</form>