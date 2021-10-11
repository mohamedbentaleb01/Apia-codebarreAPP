<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
<?php 
include('template.php');
require 'connexion.php';
?>
<br><br><br><br>
<center><h4><img src="stock.png" style="width:3%" alt=""/>&nbsp&nbsp<b>Produits en stock :</b></h4></center>
<form class="example" method="GET" action="" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Chercher ou trier ..." name="search">
  <button type="submit" name="submit"><i class="fa fa-search"></i></button>
</form>
<hr style="color:green;">
<form action="" method="POST">
<div class="list" style="float:right;margin-right:50px;font-size :17px;">
  <a href="listproduits.php" style="color:black;top:-3px;"><i class="fas fa-list"></i><label>&nbsp;Afficher Liste</label></a>
</div>
<div class="dropdown">
  <i class="fas fa-filter" style="float:right;margin-right:50px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><label>Trier</label></i>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: #F2F3F4;border-radius:10px;">
    <li><button class="dropdown-item" style="text-transform: lowercase;border:none;" name="rupture"/><i class="fas fa-ban"></i>&nbsp;En rupture</li><hr>
    <li><button class="dropdown-item" style="text-transform: lowercase;border:none;" name="asc" ><i class="fas fa-sort-amount-up"></i>&nbsp;Anciens</a></li><hr>
    <li><button class="dropdown-item" style="text-transform: lowercase;border:none;" name="desc" ><i class="fas fa-sort-amount-down-alt"></i>&nbsp;Nouveau</a></li>
  </ul>
</div>
</form>
<style>
  * {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 1px;
  font-size: 15px;
  border: none;
  border-radius: 10px;
  width: 80%;
  background: #F2F3F4;
}

form.example button {
  float: right;
  width: 17%;
  padding: 14px;
  background: green;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-radius: 10px;
  cursor: pointer;
}


form.example::after {
  clear: none;
  display: table;
}
</style>
<br/>

<style>


.details {
    border: 1.5px solid grey;
    color: #212121;
    width: 100%;
    box-shadow: 0px 0px 10px #212121
}

.cart {
    background-color: #212121;
    color: white;
    margin-top: 0px;
    font-size: 11px;
    font-weight: 900;
    width: 100%;
    height: 39px;
    padding-top: 4px;
    box-shadow: 0px 5px 10px #212121;
    border-radius: 10px;
    top:auto;
}

.card {
    width: 30%;
    float: left;
    margin: 20px;
    height: 70%;  
}

.card-body {
    width: 40%;
}

.btn {
    border-radius: 5
}

.img-thumbnail {
    border: none
}

.card {
    box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
    border-radius: 5px;
    padding-bottom: 0px;
}
</style>

<?php
$displayproducts = "SELECT * FROM produit";
$result = mysqli_query($conn, $displayproducts);

if(isset($_GET['submit']) && !empty($_GET['search'])){
  $searchvalue = $_GET['search'];

  $querysearch = "SELECT * FROM produit 
  WHERE nom LIKE '%{$searchvalue}%'";
  $result = mysqli_query($conn, $querysearch);

}

if(isset($_POST['rupture'])){
  $displayitems = "SELECT * FROM produit WHERE qte <= '10' ORDER BY dateentree DESC ";
  $result = mysqli_query($conn, $displayitems);
}

if(isset($_POST['asc'])){
  $displayasc = "SELECT * FROM produit ORDER BY dateentree ASC";
  $result = mysqli_query($conn, $displayasc);
}

if(isset($_POST['desc'])){
  $displaydesc = "SELECT * FROM produit ORDER BY dateentree DESC";
  $result = mysqli_query($conn, $displaydesc);
}


while($row = mysqli_fetch_row($result)):
  $id = $row[0];
  $name = $row[2];
  $categorie = $row[1];
  $qte = $row[3];
  $imageURL = 'uploads/'.$row[8];
  $code = $row[4];

?> 

<div class='container-fluid' align="center">
    <div class="card"><p align="center" class="text-muted" style="font-size: 10px;"><b> &nbsp;ID: <?php echo $code; ?></b></p>
      <img class='mx-auto img-thumbnail' src="<?php echo $imageURL; ?>" width="42%" height="10px" />
    <?php 
    if($qte <= 10){
      echo'<span class="badge bg-danger" style="color:white;top:-6px;">En rupture !</span>';
    }
    ?>
   
    <div class="card-body text-center mx-auto">
            <div class="">
                <h6 class="card-title mx-auto" style="font-size:19px;font-family: 'Fjalla One', sans-serif;"><b><?php echo $name;?></b></h6><hr>
                <p class="text-muted"><?php echo $categorie; ?></p>
                <span style="color:green;font-size:18px;" id="qte"><b><?php echo $qte; ?></b></span> <br />
                <button name="alimenter" id="but" class="edit cart" data-id="<?php echo $code; ?>" style="border:none;" data-bs-toggle="modal" data-bs-target="#empModal">ALIMENTER</button>
            </div>
        </div>
    </div>
</div>


<?php 

endwhile;
?>
<form action="editqte.php" method="POST">
<!-- modal -->
<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Alimenter le stock :</h5>
        <button type="button" class="close" style="border:none;" id="btnClosePopup" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="annuler" style="border:none;  text-transform: lowercase;">Annuler</button>&nbsp;&nbsp;
        <button type="submit" class="btn btn-success" data-id="<?php echo $id; ?>" style="border:none; text-transform: lowercase;" name="valider" >Valider</button>
      </div>
    </div>
  </div>
</div>
</form>

<style>
  .modal {  
    height: 59%;
    width: 40%;
    bottom: 10%;
    border-radius: 10px;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
                $('.edit').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); //body 
                            $('#empModal').modal('show'); //id modal

                        }
                    });
                });
            });

</script>

<script type="text/javascript">
    $(function () {
        $("#btnClosePopup").click(function () {
            $("#empModal").modal("hide");
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $("#annuler").click(function () {
            $("#empModal").modal("hide");
        });
    });
</script>







