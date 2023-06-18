<?php include('connection.php') ;?>
<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>test </title>
<!-- Favicon -->
<link rel="icon" href="../public/assets/img/brand/favicon.png" type="image/x-icon"/>
<!-- Icons css -->
<link href="../public/assets/css/icons.css" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="../public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="../public/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="../public/assets/css-rtl/sidemenu.css">

<!--- Style css -->
<link href="../public/assets/css-rtl/style.css" rel="stylesheet">
<!--- Dark-mode css -->
<link href="../public/assets/css-rtl/style-dark.css" rel="stylesheet">
<!---Skinmodes css-->
<link href="../public/assets/css-rtl/skin-modes.css" rel="stylesheet">
<link href="../public/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link href="../public/assets/plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="../public/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
<link href="../public/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../public/assets/plugins/notify/css/notifIt.css" rel="stylesheet"/>
<link href="../public/assets/plugins/treeview/treeview.css" rel="stylesheet" type="text/css" />

</head>
	
	<body class="main-body bg-primary-transparent">
		

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

?>
	<div id="global-loader">
			<img src="../public/assets/img/loader.svg" class="loader-img" alt="Loader">
	</div>
	<?php include('layouts/main-header2.php') ?>


	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
			
							<h6 class="content-title mb-0 mr-3 tx-22 my-auto">صفحة المنتوجات</h6>
						

					
								<div class="row row-md mg-b-20" style="position: absolute;left: 14px;top: 100px;">
									<div class="col-md-12 input-group-prepend">
										<select class="form-control select2-no-search tx-22"  name="genre" id="genre">
										
										<option hidden>
   <?php if(isset($famille)){echo $famille;echo "<option >الكل</option>";}if(!$famille){ echo "الكل";}?>
    </option>
											
	<?php   $resultsearch=mysqli_query($con,"SELECT * FROM categories WHERE categorie='produit famille' ORDER BY valeur  ");
             while($rows =$resultsearch ->fetch_assoc()): 
             ;?>
    <option > <?php echo $rows['valeur']; ?> </option>
    <?php endwhile; ?>
										</select>
										
									<button  onclick="genre();"
									 
									class=" btn btn-secondary-gradient btn-sm mt-0 shadow-none">
										<i class="fa fa-search " ></i></button>
									</div>
									</div>
				
				     </div>

					</div>
				</div>
					
	<div class=" container-fluid">
		
		<!-- row -->
		<div class="row row-sm" style=" z-index: -1;">
				
				<div class="col-md-12">
			
					<div class="row row-sm" >
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
						<div class="col-md-6 col-lg-4 col-xl-3  col-sm-6">

							<div class="card ">
								<div class="card-body">
									<div class="pro-img-box">
										<div class="d-flex product-sale">
										</div>
										<img style="direction: ltr;"  class="w-100" src="../public/assets/img/images/<?php echo $row['photo']; ?>" alt="test">
										<a  href="#panier" class="modal-effect adtocart  " data-effect="effect-scale" data-toggle="modal">
										 <i class="las la-shopping-cart "></i>
										</a>
										
									</div>
									<div class="d-flex  mt-2">
									

											<a class="modal-effect btn btn-sm text-white btn-rounded  bg-pink " data-effect="effect-rotate-bottom"
											
											 data-toggle="modal" href="#modaldemo8"  type="submit" style="font-size: 13px;">المواصفات</a>
								
										</div>
									<div class="text-center pt-3">
										
										<h3  class="h6 mb-2 mt-4 font-weight-bold text-uppercase ">test</h3>
										
										<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger tx-20">99 
											<span class="text-secondary font-weight-normal tx-13  ml-1 prev-price"> 120  </span>
											<span class="text-secondary font-weight-normal tx-14 ml-1 ">Mad</span>
										</h4>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile ?>
					</div>
					

						<ul class="pagination product-pagination mr-auto" style="justify-content: center;">
						
						</ul>
					</div>
				</div>
			
			<!-- row closed -->

		</div>
		 <!-- Container closed -->
	<div class="container-fluid">
	<div class="card">
						<div class="card-body"><br>
	<div class="row row-sm ">
				<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
					<div class="card ">
						<div class="card-body ">
							<div class="feature2">
								<i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
							</div>
							<h5 class="mb-2 tx-16">التوصيل بالمجان</h5>
							<span class="fs-14 text-muted">
							 يتم توصيل جميع المنتوجات بالمجان الى عنوان الزبون	بعد التأكد من صحة المعلومات عند الطلب		
											</span>
						</div>
						<br><br>
					</div>
				</div>
				<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
					<div class="card">
						<div class="card-body  h-100">
							<div class="feature2">
							<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
							</div>
							<h5 class="mb-2 tx-16">الدفع عند الاستلام</h5>
							<span class="fs-14 text-muted">
							 جميع المقتنيات في المتجر هنا يتم الدفع عند استلام الطلبية</span>
						</div>
						<br><br>
					</div>
				</div>
				<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
					<div class="card">
						<div class="card-body  h-100">
							<div class="feature2">
							<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
							</div>
							<div class="icon-return"></div>
							<h5 class="mb-2  tx-16">خدمة الزبناء</h5>
							<span class="fs-14 text-muted">
							نحن عند خدمه الزبناء للاستفسار او طلب المعلومات	 يرجى مراسلتنا عبر :
						</span>
						<section class="">


  <!-- Google -->
  <a
	class="btn text-white btn-floating m-1"
	style="background-color: #dd4b39;border-radius: 25%;"
	href="mailto: bouyoushopping@gmail.com"
	target="_blank" rel="noopener noreferrer"
	role="button"
	><i class="fab fa-google"></i
  ></a>

  <!-- whatsapp -->
  <a
	class="btn text-white btn-floating m-1"
	style="background-color: green;border-radius: 25%;"
	href="https://wa.me/212656562036/?text=Hi Bouyoushop, Whatsup"
	target="_blank" rel="noopener noreferrer"
	role="button"
	><i class="fab fa-whatsapp"></i
  ></a>

