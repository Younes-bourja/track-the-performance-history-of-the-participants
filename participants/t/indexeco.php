<?php include('connection.php') ;?>
<?php  session_start();


?>
<!DOCTYPE html>
<html lang="en"  >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouyoushop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="icon" href="flag/11872574.ico" type="image/icon type" class="h-100 w-100">

</head>

<?php require_once ("header.php"); ?>



<?php
 $row1=0;$page=1;
 if(isset($_GET['page'])){
 $page=$_GET['page'];}
 if(isset($_GET['produit'])){
  $produit=$_GET['produit'];}
 

$famille="الكل";
if(isset($_GET['famille'])){
  if($_GET['famille']!=""){
    $famille=strip_tags($_GET['famille']);
} 

}

if(isset($_GET['message']) and isset($_GET['clr'])){
  $message=strip_tags($_GET['message']);
  $color=strip_tags($_GET['clr']);
  $formmessage="<a style='text-decoration: none;' href='indexeco.php?page=$page&famille=$famille&produit=$produit' id='modalmessage' class='modal fade ' >
  <div class='modal-dialog ' role='document'>
      <div class='modal-content  mt-5   text-$color'> 
       <div class='modal-body '><center> $message </center> </div></div></div></a>";
echo $formmessage;}?>

<body  class="bg-light"  >
<style>
 
 .overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  height: 35%;
  border-radius: 15px;
  width: 100%;
  transition: .5s ease;
  opacity:1;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}
.slide1 {
  position: relative;
  width: 100%;
  
}

.slide1:hover .overlay {
  opacity: 1;
}

</style>

<div class="" style="width: 90%; position:relative;left:5%;right:5%">
  <div class="col-12">

<span  style="position:absolute;right:03px;top:02px;"> 
<a class="btn btn-sm text-info border-0" data-bs-toggle="modal" data-bs-target="#myModal2"> 
البلد من هنا
</a>
يمكنك تغيير 

</span>
  
  </div>
  <br>
<div class="row" >

<div class="col-md-9 col-0  mt-3"   >
  <label for="genre"><h6>Category:</h6></label>
  <select name="genre" id="genre" style="height:30px;max-width:200px;min-width:130px ;direction: rtl; text-align: right;">
    <option hidden>
   <?php if(isset($famille)){echo $famille;echo "<option >الكل</option>";}if(!$famille){ echo "الكل";}?>
    </option>
    <?php   $resultsearch=mysqli_query($con,"SELECT * FROM categories WHERE categorie='produit famille' ORDER BY valeur  ");
             while($rows =$resultsearch ->fetch_assoc()): 
             ;?>
    <option > <?php echo $rows['valeur']; ?> </option>
    <?php endwhile; ?>
  </select>
   
   <button  onclick="genre();"><i class="fa fa-search" ></i></button>
  </div>
  <div class="col-md-3 col-0   my-2  mt-3"   >
<form method="GET" action="indexeco.php">
<div class="input-group rounded">
   <input type="text"  autocomplete="off" class="form-control shadow-none " id="myInput" onkeyup="myFunctionfiltersearch()" placeholder="Search.." name="produit">
  <button class="input-group-text border-1" type="submit">
    <i class="fas fa-search"></i>
  </button>
</div> </form>
      <ul id="myUL" style="display:none;width:100%; height: 100px;overflow: auto;" class="list-group">
  <?php   $resultsearch=mysqli_query($con,"SELECT * FROM produit  ");
             while($rowsearch =$resultsearch ->fetch_assoc()): 
             ;?>
  <li ><a  class="list-group-item list-group-item-action" class="btn btn-block " style="direction: rtl; text-align: right;" href="?produit=<?php echo $rowsearch['produit']; ?>"><?php echo $rowsearch['produit']; ?></a></li>
<?php endwhile; ?>
</ul>

  </div>
  
 
</div>


    <div class="row mt-2">
   
    
<?php  
 $row1=0;$page=1;
if(isset($_GET['page'])){
 
$page=$_GET['page'];
if($page >= 1){
  
$row1=(12*$page)-12 ;}

}
$produit="";
if(isset($_GET['produit'])){
  
  $produit=$_GET['produit'];
}
$likefamile=$famille;
if($likefamile=="الكل"){$likefamile="";}else $likefamile=$famille;
$countpanier =0;
$result=mysqli_query($con,"SELECT * FROM produit WHERE famille LIKE '%$likefamile%' AND produit LIKE '%$produit%'   ORDER BY id DESC  LIMIT 12 OFFSET $row1 ");
$row1 = mysqli_num_rows($result);

