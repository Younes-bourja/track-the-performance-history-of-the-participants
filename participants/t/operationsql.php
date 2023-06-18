<?php  session_start();
include('connection.php') ;
$famille="";$page="";$produit="";
 if(isset($_GET['famille']) and isset($_GET['page']) and isset($_GET['produit'])){
 $famille=$_GET['famille'];
       $page=$_GET['page'];
      $produit=$_GET['produit'];}



    
    
    if(isset($_GET['panier']) and isset($_GET['qtt'])){
      if(isset($_SESSION['userphone']) and isset($_SESSION['username'])){
        $name= $_SESSION['username'];
      $phone= $_SESSION['userphone'];
      $id=$_GET['panier'];  
      $qtt=$_GET['qtt'];
    
      $result=mysqli_query($con,"SELECT * FROM panier
      WHERE client = '$name' AND matricule = '$phone' AND produit=(SELECT produit.produit FROM produit WHERE produit.id='$id');");
 $row = mysqli_num_rows($result);
if($row!=0){
      
      if($qtt>=1 && $qtt<=101){
        $query = mysqli_query($con, "UPDATE panier SET quantite='$qtt' WHERE client = '$name' AND matricule = '$phone' AND produit=(SELECT produit.produit FROM produit WHERE produit.id='$id');");
        $message="La quantité de la produit a été modifié  avec succès";
              header("location: indexeco.php?message=$message&famille=$famille&page=$page&produit=$produit&clr=success'");
      }else{

        $message="il y a une erreur dans la saisie de la quantité!!! ";
        header("location: indexeco.php?famille=$famille&page=$page&produit=$produit");
      }
    }else{
      if($qtt>=1 && $qtt<=101){
      $query = mysqli_query($con, "INSERT INTO  panier(client,matricule,image,produit,prix,quantite,reference)
      VALUES ( '$name','$phone',(SELECT produit.photo FROM produit WHERE produit.id='$id'), (SELECT produit.produit FROM produit WHERE produit.id='$id'), (SELECT produit.pv FROM produit WHERE produit.id='$id'),'$qtt',(SELECT produit.reference FROM produit WHERE produit.id='$id'))");
      $message="Le produit a été ajouté au panier avec succès";
      header("location: indexeco.php?message=$message&clr=success&famille=$famille&page=$page&produit=$produit");
    }else{
      $message="!!!الكمية مرفوضة";
            header("location: indexeco.php?message=$message&clr=danger&famille=$famille&page=$page&produit=$produit");
    }}
       }
       if(!$_SESSION['userphone'] and !$_SESSION['username']){
            header("location: indexeco.php?");}}

    if(isset($_GET['deletepanier'])){
        $id=$_GET['deletepanier'];
        $query = mysqli_query($con, "DELETE FROM panier WHERE id='$id'");
        header("location: panier.php?famille=$famille&page=$page&produit=$produit");}

    if(isset($_GET['id']) and isset($_GET['nouveauqtt'])){
        $id=$_GET['id'];  
        $nouveauqtt=$_GET['nouveauqtt'];
        if($nouveauqtt>=1 && $nouveauqtt<=101){
             $query = mysqli_query($con, "UPDATE panier SET quantite='$nouveauqtt' WHERE id='$id'");
              
              header("location: panier.php?famille=$famille&page=$page&produit=$produit");
        }else{
      $message="!!!الكمية مرفوضة";
      header("location: panier.php?message=$message&clr=danger&famille=$famille&page=$page&produit=$produit");
    }
             }
              
        if(isset($_GET['passerlacommande'])){
          if(isset($_SESSION['userphone']) and isset($_SESSION['username'])){
            $name= $_SESSION['username'];
          $phone= $_SESSION['userphone'];
          $username= $_GET['name'];
          $userphone= $_GET['phone'];
          $ville= $_GET['ville'];
          $pay= $_GET['pay'];
          $adresse= $_GET['adresse'];
$table='<table class="table table-sm table-bordered bg-light">';
$client= "<tr><td>full name </td><td>".$username."</td></tr><tr><td>phone:</td><td>".$userphone."</td></tr><tr><td>pays</td><td>".$pay."</td></tr><tr><td>ville</td><td>".$ville."</td></tr><tr><td>adresse</td><td>".$adresse."</td></tr></table>";
          if(isset($_GET['passerlacommande'])){
            $imprimante='<table class="table table-sm table-bordered"><tr><th>Reference</th><th>Produit</th><th>Prix unité</th><th>Quantité</th><th>Prix</th></tr>';
            $client=$table.$client;
            $commande="";
            $prixtotal=0;
            $pp=0;
        
            $result=mysqli_query($con,"SELECT * FROM panier  WHERE client = '$name' AND matricule = '$phone';");
             $row1 = mysqli_num_rows($result);
             if($row1 !== 0){
             while($row =$result ->fetch_assoc()):
           $imprimante=$imprimante." <tr><td> ".$row["reference"]."</td><td>".$row["produit"]."</td><td>".$row["prix"]."</td><td>".$row["quantite"]."</td><td>".$row["quantite"]*$row["prix"]."</td></tr>" ;
           $commande=$commande.'<div class="row ml-1"><div class="col-5">'.$row["produit"].'</div><div class="col-3"> x'.$row["quantite"].'</div><div class="col-4"> '.$row["quantite"]*$row["prix"]." </div></div>" ;

           $prixtotal=$prixtotal+$row["quantite"]*$row["prix"];
           endwhile ;
           $imprimante=$imprimante."</table>";
           $query = mysqli_query($con, "INSERT INTO  commande(client,matricule,commande,imprimante,prixtotal,status)
           VALUES ( '$username','$client','$commande' ,'$imprimante',$prixtotal,'<div style=\"color: blue;\">en attente</div>')");
          $query = mysqli_query($con, "DELETE  FROM panier WHERE client='$name' AND matricule='$phone'");
          $message="لقد تم ارسال الطلب بنجاح";
          header("location: panier.php?message=$message&famille=$famille&page=$page&produit=$produit&clr=success'");
             }else{
              $message="!!!السلة فارغة";
          header("location: panier.php?message=$message&famille=$famille&page=$page&produit=$produit&clr=danger'");  
             }
            
            }
           
          }
           
        }
        if(!$_SESSION['userphone'] and !$_SESSION['username']){
          header("location: indexeco.php?");}
      
       
?>