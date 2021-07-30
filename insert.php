<?php 


$connection=mysqli_connect('localhost:3306','root','','apia');

 if(isset($_POST['submit']) && !empty($_FILES["file"]["name"])){


  
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


 
	// Allow certain file formats
	$allowTypes = array('jpg','png','jpeg','gif','pdf');
	if(in_array($fileType, $allowTypes)){
			// Upload file to server
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
 

	
	
	$categorie=$_POST['categorie'];
	$nom=$_POST['nom'];
	$quantite=$_POST['quantite'];
	$date=date("Y-n-j G:i:s");
	$description=$_POST['description'];


	

	$sql="INSERT INTO produit ( categorie, nom, qte, description , dateentree, datesortie,file_name, uploaded_on) VALUES ('$categorie','$nom','$quantite','$description', '$date',NULL,'".$fileName."','$date')";

	$result=mysqli_query($connection,$sql);

	//get the last id
	  $id=mysqli_insert_id($connection);

	// //Combine id with current minute and second
	  $code=$id.date('is');

	  $sql="UPDATE produit SET code='$code' WHERE produit_id='$id'";


	 $result=mysqli_query($connection,$sql);


	 if ($result){
    echo "<div align=center style=color:green;>
   Ajouter avec succée 
    </div>";
				sleep(1);
							
				header("Location:status.php?status=success");
		} else {
				
      echo "<div align=center style=color:red;>
      refusé !
       </div>";
		header("location:nvproduit.php?status=refused");

}

}else {
				
	echo "<div align=center style=color:red;>
	refusé !
	 </div>";
	 header("location:nvproduit.php?status=refused");

}
}else {
				
	echo "<div align=center style=color:red;>
	refusé !
	 </div>";
	 header("location:nvproduit.php?status=refused");

}
}else {
				
	echo "<div align=center style=color:red;>
	refusé !
	 </div>";
	 header("location:nvproduit.php?status=refused");

}


mysqli_close($connection);

 ?>

