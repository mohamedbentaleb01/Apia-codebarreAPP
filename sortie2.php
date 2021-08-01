<?php 

include ('template.php');
require 'connexion.php';

?>

<br><br><br><br><br><br><br><br>
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
 


</head>
<body>
 <div class="container">
 <!-- <h3>Dynamic Dependent Select Box - <a href="https://www.cluemediator.com" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h3> -->
    <br />
 <form action="" method="post">
 <div class="col-md-4">
 
 <!-- Country dropdown -->
 <label for="country">categories</label>
 <select class="form-control" id="categorie">
 <option value="" selected="" disabled>Select Categorie</option>
 <?php
 $query = "SELECT * FROM categories";
 $result = $conn->query($query);
 if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 echo '<option id="'.$row['categorie'].'" value="'.$row['categorie'].'"><b>'.$row['id'].'</b>&nbsp&nbsp&nbsp'.$row['categorie'].'</option>';
 }
 }else{
 echo '<option value="">not available</option>';
 }
 ?>
 </select>
    &nbsp
 <!-- State dropdown -->
 <label for="produit">produit</label>
 <select class="form-control" id="produits">
 <option value=""></option>
 </select>

</center>