</section>
						</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	</div>

	<!-- main-content closed -->
		<!-- Modal effects -->
		
		<!-- Container closed -->
			</div>
				
			</div>
		</div>
	</div>

	            <?php include('layouts/sidebar2.php') ?>
				<?php include('layouts/models.php') ?>
				<?php include('layouts/footer.php') ?>

	</body>
	<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="../public/assets/plugins/jquery/jquery.min.j"></script>
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
<!--Internal Sparkline js -->
<script src="../public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Scroll bar Js-->
<script src="../public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- right-sidebar js -->
<script src="../public/assets/plugins/sidebar/sidebar-rtl.js"></script>
<script src="../public/assets/plugins/sidebar/sidebar-custom.js"></script>
<!-- Eva-icons js -->
<script src="../public/assets/js/eva-icons.min.js"></script>
<!-- Sticky js -->
<script src="../public/assets/js/sticky.js"></script>
<!-- custom js -->
<script src="../public/assets/js/custom.js"></script><!-- Left-menu js-->
<script src="../public/assets/plugins/side-menu/sidemenu.js"></script>
	<!--Internal  Datepicker js -->
<script src="../public/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
<!--Internal  jquery.maskedinput js -->
<script src="../public/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="../public/assets/plugins/spectrum-colorpicker/spectrum.js"></script>
<!-- Internal Select2.min js -->
<script src="../public/assets/plugins/select2/js/select2.min.js"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="../public/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="../public/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<!-- Ionicons js -->
<script src="../public/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<!--Internal  pickerjs js -->
<script src="../public/assets/plugins/pickerjs/picker.min.js"></script>
<!-- Internal form-elements js -->
<script src="../public/assets/js/form-elements.js"></script>

<!-- Internal Select2 js-->
<script src="../public/assets/plugins/select2/js/select2.min.js"></script>
<!-- Internal Modal js-->
<script src="../public/assets/js/modal.js"></script>
<!--Internal  Notify js -->
<script src="../public/assets/plugins/notify/js/notifIt.js"></script>
<script>
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
</html>