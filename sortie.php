<?php 

include("template.php");
require 'connexion.php';
$msg = '';

$query = "SELECT * FROM categories";
$result = $conn->query($query);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Country dependent ajax
    $('#categorie').on('change', function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                type:'POST',
                url:'data.php',
                data:'categorie='+id,
                success:function(html){
                    $('#produits').html(html);
                    
        }
      });
    };
  });
});

</script>

<script>
      // var url = "genereretiquette.php";
      var id = "";  
      // var display=$("#produit option:selected").text();
      $(document).ready(function(){
          $('#produits').change(function(){
              //  alert($(this).val());
              id = $(this).val();
              $("#barcode").val(id);
              // $("#qte_prod").val(qte);
              //  window.location.href = url+'?&'+value;
          });
      });

      var code = "";  
      // var display=$("#produit option:selected").text();
      $(document).ready(function(){
          $('#produits').change(function(){
              //  alert($(this).val());
              code = $(this).find('option:selected').attr('id');
              $("#code_barre").val(code);
              // $("#qte_prod").val(qte);
              //  window.location.href = url+'?&'+value;
          });
      });
</script>

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
            <input type="number" class="form-control" placeholder="Qté" name="qte_prod" min="0" max='25' id="qte_prod">
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

  echo'<input type="hidden" name="pack" value='.$nompack.'/>';
  echo'<input type="hidden" name="qte_prod" value='.$qte.'/>';
  echo'<input type="hidden" name="datesortie" value='.$datesortie.'/>';
  
  echo'<center><h4><b>Ajouter les produits et valider</b></h4></center>';

      echo"<table width=50% id=''>";
          echo"<thead  style=background-color:darkseagreen;>";
              echo"<tr> 
              <th scope=col>Produits n°</th>
              <th scope=col>Code relative</th>
              <th scope=col>Catégories</th>
              <th scope=col>Nom de produit</th>
              <th scope=col>Qté <br><span style=color:red>(ne doit pas dépassé la qté en stock)</span></th> 
              <th scope=col>Quantité en stock</th>
              <th scope=col>Supprimer une ligne</th>
              ";
              echo"</thead>";
  
  for($i=1; $i<=$qte; $i++){
    echo"</tbody style=background-color:white> ";
    
    echo"<tr><td style=background-color:white;color:darkseagreen; width=3%><center><b>".$i."</b></center></td>";
    echo"<td width=10%; style=background-color:white;color:green;><b>
        <input id='code_barre' name='code_barre' placeholder='Code relative' readonly=/></b></td>";
    echo "<td width=20% style=background-color:white >
          <select class=form-select name='categorie' id='categorie' required>
          <option selected disabled>-----------Catégories-----------</option>";  
          if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result))
            {
            
            echo '<option id="'.$row['categorie'].'" value="'.$row['categorie'].'"><b>'.$row['id'].'</b>&nbsp&nbsp&nbsp'.$row['categorie'].'</option>';
            }
          }
          mysqli_data_seek($result, 0);
        echo "</select></td>";

        echo"<td width=22% style=background-color:white>
        <select class=form-select name='produits' id='produits'  required>
        <option value=''>----Selectionner une catégorie----</option>";
        
       echo"</select></td>";
        echo"<td width=10%; style=background-color:white;color:blue;><b><input type=number id='cmdqte' name='cmdqte' min='1' max='' placeholder='qte à commander' required='required'/></b></td>";
        echo "<td width=10%; style=background-color:white;color:green;><b><input id='barcode' name='barcode' placeholder='disponibilité en stock' readonly=/></b></td>";
        echo"<td width=1%; style=background-color:white>&nbsp&nbsp&nbsp&nbsp<button type='button' onclick='deleteRow(this);'><i class='far fa-trash-alt'></i></button></td>";
      
        echo "</tr>"; 
    echo"</tbody>";

 
    
  }

  
echo"</table><br><br>"; 
echo '<center><button type="submit" name="submit" onclick="return valider()" class="btn btn-success">Valider</button><center>';
}
else{  
}


?>


<script>
      $(document).ready(function(){
        $('#produits').change(function(){
          qte = $(this).val();
          var input = document.getElementById("cmdqte");
          input.setAttribute("max", qte);
        });
      });
</script>

<script language="javascript">
  function valider(){
    if(confirm("Etes-vous sure de ces choix ?")){
      windows.location.href='#valider';
      return true;
    }else{
      return false;
    }

  }

</script>
<script>
function deleteRow(button) {
  if(confirm("Etes-vous sure de supprimer cette ligne ?")){
    button.parentElement.parentElement.remove();
    return true;
  }else{
    return false;
  }
    // first parentElement will be td and second will be tr.
}
</script>


</form>