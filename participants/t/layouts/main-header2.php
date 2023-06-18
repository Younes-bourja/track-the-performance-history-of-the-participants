<!-- main-header opened -->
<?php $t=0;?>
								@foreach($p as $panier)
								<?php $t=$t+1; ?>
								@endforeach	
<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">

					<div class="main-header-left ">
					<div id="m" class="main-header-center d-sm-none d-md-none d-lg-block " style="direction: rtl;position: absolute;right: 20px;">
							<input class="form-control" placeholder="البحث عن المنتوجات..." type="search" autocomplete="off" id="myInput" onkeyup="myFunctionfiltersearch()"> 
						</div>
					
						<div class="main-header-center d-sm-none d-md-none d-lg-block "  style="position: absolute;right:-170px;top: 5px;">
						<ul id="myUL" style="display:none; height: 100px;width: 400px;;overflow: auto;position: absolute;right:140px;top: 55px;">
						@foreach($produits as $st)
  <form action="search-produit"><span >
	<textarea name="id"  hidden>{{$st->id}}</textarea>	
  <button  class="list-group-item list-group-item-action" class="btn btn-block text-left" type="submit" >{{$st->produit}}</button>
  </span>
<input type="text" name="page" value="<?php if(isset($_GET['page'])){ echo $_GET['page']; }?>" hidden>
</form>
 
                    @endforeach
                       </ul>

                       </div>
					
									
					
						<div class="responsive-logo">
							<a href="#"><img src="../public/assets/img/brand/logo.png" class="logo-1" alt="logo"></a>
							<a href="#"><img src="../public/assets/img/brand/logo.png" class="dark-logo-1" alt="logo"></a>
							<a href="#"><img src="../public/assets/img/brand/logo.png" class="logo-2" alt="logo"></a>
							<a href="#"><img src="../public/assets/img/brand/logo.png" class="dark-logo-2" alt="logo"></a>
						</div>
						
						
					</div>
					<div class="main-header-right" >
						
						<div class="nav nav-item  navbar-nav-right ml-auto" >
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="البحث ..."  id="myInput1" onkeyup="myFunctionfiltersearch1()">
										<span class="input-group-btn">
											<button id="e" type="reset" class="btn btn-default" >
												<i class="fas fa-times "></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn  ml-3">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather  feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>

									</div>
									</form>
								
								
							</div>
							
							
						
						
							<div class="dropdown main-header-message right-toggle">
								<a id="sidebarpanier" class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
								<i class="fa fa-cart-plus icon-size float-left text-danger text-danger-shadow">
								<small class="text-danger text-danger-shadow rounded-10 "
								style="position: absolute;right:-9px;top:6px;width: 18px;height: 18px;">
								<span class="badge badge-danger badge-sm rounded-10">	
								<?php echo $t; ?></small></span> </i>
							
							</a>
							</div>
						</div>
					</div>
				</div>	<div class="d-sm-block d-md-block d-lg-none w-100"  >
						<ul id="myUL1" style="display:none; height: 150px;overflow: auto;" class=" w-100">
						@foreach($produits as $st)
  <form action="search-produit"><span >
	<textarea name="id"  hidden>{{$st->id}}</textarea>	
	<button  class="list-group-item list-group-item-action" class="btn btn-block text-left" type="submit" >{{$st->produit}}</button>

  </span></form>
 
                    @endforeach
                       </ul>
                       </div>
			</div>
		
<!-- /main-header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#e").click(function(){
	input = document.getElementById("myUL1");
	input.style.display = "none";
});
  });

	function myFunctionfiltersearch() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
if (filter=="") {
		ul.style.display = "none";
	}else{ul.style.display = "block";}
li = ul.getElementsByTagName("span");
for (i = 0; i < li.length; i++) {
	a = li[i].getElementsByTagName("button")[0];
	txtValue = a.textContent || a.innerText;
	if (txtValue.toUpperCase().indexOf(filter) > -1) {
		li[i].style.display = "";
	} else {
		li[i].style.display = "none";
	}
}
}
function myFunctionfiltersearch1() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput1");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL1");
if (filter=="") {
		ul.style.display = "none";
	}else{ul.style.display = "block";}
li = ul.getElementsByTagName("span");
for (i = 0; i < li.length; i++) {
	a = li[i].getElementsByTagName("button")[0];
	txtValue = a.textContent || a.innerText;
	if (txtValue.toUpperCase().indexOf(filter) > -1) {
		li[i].style.display = "";
	} else {
		li[i].style.display = "none";
	}
}
}
</script>