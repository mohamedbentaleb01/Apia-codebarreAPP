
<?php
require 'session.php';
require "connexion.php";

$id=$_GET['id'];

$query="SELECT * FROM produit WHERE produit_id=$id ";
    $result = mysqli_query($conn,$query);

    $arrayBarcodes=array();
    
    while($row = $result->fetch_assoc()){
      $id = $row["produit_id"];
      $categorie = $row["categorie"];
      $nom = $row["nom"];
      $qte = $row["qte"];
     $code = $row["code"];
      $desc = $row["description"];
      $dateentree = $row["dateentree"];
      $datesortie = $row["datesortie"];
      $imageURL = 'uploads/'.$row["file_name"];


    };
    $arrayBarcodes[]=(string)$code;
 
      
    


?>


<html>
  <head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="JsBarcode.all.min.js"></script>
    <title><?php echo $nom  ?></title>
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
    <div class="menu-item"><a href="logout.php"><img src="assets/images/Vector_3.png" alt="" style="width: 20px; margin-right:10px; padding : 0px;" align="" onclick="confirm('déconnecter ?')" />Se déconnecter</a></div>
  </ol>
  
</nav>
  


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
      backdrop-filter: blur(5px);
    }

    .card {
    width: 70%;
    position: relative;
    top: 50px;
    }


    </style>

<body>

<div class="d-flex justify-content-center container mt-5">
    <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
        <div class="about-product text-center mt-2"><a href="<?=$imageURL?>"><img src="<?php echo $imageURL;?>" width="300"></a>
            <div>
                <h4><?php echo $nom;?></h4>
                <h6 class="mt-0 text-black-50"><?php echo $categorie ?></h6>
            </div>
        </div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-price"><span style="color:#017115;"><b>Qté en stock :</b></span><span><?php echo $qte ?></span></div><br>
            <div class=" "><span style="color: #017115;"><b>Code-barre relative :</b></span><span style="position: absolute; right:300px"><svg id='<?php echo "barcode".$code?>'></svg></span></div><br><br><br>
            <div class="d-flex justify-content-between p-price"><span style="color:#017115;"><b>Date entree en stock :</b></span><span><?php echo $dateentree ?></span></div><br>
        </div>
        <div class=""><span style="color:#017115;"><b>Description du produit :</b></span><br><br><span><?php echo $desc ?></span></div>
    </div>
</div>











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

