<?php 
if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	  header( "location:gestion.php" );
  
  }

if(isset($_POST['re'])){
    $id=$_POST["re-id"];
	$date=date("Y-m-d");
	mysqli_query($con," UPDATE clients SET date2='$date'    WHERE id='$id';");
	mysqli_query($con," UPDATE clients SET status='active'  WHERE id='$id';");
}?>
<!-- main-header opened -->

<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						
					<a class="d-flex p-3 border-bottom  mr-5"
					data-toggle="modal" data-target="#myModal" href="#">
											<div class="notifyimg bg-success">
											<i class="la la-plus text-white"></i>
											
											</div>
											<div class="mr-2">
												<h5 class="notification-label tx-16 mt-2">منخرط جديد</h5>
											</div>
											
										</a>
										<a class="d-flex p-3 border-bottom mr-5"
										data-toggle="modal" data-target="#myModal2" href="#">
											<div class="notifyimg bg-danger-gradient">
											<i class="la la-envelope-open text-white"></i>
											<span style="position: fixed;"
											  class="badge badge-danger badge-sm mt-4 rounded-10">	
											  <?php 
 
 $resultsearch=mysqli_query($con,"SELECT count(*) FROM clients WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN -10 AND 0 ORDER BY id DESC  ");
$rows =$resultsearch ->fetch_assoc(); echo $rows['count(*)'];  ?> 
							                	</span>
											</div>
											<div class="mr-2">
												<h5 class="notification-label tx-16 mt-2"> الواجب الشهري </h5>
											</div>
											
										</a>
										<a class="d-flex p-3 border-bottom mr-5"
										data-toggle="modal" data-target="#myModal3" href="#">
											<div class="notifyimg bg-warning-gradient">
												<i class="la la-envelope-open text-white"></i>
												<span style="position: fixed;"
											  class="badge badge-danger badge-sm rounded-10 mt-4">	
											  <?php 
										$resultsearch=mysqli_query($con,"SELECT count(*) FROM clients WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN 1 AND 5 ORDER BY id ASC  ");
                                         $rows =$resultsearch ->fetch_assoc(); echo $rows['count(*)'];?>	
											</span>
											</div>
											<div class="mr-2">
												<h5 class="notification-label tx-16 mt-2">تنبيه وقت الاداء</h5>
											</div>
											
										</a>		
										<a class="d-flex p-3 border-bottom mr-5"
										data-toggle="modal" data-target="#myModal05" href="#">
											<div class="notifyimg bg-danger">
											<i class="la la-user-slash text-white"></i>
											</div>
											<div class="mr-2">
												<h5 class="notification-label tx-16 mt-2">  المنقطعون</h5>
											</div>
											
										</a>



										<a class="d-flex p-3 border-bottom " href="?"
										style="position:absolute;right: 10px;" >
											<div class="notifyimg bg-info">
												<i class="la la-user-check text-white"></i>
								
											</div>
											<div class="mr-3">
												<h5 class="notification-label tx-18 mt-2">الرئيسية  </h5>
											</div>
										</a>
					</div>
					<div class="main-header-right">
					<div class="nav-item ">
								<a href="#" class="btn d-flex p-3 border-bottom " 
								data-toggle="modal" data-target="#myModalday">
								<span class="badge bg-primary-transparent text-primary mr-auto ">
								add-day
										</span>
							    </a>
							</div>
						<div class="nav nav-item  navbar-nav-right ml-auto">
					
					
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>							
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><div class="main-img-user"><img alt=""  src="../public/assets/img/faces/user.png" class=""></div></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt=""  src="../public/assets/img/faces/user.png" class=""></div>
											<div class="mr-3 my-auto">
												<h6>الإدارة</h6><span>المسؤول</span>
											</div>
										</div>
									</div>
									
									
                                     <form  action="" method="POST" >
                                     <button class="dropdown-item"  name="logout" type="submit">
									 <i class="bx bx-log-out"></i>تسجيل خروج</button>
                                     </form>								</div>
							</div>
						</div>	
										
					</div>
				</div>
			</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">

    <!-- Modal content-->
    <div class="modal-content modal-lg  bg-secondary-gradient">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
					<div class="row row-sm">
					
					<div class="col-xl-12">
					<form action="" method="post" enctype="multipart/form-data" >
								
				<div class="row">
					<div class=" col-md-11"  style=" margin: auto;">
						<div class="card bg-secondary-gradient">
						<div class=" bg-secondary-gradient">
						<div class="">

										<input type="file" name="image" class="dropify" 
										data-height="460"
										data-widht="400" required/>
									</div>
				
		     		     </div>
		     		</div>
					<div class=""  style=" margin: auto;">
						<div class="">
							<div class="form-inline">
								
                                <div class="form-group mb-3 col-md-6 ">
									<label class="mg-b-10 tx-18 mr-3"> إسم المشترك  <span class="text-danger">*</span></label>
									<input name="name" class="form-control " required>
								</div>
                                <div class="form-group mb-3 col-md-6">
									<label class="mg-b-10 tx-18 mr-3 ">رقم الهاتف  <span class="text-danger">*</span></label>
									<input type="tel" pattern="[0-0]{1}[6-7]{1}[0-9]{3}[0-9]{2}[0-9]{3}" name="phone" class="form-control" required>
								</div>
                         
							</div>
						</div>
					</div>
					
		         </div>
					<div class="col-lg-12 col-md-12">
						<div class="card " >
							<div class=" bg-secondary-gradient">
								
							
								<div>
									<button class="btn btn-teal btn-lg btn-block" type="submit" name="add"  multiple>اضافة مشترك جديد</button>
								</div>
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
		</div>
		 <!--  الواجب الشهري -->
		<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">


    <div class="modal-content modal-lg ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
					
	  <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example4">
										<thead>
											<tr>
                                            <th class="text-center" > الصورة</th>
											<th>إسم المنخرط </th>                                           
                                            <th> تاريخ الأداء</th>
											<th  class="text-center"> المعلومات</th>

                                            <th  class="text-center">Operations</th>
											</tr>
										</thead>
										<tbody>
										<?php 
 
							$resultsearch=mysqli_query($con,"SELECT * FROM clients WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN -10 AND 0 ORDER BY id ASC  ");
             while($rows =$resultsearch ->fetch_assoc()): 
     									 ?> 
											<tr>
											<td class="text-center">
											<img alt="avatar" class="rounded-circle avatar-lg mr-2" src="images/<?php echo $rows['image']; ?>">
											</td>
											<td> <?php echo $rows['client']; ?></td>
											<td><?php echo $rows['date2']; ?></td>
                                            <td class="text-center">

											<a  data-toggle="modal" data-target="#myModal14"
											       data-d-client="<?php echo $rows['client']; ?>" 
													data-d-date="<?php echo $rows['date']; ?>" 
													data-d-image="<?php echo $rows['image']; ?>" 
													data-d-date2="<?php echo $rows['date2']; ?>"   >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
       
                                        </td>
										
											<td class="text-center">
											
													<button  class="btn btn-sm btn-success-gradient"
													data-toggle="modal" data-target="#myModal4"
													data-id="<?php echo $rows['id']; ?>" 
													data-image="<?php echo $rows['image']; ?>" 
													data-client="<?php echo $rows['client']; ?>">
														  <i class="fe fe-check text-white"></i>
											</button>
													
											</td>
                                            
											</tr>
											<?php  endwhile; ?>
										</tbody>
									</table>			
				</div>
				</div>
			</div>
		</div>
		 <!--  الواجب الشهري -->
		 <div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">


    <div class="modal-content modal-lg ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
					
	  <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example4">
										<thead>
											<tr>
                                            <th class="text-center" > الصورة</th>
											<th>إسم المنخرط </th>                                           
                                       
                                            <th> تاريخ الأداء</th>
											<th  class="text-center"> المعلومات</th>

                                            <th  class="text-center">Operations</th>
											</tr>
										</thead>
										<tbody>

										<?php 
										$resultsearch=mysqli_query($con,"SELECT * FROM clients WHERE DATEDIFF(date2,CURRENT_DATE) BETWEEN 1 AND 5 ORDER BY id ASC  ");
                                         while($rows =$resultsearch ->fetch_assoc()): 
										 ;?> 
											<tr>
											<td class="text-center">
											<img alt="avatar" class="rounded-circle avatar-lg mr-2" src="images/<?php echo $rows['image']; ?>">
											</td>
											<td> <?php echo $rows['client']; ?></td>
											
											<td><?php echo $rows['date2']; ?></td>
											
											
                                            <td class="text-center">

											<a  data-toggle="modal" data-target="#myModal14"
											       data-d-client="<?php echo $rows['client']; ?>" 
													data-d-date="<?php echo $rows['date']; ?>" 
													data-d-image="<?php echo $rows['image']; ?>" 
													data-d-date2="<?php echo $rows['date2']; ?>"  >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
       
                                        </td>
										
											<td class="text-center">
											
											<button  class="btn btn-sm btn-success-gradient"
													data-toggle="modal" data-target="#myModal4"
													data-id="<?php echo $rows['id']; ?>" 
													data-image="<?php echo $rows['image']; ?>" 
													data-client="<?php echo $rows['client']; ?>" 	 >
														  <i class="fe fe-check text-white"></i>
											</button>
											</td>
                                            
											</tr>
											<?php   endwhile; ?>
										</tbody>
									</table>
		
				</div>
				</div>
			</div>
		</div>
				 <!--   المنقطعون -->
				 <div id="myModal05" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">


    <div class="modal-content modal-lg ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
					
	  <table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example2">
										<thead>
											<tr>
                                            <th class="text-center" > الصورة</th>
											<th>إسم المنخرط </th>                                           
                                            <th> تاريخ الإنقطاع</th>
											<th  class="text-center"> المعلومات</th>

                                            <th  class="text-center">Operations</th>
											</tr>
										</thead>
										<tbody>
										<?php 
 
							$resultsearch=mysqli_query($con,"SELECT * FROM clients WHERE status='inactive' ORDER BY id ASC  ");
             while($rows =$resultsearch ->fetch_assoc()): 
     									 ?> 
											<tr>
											<td class="text-center">
											<img alt="avatar" class="rounded-circle avatar-lg mr-2" src="images/<?php echo $rows['image']; ?>">
											</td>
											<td> <?php echo $rows['client']; ?></td>
											<td><?php echo $rows['date2']; ?></td>
                                            <td class="text-center">

											<a  data-toggle="modal" data-target="#myModal14"
											       data-d-client="<?php echo $rows['client']; ?>" 
													data-d-date="<?php echo $rows['date']; ?>" 
													data-d-image="<?php echo $rows['image']; ?>" 
													data-d-date2="<?php echo ' تاريخ الإنقطاع  : '.' '.$rows['date2'].' '; ?>"   >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
       
                                        </td>
										
											<td class="text-center">
											<form action="" method="post">
												<input type="text" hidden name="re-id" value="<?php echo $rows['id']; ?>">
											<button  name="re" class="btn btn-sm btn-warning-gradient"
													onclick="update(<?php echo $rows['id']; ?>)">
														 إعادة الإشتراك
											</button>
											</form>		
											</td>
                                            
											</tr>
											<?php  endwhile; ?>
										</tbody>
									</table>			
				</div>
				</div>
			</div>
		</div>
