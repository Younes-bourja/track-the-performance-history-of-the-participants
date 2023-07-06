<?php include('connectiondata.php') ;
if(isset($_POST['confirmation'])){

  $id=$_POST["d-id"];
  
  
  mysqli_query($con," UPDATE solde SET etat='archive'  WHERE id='$id';");
  mysqli_query($con," INSERT INTO solde(salle,solde,etat)
  VALUES ( 'salle1',00.00,'active')");


  $_SESSION['message']="  تم إستلام الرصيد   بنجاح";
  }
?>