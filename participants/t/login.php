<?php session_start();


if(isset($_POST['login'])){

	$email=$_POST["email"];
	$password=$_POST["password"];
if($email=='admin@admin' && $password=='admin'){
	$_SESSION['log']="login";
	header( "location:gestion.php" );
}	
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> تسجيل الدخول </title>
<link rel="icon" href="../public/assets/img/brand/favicon.png" type="image/x-icon"/>
<link href="../public/assets/css/icons.css" rel="stylesheet">
<link href="../public/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
<link href="../public/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="../public/assets/css-rtl/sidemenu.css">
<link href="../public/assets/css-rtl/style.css" rel="stylesheet">
<link href="../public/assets/css-rtl/style-dark.css" rel="stylesheet">
<link href="../public/assets/css-rtl/skin-modes.css" rel="stylesheet">
<link href="../public/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">
</head>

	<body class="main-body app sidebar-mini">
		<div class="">
			<!-- container -->
			<div class="">
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="#">
											<img src="../public/assets/img/brand/favicon.png" class="sign-favicon ht-120" alt="logo">
										</a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Bouyou<span>Sho</span>p</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبا بك</h2>
												<h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>
                                                <form method="POST" action="">
                                                
													<div class="form-group">
													<label>البريد الالكتروني</label>
                                                    <input id="email" type="email" class="form-control " name="email"  required autocomplete="email" autofocus>
                                                 
													</div>

												 <div class="form-group">
											 	 <label>كلمة المرور</label> 
                                                
                                                  <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

                                              
                                                  <div class="form-group row">
                                                      <div class="col-md-6 offset-md-4">
                                                           <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                      تذكرني
                                                                </label>
                                                           </div>
                                                       </div>
                                                   </div>
												  </div>
                                                    <button type="submit" name="login" class="btn btn-main-primary btn-block">
                                                  تسجيل الدخول
                                                    </button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->

                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="../public/assets/img/media/login.png" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>

			</div>
		</div>
		</body>
		<script src="../public/assets/js/custom.js"></script>
</html>