if($row1>=2){$p="col-6";}else{$p="col-md-4";};
while($row =$result ->fetch_assoc()): 
              $countpanier =$countpanier +1 ;?>
             
    <div  class=" col-md-3 <?php echo $p; ?> my-0 my-md-0 ">
    <center>  <div class="    mb-3  "   >  
           <div class=" card " style="border-radius: 10px 10px; " >
            <div class="slide1"> 
       
               <div style="border-radius: 10px ; height: 230px;width: 100%; background-image: url('images/<?php echo $row['photo']; ?>');background-repeat: no-repeat;background-size: 100% 100%;" ></div>  
               
            <div class="overlay">
            <button type="button" class="btn btn-info text-white  btn-sm shadow-none" data-toggle="modal" data-target=".bd-example-modal-md<?php echo $countpanier;?>">         
          المواصفات
          </button>
  </div>
  </div>
  <div class="modal fade bd-example-modal-md<?php echo $countpanier;?>  w-100" tabindex="-1" style="" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <button type="button" class="close  btn    "style="position: absolute; right: 20px;top: 25px;color:white;" data-dismiss="modal">
             X</button>
  <div class="modal-dialog modal-dialog-centered modal-lg" >   
    <div class="modal-content "  >
               
    <div id="carouselExampleIndicators<?php echo $countpanier;?>" class="carousel slide " data-ride="carousel">
									
										  <div class="carousel-inner h-50" style="border-radius: 5px;" >
										    <div class="carousel-item active"   >
										      <img class="d-block w-100 "style="max-height: 640px;"  src="images/<?php echo $row['photo']; ?>" alt="First slide">
										    </div>
										    <?php if($row['image1']!="") :?>
										    <div class="carousel-item">
										      <img class="d-block w-100"style="max-height: 640px;" src="images/<?php echo $row['image1']; ?>" alt="Third slide">
										    </div>
                         <?php endif; ?>
                        <?php if($row['image2']!="") :?>
										    <div class="carousel-item">
										      <img class="d-block w-100"style="max-height: 640px;" src="images/<?php echo $row['image2']; ?>" alt="Fourth slide">
										    </div>
                        <?php endif; ?>
                         <?php if($row['image3']!="") :?>
										    <div class="carousel-item">
										      <img class="d-block w-100 "style="max-height: 640px;" src="images/<?php echo $row['image3']; ?>" alt="Fifth slide">
										    </div>
                        <?php endif; ?>
                        <?php if($row['description']!="") :?>
                        <div class="carousel-item">
										      <div class="d-block mt-1 w-100 h-100"style="" >
                          <center><h4  style=" text-shadow: 0 0 3px pink;"><?php echo $row['produit']; ?></h4></center>
                        <div class="row ">
                          <div class="col-1"></div>
                          <div class="col-10" style="height: 100%;border-style: solid; border-color: black; border-radius: 5px;">
                          <div class="   "  style="direction: rtl; text-align: right;max-height: 570px;min-height: 440px;overflow-y: scroll;width: 100%;">
                          <?php echo $row['description']; ?></div>  
                        </div>
                          <div class="col-2"></div>
                        </div>
                        </div><br>
										    </div><?php endif; ?>
										  </div>
										  <a class="carousel-control-prev  " href="#carouselExampleIndicators<?php echo $countpanier;?>"  style="width: 40px;" role="button"  data-slide="prev">
										    <span  class="carousel-control-prev-icon  bg-dark" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $countpanier;?>" style="width: 40px;" role="button" data-slide="next">
										    <span class="carousel-control-next-icon bg-dark  " aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
										</div>
    </div>
  </div>
</div>
<div class="bg-light" style="height: 42px;direction: rtl;">
               <h6><?php echo $row['produit']; ?></h6>
              </div>
       
            <div class="input-group rounded "  >
              <span  class="form-control  border-2" style="color: 	#a52a2a;border-color: #FF4500;"  >

            <h6 style="font-variant: small-caps;" class=" mb-1 "> <?php if(isset($_SESSION['current'])){ echo $row['pv']." ".$_SESSION['current']; }?></h6>

          
               </span>
              <a class="input-group-text border-0   shadow-none " align="center"  style="background-color: #FF4500;color: 	white;border-radius: 0px 3px 3px 0px ;" href = "javascript:;" onclick = "this.href='operationsql.php?&panier=<?php echo $row['id']; ?>&famille=<?php echo $famille;?>&page=<?php echo $page;?>&produit=<?php echo $produit;?>&qtt=1' "   > 
             <i class="fas fa-shopping-cart "></i> </a>
               </div>
 </div>
          
    
      </center>
    </div><?php endwhile ?>
    </div>
 </div>
 
   
  
   <div class="bg-info"  style=" height:37px;">
