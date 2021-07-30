<html>
<body>
<form action='' method="POST" enctype="multipart/form-data">
<center>
<h2><u>Changer la photo de profile :</u></h2>
<br><br><br>
<input type="file" name="file">

<br><br><br><br>
<button type="submit" name="uploadfilesub">Changer</button>
<br>

</form>
</body>
</html>


<?php
//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.
// $conn = mysqli_connect(“localhost”, “root”, “”, “uploadFile”);
require 'connexion.php';
require 'session.php';
if($conn) {
//if connection has been established display connected.

}
//if button with the name uploadfilesub has been clicked
if(isset($_POST["uploadfilesub"]) && !empty($_FILES["file"]["name"])) {
//declaring variables
$filename = $_FILES["file"]["name"];
$filetmpname = $_FILES["file"]["tmp_name"];
//folder where images will be uploaded
$folder = 'uploads/';
$targetFilepath= $folder . $filename;
$fileType = pathinfo($targetFilepath, PATHINFO_EXTENSION);




$allowTypes = array('jpg','png','jpeg','gif','pdf');
if(in_array($fileType, $allowTypes)){


//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);
//inserting image details (ie image name) in the database
$date=date("Y-n-j G:i:s");
$sql = " UPDATE magasinier SET file_name ='$filename', uploaded_on = '$date' ";
$qry = mysqli_query($conn, $sql);

if (!$qry) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
if( $qry) {
echo "</br><h3 style=color:green><b>Photo de profile changé !<b></h3>";
}else{
    echo "</br><h3 style=color:red><b>Veuillez réessayer plus tard !<b></h3>";
}

}else{
  echo "</br><h3 style=color:red><b>Format de fichier non autorisé !! Veuillez réessayer.<b></h3>";

} 
if(isset($_POST["uploadfilesub"]) && empty($_FILES["file"]["name"])){
  echo "</br><h3 style=color:red><b>Selectionner une photo !<b></h3>";
}
}
?>
<br>
<a href="espacemagasinier.php">Retourner à l'acceuil</a>
</center>