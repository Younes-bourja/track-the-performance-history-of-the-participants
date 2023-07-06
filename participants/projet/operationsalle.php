<?php include('connectiondata.php') ;

      mysqli_query($con,"UPDATE  clients SET status='inactive' WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN -300 AND -11 ORDER BY id ASC  ");

if(isset($_POST['payment'])){

  $id=$_POST["id"];
  $month=$_POST["mois"];
  
  mysqli_query($con," UPDATE clients SET date1=date2  WHERE id='$id';");
  mysqli_query($con," UPDATE clients SET date2=DATE_ADD(date2, INTERVAL $month month )  WHERE id='$id';");
  mysqli_query($con," UPDATE solde SET solde=solde+200*$month  WHERE salle='salle1' AND etat='active';");

  $_SESSION['message']=" لقد تم أداء الواجب الشهري بنجاح";
  }
  
  if(isset($_POST['day'])){

    $id=$_POST["client"];
    if($id==""){$id=="الجميع";}
    $day=$_POST["days"];
    if($id!="الجميع" && $id>0){
      $name=$_POST["name"];
      $message="  تمت  إضافة $day  يوم  بنجاح   للنمخرط  &nbsp;&nbsp; $name  &nbsp;&nbsp;";
      mysqli_query($con," INSERT INTO notification(name,objet,date,etat)
     VALUES ( 'admin','$message',CURRENT_DATE,'en cour')");
      mysqli_query($con," UPDATE clients SET date2=DATE_ADD(date2, INTERVAL $day day )  WHERE status='active' AND id LIKE $id;");
      $_SESSION['message']=" تمت  إضافة $day  يوم للنمخرط بنجاح ";

    }elseif($id="الجميع"){
      $message="تمت  إضافة  $day  يوم للجميع  ";
      mysqli_query($con," INSERT INTO notification(name,objet,date,etat)
      VALUES ( 'admin','$message',CURRENT_DATE,'en cour')");
      
      mysqli_query($con," UPDATE clients SET  date2 =DATE_ADD(date2, INTERVAL $day day ) WHERE status='active';");
      $_SESSION['message']="تمت  إضافة  $day  يوم للجميع  ";
    };
    
    }
                                         
  if(isset($_POST['add'])){

  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $date=date("Y-m-d");
  $date1=date("Y-m-d");
  $datepay=date_create(date("Y-m-d"));
  date_add($datepay,date_interval_create_from_date_string("1 month"));
  $date2= date_format($datepay,"Y-m-d");



   $temp = explode(".", $_FILES["image"]["name"]);
  $temp[0] = rand(0, 300000000); 
  $photo = $temp[0]  . '.'. $temp[1];            
  
  if (( ($temp[1] == "jpeg") || ($temp[1] =="jpg") || ($temp[1] == "pjpeg") ||  ($temp[1] == "png"))  ) {
  
  $upload='images/'.basename($photo);
  $image_tmp = $_FILES["image"]["tmp_name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],$upload);

       $message=" لقد تم إضافة منخرط جديد  بنجاح"; 
       mysqli_query($con," INSERT INTO notification (name,objet,date,etat)
         VALUES ( 'admin','$message',CURRENT_DATE,'en cour')");
mysqli_query($con," INSERT INTO clients(image,client,phone,date,date1,date2,status)
VALUES ( '$photo','$name','$phone', '$date', '$date1','$date2','active')");
  mysqli_query($con," UPDATE solde SET solde=solde+200  WHERE salle='salle1' AND etat='active';");

     $_SESSION['message']=" لقد تم إضافة منخرط جديد  بنجاح"; 

}else{
 

}


}

  
  



	

?>