<!-- الاداء- -->
		<div id="myModal4" class="modal fade bg-secondary-gradient" role="dialog">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content modal-md center">
		<div class="row">

					<div class="col-md-12 ">
					<form action="" method="post">

						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="true">&times;</span></a>
							<div  id="image"></div>
							
							<div class="card-body">
							 	<div class="card-text">
								 <h4 class="card-title" id="client" name="client"></h4>
								 <textarea id="id" name="id" hidden  ></textarea>							
			
						
								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center">
    <span class="input-group-text" id="basic-addon1">عدد الشهور    : </span>
  </div>
  <input type="number" class="form-control text-center"  min="1" max="12"  name="mois"  value="1">
</div>   	
</div>
								<button class="btn btn-indigo btn-rounded btn-block" name="payment" type="submit">
												تأكيد الاداء للواجب الشهري
												</i>	 </button>
							</div>
						 </div>
					</form>
					</div>
					</div>
			</div>
		</div>
		</div>
<!-- /ADD-DAY -->
<div id="myModalday" class="modal fade bg-secondary-gradient" role="dialog">
		<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content modal-md center">
		<div class="row">

					<div class="col-md-12 ">
					<form action="" method="post">

						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="true">&times;</span></a>
						</div>
				        <div class="card">
						<div class="card-body">
						<div class="mb-3">
                                <label class="form-label required  ">المستفيد :</label>
								<input hidden type="text" class="form-control "    id="myInput1"   name="client"     >
                                <input autocomplete="off" type="text" class="form-control border-1 border-info"   placeholder="الجميع" id="myInput" onkeyup="myFunctionfiltersearch1()"      >
                                <ul id="myUL" style="display:none;width:100%; height: 90px;overflow: auto;" class="list-group">
  <?php $i=0;   $resultsearch=mysqli_query($con,"SELECT * FROM clients ; ");
             while($rows =$resultsearch ->fetch_assoc()): 
                $i=$i+1;  ?>
  <li ><div class="list-group-item list-group-item-action" onclick="ref(<?php echo $i; ?>);" >
    <span    id="<?php echo $i; ?>" > <?php echo $rows['client']; ?></span>  
	<span hidden   id="<?php echo "t".$i; ?>" > <?php echo $rows['id']; ?></span>
	<span style="position: absolute;left: 15px;"><?php echo $rows['date2']; ?> </span></div></li>