<div class="container">
<div class="row">
<center>
<div class="col-md-4">
  <?php  
                       
                       $result=mysqli_query($con,"SELECT count(*)
                       FROM produit WHERE famille LIKE '%$likefamile%' AND produit LIKE '%$produit%'  ");
                        $count =$result ->fetch_assoc();
                     $max=$count['count(*)'];      
                                   
                     ?>

                   
   <ul class="pagination " >
      <li class="page-item w-100">
    <?php 
   
   

    if($page < 1){$page=1;}
    if($page > 1): 
    if($page*12 > 11+$max):?>
    <a class="page-link text-center" href="?famille=<?php echo $famille?>&page=0&produit=<?php echo $produit?>">Previous</a>
     <?php else:?>
  <a class="page-link text-center" href="?famille=<?php echo $famille?>&page=<?php echo $page-1;?>&produit=<?php echo $produit?>">Previous</a>
   <?php endif;?>  <?php else: ?>
      <span class="page-link text-center bg-dark"  style="opacity: 0.8;cursor: not-allowed;">Previous</span>

    <?php endif; ?></li>
   
    <li class="page-item w-100" >
    <?php if($page*12 < $max):?>
    <a class="page-link text-center" href="?famille=<?php echo $famille?>&page=<?php echo $page+1;?>&produit=<?php echo $produit?>">Next</a>
    <?php else: ?>
      <span class="page-link text-center  bg-dark" style="opacity: 0.8;cursor: not-allowed;">Next</span>

    <?php endif; ?></li>
    </ul>
</div>
</center>
</div></div>
 </div>

</div>
<?php require_once ("footer.php"); ?>

<?php
$tt="rr";$zz="sds";
if($tt=$zz):?>

</body>
<?php endif;?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">



function myFunctionfiltersearch() {

    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    if (filter=="") {
            ul.style.display = "none";
        }else{ul.style.display = "block";}
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function genre(){
var genre=document.getElementById("genre").value;;
document.location.href="?famille="+genre;

}
window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#myModal").modal('show');
    }
  
</script>
<!-- Button to Open the Modal -->

<?php if($_SESSION['country']==""):?>
<!-- The Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content  " style="border-radius: 15px ;">

      <div class="modal-body">
        <h4 align="center" class="ml-3 "> اختر البلد</h4>
        <br>
       <a class="btn btn-block p-5  " href="login.php?country=saoudi arabia&famille=<?php echo $famille;?>&page=<?php echo $page;?>&produit=<?php echo $produit;?>" style="border-radius: 15px ; height: 180px;width: 100%; background-image: url('flag/Saudi-Flag.png');background-repeat: no-repeat;background-size: 100% 100%;">
      </a><br>
      <a class="btn btn-block p-5" href="login.php?country=emirate&&famille=<?php echo $famille;?>&page=<?php echo $page;?>&produit=<?php echo $produit;?>" style="border-radius: 15px ; height: 180px;width: 100%; background-image: url('flag/علم_الإمارات.jpeg');background-repeat: no-repeat;background-size: 100% 100%;">
      </a>
      
      </div>
    </div>
  </div>
</div>
<?php endif?>
<!-- The Modal -->
<div class="modal fade" id="myModal2" >
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content  " style="border-radius: 15px ;">

      <div class="modal-body">
        <h4 align="center" class="p-1"> اختر البلد</h4>
        
       <a class="btn btn-block p-5  " href="login.php?country=saoudi arabia&famille=<?php echo $famille;?>&page=<?php echo $page;?>&produit=<?php echo $produit;?>" style="border-radius: 15px ; height: 180px;width: 100%; background-image: url('flag/Saudi-Flag.png');background-repeat: no-repeat;background-size: 100% 100%;">
      </a><br>
      <a class="btn btn-block p-5" href="login.php?country=emirate&&famille=<?php echo $famille;?>&page=<?php echo $page;?>&produit=<?php echo $produit;?>" style="border-radius: 15px ; height: 180px;width: 100%; background-image: url('flag/علم_الإمارات.jpeg');background-repeat: no-repeat;background-size: 100% 100%;">
      </a>
      
      </div>
    </div>
  </div>
</div>
</html>