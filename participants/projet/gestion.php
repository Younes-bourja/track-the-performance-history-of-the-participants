<?php session_start();
if($_SESSION['log']=='login'){
}else{header( "location:login.php" );}
$_SESSION['message']="";
include('connectiondata.php') ;
mysqli_query($con,"UPDATE  clients SET status='inactive' WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN -300 AND -11 ORDER BY id ASC  ");

include('operationsalle.php') ;?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>test </title>
	<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="../public/assets/img/brand/favicon.png" type="image/x-icon"/>
<link href="../public/assets/css/icons.css" rel="stylesheet">
<link href="../public/assets/css-rtl/style.css" rel="stylesheet">
<link href="../public/assets/plugins/notify/css/notifIt.css" rel="stylesheet"/>
<link href="../public/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="../public/assets/plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="../public/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>
</head>
<body class="main-body bg-primary-transparent">
<?php include('layouts/main-header3.php') ?>
	<div class="container-fluid " >
<div id="global-loader">
			<img src="../public/assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="" style="position: absolute;top:75px">
						<div class="d-flex">
							<h4 class="content-title  my-auto">    الصفحة الرئيسية :  </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
						</div>
					</div>
				
						
					</div>
				
				<!-- breadcrumb -->

				<!--div-->
			
				<div class="col-md-11 " style=" margin: auto;">				
						<div class="card ">
							<div class="card-header  pb-0">
								
							</div>
							<div class="card-body ">
								<div class="table ">
								<table class="table table-hover bg-light text-md-nowrap" id="example1">
										<thead>
											<tr>
                                            <th class="text-center" > الصورة</th>
											<th> إسم المنخرط</th>                                           
                                            <th>تاريخ الأنخراط</th>
										    <th>تاريخ الاستفادة </th>
                                            <th> تاريخ الأداء</th>
											<th  class="text-center"> المعلومات</th>

											</tr>
										</thead>
										<tbody>
										<?php 
 
										$resultsearch=mysqli_query($con,"SELECT * FROM clients WHERE status='active' ORDER BY id DESC  ");
             while($rows =$resultsearch ->fetch_assoc()): 
             ;?> 
											<tr>
											<td class="text-center">
											<img alt="avatar" class="rounded-circle avatar-lg mr-2" src="images/<?php echo $rows['image']; ?>">
											</td>
											<td> <?php echo $rows['client']; ?></td>
											<td> <?php echo $rows['date']; ?></td>
											
											<td><?php echo $rows['date1']; ?></td>
											<td><?php echo $rows['date2']; ?></td>
											
											
                                            <td class="text-center">

											<a 
											 data-toggle="modal" data-target="#myModal14"
											       data-d-client="<?php echo $rows['client']; ?>" 
													data-d-date="<?php echo $rows['date']; ?>" 
													data-d-image="<?php echo $rows['image']; ?>" 
													data-d-date2="<?php echo $rows['date2']; ?>"
													data-d-phone="<?php echo $rows['phone']; ?>"  >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center mt-3" 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
       
                                        </td>
										
									
                                            
											</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					</div>

					<!-- معلومات حول المشترك- -->
		<div id="myModal14" class="modal fade bg-secondary-gradient" role="dialog">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content modal-md center">
		<div class="row">

					<div class="col-md-12 ">
					<form action="" method="post">

						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="true">&times;</span></a>
							<div  id="d-img"></div>
							
							<div class="card-body">
							 	<div class="">
								 <h4 class="card-title" id="d-client" ></h4>
								 <h6 class="card-title" id="d-phone" ></h6>
			
						
								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center w-0">
    <span class="input-group-text " id="basic-addon1">تاريخ الإنخراط     : </span>
  </div>
  <span  class="form-control text-center bg-light"   id="d-date"  disabled ></span>
</div>  
<div class="input-group mb-2  ">
  <div class="input-group-prepend text-center w-0">
    <span class="input-group-text " id="basic-addon1">تاريخ الاداء    : &nbsp;&nbsp;&nbsp;</span>
  </div>
  <span class="form-control text-center bg-light"  id="d-date2"    disabled></span>
</div>    	
</div>
							</div>
						 </div>
					</form>
					</div>
					</div>
			</div>
		</div>
		</div>

	
</body>
<!-- Internal Data tables -->
<script src="../public/assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script src="../public/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="../public/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../public/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<!--Internal  Datatable js -->
<script src="../public/assets/js/table-data.js"></script>
<!-- Internal Modal js-->
<script src="../public/assets/js/modal.js"></script>
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<!-- Bootstrap Bundle js -->
<script src="../public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ionicons js -->
<script src="../public/assets/plugins/ionicons/ionicons.js"></script>
<!-- Moment js -->
<script src="../public/assets/plugins/moment/moment.js"></script>
<!-- Rating js-->
<script src="../public/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="../public/assets/plugins/rating/jquery.barrating.js"></script>
<!--Internal  Perfect-scrollbar js -->
<script src="../public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../public/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
<!-- Eva-icons js -->
<script src="../public/assets/js/eva-icons.min.js"></script>
<!-- Sticky js -->
<script src="../public/assets/js/sticky.js"></script>
<!-- custom js -->
<script src="../public/assets/js/custom.js"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="../public/assets/plugins/spectrum-colorpicker/spectrum.js"></script>
<!-- Internal Select2.min js -->
<script src="../public/assets/plugins/select2/js/select2.min.js"></script>
<!-- Internal form-elements js -->
<script src="../public/assets/js/form-elements.js"></script>
<!--Internal Fileuploads js-->
<script src="../public/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="../public/assets/plugins/fileuploads/js/file-upload.js"></script>
<!--Internal Fancy uploader js-->
<script src="../public/assets/plugins/notify/js/notifIt.js"></script>
<script>
$('#myModal14').on('show.bs.modal',function(event){
var button=$(event.relatedTarget);
var date=button.data('d-date');
var image=button.data('d-image');
var date2=button.data('d-date2');
var client=button.data('d-client');
var phone=button.data('d-phone');
img='<img src="images/'+image+'">';
var modal=$(this)
document.getElementById("d-date").innerHTML = date;
document.getElementById("d-date2").innerHTML = date2;
document.getElementById("d-client").innerHTML = client;
document.getElementById("d-phone").innerHTML = phone;

document.getElementById("d-img").innerHTML = img;
});
	
</script>
<?php if( $_SESSION['message']!=""): ?>
<script>
	notif({
		msg: "<?php echo  $_SESSION['message']; ?>",
		type: "info"
	});</script>

	<?php $_SESSION['message']=""; ?>
	<?php endif;
	?>

</html>