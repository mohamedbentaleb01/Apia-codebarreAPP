<?php
    require "session.php";
    require "connexion.php";
    

    $sql="SELECT * FROM produit ORDER BY dateentree DESC";
    $result = mysqli_query($conn,$sql);

    $num_row = mysqli_num_rows($result);

    $arrayBarcodes=array();

    

    
?>

<html>
  <head>
    

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="JsBarcode.all.min.js"></script>
    <title>Liste des produits</title>
  <div>

  <img src="Apia.png" alt="" style="width: 120px; padding:0px; padding-right :10px;" align="top-left"/>
  <img src="assets/images/Vector_5.png" alt="" style="width: 30px; margin-right :16px; margin-top:16px;" align="right"/>
  <!-- <div class="topnav">

    <a href="#"><img src="assets/images/Vector_2.png" alt="" style="width: 22px;" /> Accueil</a>
    <a href="#"><img src="assets/images/Vector_1.png" alt="" style="width: 22px;" />Liste des produits</a>
    <a href="#"><img src="assets/images/Vector.png" alt="" style="width: 22px;" /> Chercher un produit</a>
    <div class="logout"><a href="#"><img src="assets/images/Vector_3.png" alt="" style="width: 22px;" align="right"/></a></div>
  </div> -->

<nav class="menu">
  <!-- <span class="logo">
  	<img src="https://unoan92uss-flywheel.netdna-ssl.com/wp-content/uploads/2016/03/logo.png">
  </span> -->
  <!-- <span class="search"><a href="#">
  	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M91.202,88.547L67.931,65.276c5.386-6.201,8.657-14.285,8.657-23.124c0-19.472-15.842-35.315-35.315-35.315  C21.8,6.837,5.959,22.681,5.959,42.153S21.8,77.467,41.273,77.467c8.838,0,16.922-3.271,23.122-8.657l23.273,23.272  c0.488,0.488,1.128,0.732,1.768,0.732c0.639,0,1.279-0.244,1.766-0.732C92.179,91.106,92.179,89.523,91.202,88.547z M10.959,42.152  c0-16.716,13.599-30.315,30.314-30.315c16.716,0,30.315,13.6,30.315,30.315c0,16.715-13.599,30.314-30.315,30.314  C24.558,72.466,10.959,58.867,10.959,42.152z"/></svg>
  </a></span> -->
  <ol>
    <li class="menu-item"><a href="espacemagasinier.php"><img src="assets/images/Vector_2.png" alt="" style="width: 24px;margin-right: 10px;" />Accueil</a></li>
    <li class="menu-item"><a href="listproduits.php"><img src="assets/images/Vector_1.png" alt="" style="width: 20px;margin-right: 10px;" />Liste des produits</a></li>
    <li class="menu-item"><a href="search.php"><img src="assets/images/Vector.png" alt="" style="width: 18px; margin-right: 10px;" />Chercher un produits</a></li>
    <div class="menu-item"><a href="logout.php" onclick="return logout()"><img src="assets/images/Vector_3.png" alt="" style="width: 20px; margin-right:10px; padding : 0px;" align=""  />Se déconnecter</a></div>
  </ol>
  
</nav>
<script language="javascript">
  function logout(){
    if(confirm("Voulez-vous déconnecter ?")){
      windows.location.href='logout.php';
      return true;
    }else{
      return false;
    }

  }

