<html>
<?php 
require 'session.php';
require 'connexion.php';

$username = $_SESSION["username"];


$sql = "SELECT * FROM magasinier WHERE username='$username'";

$result = mysqli_query($conn, $sql);

if (!$result) {
  printf("Error: %s\n", mysqli_error($conn));
  exit();
}

while($row = mysqli_fetch_array($result)){
  $username = $row["username"];
  $email = $row['email'];
  $fonction = $row['fonction'];
  $civilite = $row['civilite'];
  $dateembauche = $row['dateembauche'];
  $age = $row['age'];
  $magasin = $row['magasin'];
  $imageURL = 'uploads/'.$row['file_name'];
  
}
?>
  <head>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/a1c525c940.js" crossorigin="anonymous"></script>
    <title>Apia</title>
    <link rel="shortcut icon" type="image/" href="images/back.png"/>
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
    <div class="menu-item"><a href="logout.php" onclick="return logout()"><img src="assets/images/Vector_3.png" alt="" style="width: 20px; margin-right:10px; padding : 0px;" align="" onclick="confirm('déconnecter ?')" />Se déconnecter</a></div>
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


          /* Style the navigation bar
          .topnav {
          overflow: hidden;
          background-color: #017115;
        }

        .topnav a {
          float: none;
          display: inline-block;
          color: white;
          padding: 12px 60px;
          font-size: 20px;
          align-self: center;
        }

        .topnav a:hover {
          background-color: #008E19;
          color: white;
        }
        .topnav .logout{
          float: right;
          padding: 0px 10px;
          padding-top:  6px;
        } */
        body {
      background-image:url('https://source.unsplash.com/1600x900/?nature,water');
      background-repeat: no-repeat;
      backdrop-filter: blur(2px);
      
    }

    /* Style the sidebar - fixed full height */
.sidebar {
  height: 100%;
  width: 280px;
  position: absolute;
  z-index: 1;
  top: 119px;
  left: 0;
  background-color: #F7F7F7 ;
  overflow-x: hidden;
  padding-top: 16px;
  border-right: 2px solid  #017115; 
  border-top: 2px solid #017115;
  border-top-right-radius: 10px;
}

/* Style sidebar links */
.sidebar a {
  padding: 6px 8px 25px 10px;
  text-decoration: none;
  font-size: 16px;
  color: #017115;
  display: block;
  font-family: 'Titillium Web', sans-serif;
}

/* Style the main content */
.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 16px;
}

/* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 16px;}
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}



button:hover span{
  background-color: #017115;
  
}

button:hover {
  
  border: 5px solid #017115;
}






    </style>
  </head>

  

  <body>
    <!-- The sidebar -->
<div class="sidebar" align="center">
  <form method="POST" action="upload.php">
    <a href="<?=$imageURL?>">
    <img src="<?php echo $imageURL;?>" width="60%" style="height:100px; background-color: white; border-radius: 1000px;" alt=""/></a>
    <hr> 
    <a href="#home"  style="font-size:18px;"><b><?php echo $username; ?></b></a><hr>
    <a href="#services"></i> Fonction : <?php echo $fonction;?></a>
    <a href="#clients"></i> Email : <?php echo $email;?> </a>
    <a href="#contact"></i> Civilité : <?php echo $civilite;?></a>
    <a href="#contact"></i> Magasin : <?php echo $magasin;?></a>
      <button class="col s12 btn btn-large waves-effect green" name="submit" type="submit" width="100%" id="Submit" onclick="return change()" >Modifier </button>
  </form>
</div>

<script language="javascript">
  function change(){
    if(confirm("Voulez-vous changer la photo de profile ?")){
      windows.location.href='upload.php';
      return true;
    }else{
      return false;
    }

  }

</script>


  <!-- The sidebar -->
  <div class="menuApp" align="center">
      
        <button style="border-radius: 0px;
                        
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('action1.jpg');background-repeat:no-repeat; background-size:350px 210px;
                        position:absolute; height:210px; width:350px; left:400px; top:160px;" 
                  class="button" onclick="window.location.href = 'nvproduit.php'">
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color:white; 
                                "><img src="add-folder.png" style="width:10%" alt=""/>&nbsp<b style="text-shadow: 2px 2px 5px black;">Ajouter un produit</b></span>
                
        </button>
        

      <!-- <button class="secondaction" id="2" style="position:absolute; height:210px; width:200px; left:460px; top:500px; border-radius:10px; background:url('code_barre.jpg'); background-repeat:no-repeat; background-size:200px 209px; border: 4px solid #017115; "></button> -->
      <!-- <div class="desc2" style="color:#000; position:absolute; top:717px; left:470px; font-size:21px; font-family:'Titillium Web', sans-serif;background-color:white;" ><b>Générer un code barre</b></div> -->

      <button style="border-radius: 0px;
                        
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 250px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('stockimg.png');background-repeat:no-repeat; background-size:350px 250px;
                        position:absolute; height:210px; width:350px; left:400px; top:420px;" 
                  class="button" onclick="window.location.href = 'gestionproduit.php'">
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white;
                              "><img src="stock.png" style="width:10%" alt=""/> <b style="text-shadow: 2px 2px 5px black;">Gestion de stock</b></span>
                
        </button>
      <!-- <button class="thirdaction" id="3" style="position:absolute; height:210px; width:200px; left:880px; top:190px; border-radius:10px; background:url('ticket.png'); background-repeat:no-repeat; background-size:200px 209px; border: 4px solid #017115; "></button> -->
      <!-- <div class="desc3" style="color:#000; position:absolute; top:412px; left:880px; font-size:21px; font-family:'Titillium Web', sans-serif; background-color:white;" ><b>Imprimer etiquette</b></div> -->

      <button style="border-radius: 0px;
                        
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('action2.jpg');background-repeat:no-repeat; background-size:350px 210px;
                        position:absolute; height:210px; width:350px; left:810px; top:160px;" 
                  class="button" onclick="window.location.href='genereretiquette.php'">
                  <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                transition: 0.5s;
                                
                                color: white"><img src="price-tag.png" style="width:12%;" alt=""/>&nbsp <b style="text-shadow: 2px 2px 5px black;">Génerer un etiquette</b></span>
                
        </button>
      
      <!-- <button class="fourthaction" id="4" style="position:absolute; height:210px; width:200px; left:880px; top:500px; border-radius:10px; background:url('assets/images/Rectangle_8.png'); background-repeat:no-repeat; background-size:200px 209px; border: 4px solid #017115;"></button> -->
      <!-- <div class="desc4" style="color:#000; position:absolute; top:717px; left:880px; font-size:21px; font-family:'Titillium Web', sans-serif; background-color:white;" ><b>Tracer la sortie d'un produit</b></div> -->

      <button style="border-radius: 0px;
                       
                        color: #FFFFFF;
                        font-size: 22px;
                        padding: 20px;
                        width: 200px;
                        transition: all 0.5s;
                        cursor: pointer;
                        margin: 5px;
                        background:url('action4.jpg');background-repeat:no-repeat; background-size:350px 210px;
                        position:absolute; height:210px; width:350px; left:810px; top:420px;" 
                  class="button" onclick="window.location.href='sortie.php'">
        <span style="cursor: pointer;
                                display: inline-block;
                                position: relative;
                                
                                transition: 0.5s;
                                color: white"><img src="checklist.png" style="width:12%;" alt=""/> <b style="text-shadow: 2px 2px 5px black;">Sortie d'un produit</b></span>
                  
                
        </button>
    </div>










  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script> 
</body> 
</html>