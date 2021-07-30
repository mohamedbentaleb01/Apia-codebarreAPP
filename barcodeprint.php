<html>
<head>
<script src="JsBarcode.all.min.js"></script>
  <style>
    p.inline {display: inline-block;}
  </style>
  <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
  </style>
</head>
<body onload="window.print()">
    <div style="margin-left:5px;">
    <?php
    require 'session.php';
    require 'connexion.php';
 
    // if(isset($_GET['submit']) && !empty($_GET['produit_id']) && !empty($_GET['prix']) && !empty($_GET['qte_cb'] && !empty($_GET['status']))){
      
      
      $id = $_GET['id'];
      $produit = $_GET['nom'];
      $prix = $_GET['prix'];
      $qte = $_GET['qte_cb'];

      $query2 = "SELECT * FROM produit WHERE code = $id "; 
      
      $result = mysqli_query($conn, $query2);

      while($row = mysqli_fetch_array($result)){

        $nom = $row['nom'];
        $code = $row['code'];
        
      }
      $arrayBarcodes[]=(string)$code;

    

    


    
    
    for($i=1;$i<=$qte;$i++){
      
      echo "<p class='inline'><span style=font-size:13px;margin-left:10px; ><b>".$nom."</b></span><br><span style=width:10px;><svg id=barcode".$code."></svg></span><br><span style=margin-left:50px;><b>Prix: ".$prix." DH </b><span></p>&nbsp&nbsp&nbsp&nbsp";
    }
    

    ?>



    

    


    
</div>


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