</script>
  


    <style script="text/css">
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700');
    * {
      box-sizing: border-box;
      text-decoration: none;
    }
    body {
      font-family: 'Open Sans', sans-serif;
      background: #fafafa;
      margin: 0;
      color: rgb(0,0,0,0.8);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    @media only screen and (max-width: 1200px) {
    .page, article {
          width: 900px;
          padding: 0 30px;
        }
      }
    @media only screen and (max-width: 900px) {
    .page, article {
          width: 700px
        }
      }
    @media only screen and (max-width: 768px) {
    .page, article {
        width: 100%;
        padding: 2em;
      }
    }
    a {
      font-weight: 200;
      text-decoration: none;
      text-transform: uppercase;
      position: relative;
      color: #FFF;
      padding: 8px 10px;
      letter-spacing: 0px;
      font-size: 16px;
    }

    .menu {
      background: #017115;
      margin: auto;
      position: fixed;
      position: absolute;
      width: 100%;
      text-align: center;
      padding: 0px 2rem;
      height: 65px;
      font-family: 'Titillium Web', sans-serif;
    }
    .menu ol {
      padding-left: 0px;
    }

    .menu-item {
      list-style-type: none;
      display: inline;
      position: relative;
      margin: 1px;
      font-family: 'Titillium Web', sans-serif;
    }

    .menu-item:before {
      position: absolute;
      content: "";
      border-bottom: 3px solid white;
      overflow: hidden;
      width: 0%;
      left: 50%;
      top: 40px;
      transition: 0.1s ease-in-out 0.15s;
    }

    .menu-item:hover:before {
      width: 100%;
      left: 0%;
      transition: 0.2s ease-in-out;
    }

    .sub-menu {
      position: absolute;
      left: 0%;
      background: #fff;
      font-family: 'Titillium Web', sans-serif;
      top: 50px;
      padding: 0;
      text-align: left;
      box-shadow: 0px 4px 20px -5px rgba(0, 0, 0, 0.15);
      max-height: 0;
      width: 150px;
      opacity: 0;
      transition: 0.45s ease all 0.1s;
      z-index: 0;
      -webkit-transform: translateY(20px);
              transform: translateY(20px);
      opacity: 0;
      transition: 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) all 0.1s;
      visibility: hidden;
    }
    .menu-item:nth-child(n + 3):nth-child(-n + 4):hover .sub-menu {
      max-height: 200px;
      max-width: 200px;
      opacity: 1;
        -webkit-transform: translateY(0px);
              transform: translateY(0px);
      opacity: 1;
      transition-delay: 0.15s;
      visibility: visible;
    }
    .sub-menu .menu-item {
      display: block;
      font-family: 'Titillium Web', sans-serif;
    }

    .menu-item:nth-child(n + 3):nth-child(-n + 4) .plus-icon {
      width: 15px;
      height: 15px;
      stroke: #333;
      margin-left: 2px;
      margin-bottom: -1px;
    }


        body {
      background-image: url('img.png');
      background-repeat: no-repeat;
      background-size: 100% ;
      backdrop-filter: blur(29px);
    }
    </style>
<body>
<div class="header-title" style="position:relative;top:90px; font-family:'Titillium Web', sans-serif;"><h2 align="center"><b>Liste des produits :<b></h2></div>

<table class="table table-hover" style="position: absolute; top: 200px; ">
  <thead class="" style="background-color:darkseagreen; color: white;">
  
    
    <tr>
      <th scope="col">Id produit</th>
      <th scope="col">Image</th>
      <th scope="col">Catégories</th>
      <th scope="col">Nom de produit</th>
      <th scope="col">Qté</th>
      <th scope="col">Code-barre</th>
      <th scope="col">Date d'entrée en stock</th>
      
      <th scope="col">Action</th>

    </tr>
    <?php
    while($row=mysqli_fetch_row($result)):
      $arrayBarcodes[]=(string)$row[4];

    ?>
  </thead>
  <tbody class="" style="background-color: white;">
    <tr>
      <th scope="row" style="color:green;"><?php echo $row[0]?></th>
      <td width="30%"><?php $imageURL ='uploads/'.$row[8];?><a href="<?=$imageURL?>"><img style="width:40%; position:relative; margin:5px; border-radius:30px;"alt="" src="<?php echo $imageURL; ?>"/></a></td>
      <td width="10%" class="text-muted"><b><?php echo $row[1];?></b></td>
      <td width="20%"><b><?php echo $row[2]?><b></td>
      <td width="10%" class="text-muted"><b style="color:darkseagreen"><?php echo $row[3]?>&nbsp</b>Unités</td>
      <td width="20%"><svg style="width:150px;" id='<?php echo "barcode".$row[4]?>'></svg></td>
      <td width="20%" class="text-muted"><?php echo $row[6]?></td>
        <td>
          <div class="dropdown">
          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" onclick="return editme(<?=$row[0]?>)" href='editproduit.php?id=<?=$row[0]?>' id='<?=$row[0]?>'>Modifier</a></li>
            <li><a class="dropdown-item" onclick="return deleteme(<?=$row[0]?>)" href='SupprimerProd.php?id=<?=$row[0]?>'>Supprimer</a></li>
            <li><a class="dropdown-item" href='produit.php?id=<?=$row[0]?>' id='<?=$row[0]?>'>Visualiser</a></li>
          </ul>
        </div>
     </td>
    </tr>
    
    <?php endwhile; ?>
  </tbody>
  
</table> 



<script language="javascript">
  function editme(id){
    if(confirm("Modifier ce produit ?")){
      windows.location.href='editproduit.php?id=' +id+'';
      return true;
    }else{
      return false;
    }

  }

</script>

<script language="javascript">
  function deleteme(delid){
    if(confirm("Supprimer ce produit ?")){
      windows.location.href='SupprimerProd.php?id=' +delid+'';
      return true;
    }else{
      return false;
    }

  }

</script>












</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script> 
</body> 
</html>

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