<?php endwhile; ?>
</ul>
                            </div>
									

								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center">
    <span class="input-group-text" id="basic-addon1">عدد الأيام المضافة    : </span>
  </div>
  <input type="number" class="form-control text-center"  min="1" max="10"  name="days"  value="1">
</div>   	
</div>
								<button class="btn btn-indigo btn-rounded btn-block" name="day" type="submit">
												تأكيد  
												</i>	 </button>
												</div></div>
							</div>
						 </div>
					</form>
					</div>
					</div>
			</div>
		</div>
		</div>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$('#myModal4').on('show.bs.modal',function(event){
var button=$(event.relatedTarget);
var id=button.data('id');
var image=button.data('image');
var client=button.data('client');
img='<img src="images/'+image+'">';
var modal=$(this)
document.getElementById("id").innerHTML = id;
document.getElementById("client").innerHTML = client;

document.getElementById("image").innerHTML = img;
});
function ref(i){
var client = document.getElementById(i).innerText;
var id = document.getElementById("t"+i).innerText;

var input = document.getElementById("myInput");
document.getElementById("myInput").value = client;
document.getElementById(i).style.color = "blue";
var ref = document.getElementById(i).innerText;

var input = document.getElementById("myInput1");
document.getElementById("myInput1").value = id;
document.getElementById("t"+i).style.color = "blue";
myFunctionfiltersearch1();

}
function myFunctionfiltersearch1() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
if (filter=="") {
        ul.style.display = "none";
    }else{ul.style.display = "block";}
li = ul.getElementsByTagName("li");
for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("span")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
    } else {
        li[i].style.display = "none";
    }
}
}



</script>
