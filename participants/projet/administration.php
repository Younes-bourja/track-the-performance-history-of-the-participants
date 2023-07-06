<?php session_start();
if($_SESSION['log']=='administration'){
}else{header( "location:login.php" );}
$_SESSION['message']="";
include('connectiondata.php') ;
include('operation2.php') ;?>
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
<?php include('layouts/main-header2.php') ?>
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
								<table class="table table-hover bg-light text-md-nowrap">
										<thead>
											<tr>
											<th class=" tx-22"> اسم القاعة </th>                                           
                                            <th class=" tx-16"> الرصيد</th>
										    
											<th  class="text-center"> </th>

											</tr>
										</thead>
										<tbody>
										<?php 
 
										$resultsearch=mysqli_query($con,"SELECT * FROM solde WHERE etat='active' ORDER BY id  DESC ");
             while($rows =$resultsearch ->fetch_assoc()): 
             ;?> 
											<tr>
											
											<td class=" tx-16" > <?php echo $rows['salle']; ?></td>
											<td class="text-success tx-16"> <?php echo $rows['solde'].'.00'; ?></td>
											
											
											
                                            <td class="text-center" style="direction: ltr">
											<?php if($rows['etat']=="active"):?>

											<button class="btn btn-teal btn-sm tx-16 btn-rounded w-50 text-white"
											 data-toggle="modal" data-target="#myModal14"
											       data-d-salle="<?php echo $rows['salle']; ?>" 
													data-d-solde="<?php echo $rows['solde']; ?>" 
													data-d-id="<?php echo $rows['id']; ?>"
											<?php	if($rows['solde']<=0){echo "style='pointer-events: none;background-color:silver;'";} ?>  >
                                                 إستلام المبلغ</button>
												 <?php elseif($rows['etat']=="archive"): ?>
													تاريخ إستلام الرصيد:
													<span style="direction: ltr" class="mr-4" ><?php   echo  mb_strimwidth($rows['date'],0, 11); ?></span>
													<i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                         <?php endif; ?>
                                        </td>
										
									
                                            
											</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								<table class="table table-hover bg-light text-md-nowrap" id="example1">
										<thead>
											<tr>
											<th class=" tx-22"> اسم القاعة </th>                                           
                                            <th class=" tx-16"> الرصيد</th>
										    
											<th  class="text-center"> المعلومات</th>

											</tr>
										</thead>
										<tbody>
										<?php 
 
										$resultsearch=mysqli_query($con,"SELECT * FROM solde WHERE etat='archive' ORDER BY id  DESC ");
             while($rows =$resultsearch ->fetch_assoc()): 
             ;?> 
											<tr>
											
											<td class=" tx-16" > <?php echo $rows['salle']; ?></td>
											<td class="text-success tx-16"> <?php echo $rows['solde'].'.00'; ?></td>
											
											
											
                                            <td class="text-center" style="direction: ltr">
											<?php if($rows['etat']=="active"):?>

											<button class="btn btn-teal btn-sm tx-16 btn-rounded w-50 text-white"
											 data-toggle="modal" data-target="#myModal14"
											       data-d-salle="<?php echo $rows['salle']; ?>" 
													data-d-solde="<?php echo $rows['solde']; ?>" 
													data-d-id="<?php echo $rows['id']; ?>"
											<?php	if($rows['solde']<=0){echo "style='pointer-events: none;background-color:silver;'";} ?>  >
                                                 إستلام المبلغ</button>
												 <?php elseif($rows['etat']=="archive"): ?>
													تاريخ إستلام الرصيد:
													<span style="direction: ltr" class="mr-4" ><?php   echo  mb_strimwidth($rows['date'],0, 11); ?></span>
													<i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                         <?php endif; ?>
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
							
						<div class="input-group mb-2 mt-4  ">
  <div class="input-group-prepend text-center w-0">
    <span class="input-group-text " id="basic-addon1"> اسم القاعة    : &nbsp;&nbsp;&nbsp;</span>
  </div>
  <span class="form-control text-center bg-light"  id="d-salle"    disabled></span>
</div>
								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center w-0">
    <span class="input-group-text " id="basic-addon1">الرصيد      : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
  </div>
  <span  class="form-control text-center bg-light text-success"   id="d-solde"  disabled ></span>
</div>  
<input  class="form-control text-center bg-light" name="d-id"  id="d-id"  hidden >
</div>
							</div>
							<button class="btn btn-indigo btn-rounded w-75" 
							style="margin: auto;" name="confirmation" type="submit" id="bmbm">

									تأكيد إستلام الرصيد
							</button><br>	
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
var id=button.data('d-id');
var salle=button.data('d-salle');
var solde=button.data('d-solde');
var modal=$(this)
document.getElementById("d-salle").innerHTML = salle;
document.getElementById("d-solde").innerHTML = solde+".00";
document.getElementById("d-id").value = id;


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