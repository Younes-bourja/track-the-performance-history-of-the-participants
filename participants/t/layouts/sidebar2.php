<!-- Sidebar-right-->
<div class="sidebar sidebar-left sidebar-animate" id="tatata">
			<div class="panel panel-primary card mb-0 box-shadow">
				<div class="tab-menu-heading border-0 p-3">
					<div class="card-title mb-0">قائمة السلة</div>
                   
					<div class="card-options mr-auto">
						<a href="#" id="sidebar-remove" class="sidebar-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
                
				<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
					<div class="tab-content">
                        <?php $tt=0 ;?>
						@foreach($p as $panier)

       
						<div class="tab-pane active " id="side1">
                        <form action="produit/destroy" method="post">
						{{method_field('DELETE')}}						
						{{csrf_field()}}
                        <textarea name="id" hidden>{{$panier->id}}</textarea>
						<button  type="submit" class="btn btn-sm border-0 btn-outline-danger " style="position:absolute;right: 5px;">
						<i class="las la-trash"></i>
                        </button>
                        </form>
                        <a  href="#panier-qtt"  data-effect="effect-scale" data-toggle="modal" data-id="{{$panier->id}}"
						data-produit_ref="{{$panier->reference}}"	data-produit_names="{{$panier->produit}}"
						data-image="{{$panier->image}}" data-qtt="{{$panier->quantite}}" 
                        class="modal-effect btn btn-sm border-0 btn-outline-success"
                            style="position:absolute;left: 5px;">
														<i class="las la-pen"></i>
													</a>
							<div class="list d-flex align-items-center border-bottom p-3">
								<div class="">
									<span class="avatar bg-primary brround avatar-md ">
									<img style="direction: ltr;"    src="{{URL::asset('assets/img/images/')}}/{{$panier->image}}" alt="image">

									</span>
								</div>
								<a class="wrapper w-100 mr-3" href="#" >
									<p class="mb-0 d-flex ">
										<b>test</b>
									</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center">
										 <small class="text-muted ml-auto"> الثمن:40.00</small>
											<small class="text-muted ml-auto mr-2">الكمية :3</small>

											<p class="mb-0"></p>

										</div>
									</div>	
							<small class="text-muted ml-auto " >الثمن الاجمالي:</small>
						
                            <small class="text-muted ml-auto " >120.00 Mad
							
							</small>
                            <?php  $tt=$tt+$panier->prix*$panier->quantite;?>
                          
								</a>
                                
							</div>
							
						</div>
						@endforeach
						<?php if($tt!=0):?>
						<p class="mb-2"></p>

                        <h5 align="center"> المبلغ الاجمالي : <?php echo $tt; ?>
						@if(Session::has('coin'))  {{Session::get('coin')}}@endif					
						</h5>
						<hr>
						<p class="mb-2"></p>
						<center>
                        <a   onclick="p()" class="btn btn-indigo btn-rounded w-75 shadow-none" href="#cmd"
						data-toggle="modal"   class="modal-effect " data-effect="effect-scale">
                           اطلب الان
                        </a></center>
						<br><br><br>
						<?php else:?>
							<center>
								<br>
							<span class="text-muted mt-5 tx-15  ">
							السلة فارغة		
						    </span></center>
                         
						<?php endif?>

							</div>
						</div>
					</div>
				</div>

			<!--/Sidebar-right-->
<div class="modal fade" id="cmd">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-lg center">
			<div class="modal-header ">
			<h6 class="card-title  tx-22">تعبئة الاستمارة</h6>
			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
			<div class="body">
			<p class="mb-2"></p>

							<div class="card-body pt-0">
							<form action="produit/show" method="get">
					{{csrf_field()}}
									<div class="form-group">
									<label class="form-label">الاسم الكامل : <span class="tx-danger">*</span></label>
										<input type="text" class="form-control" name="name" placeholder="الاسم الكامل" required>
									</div>
                                    <div class="form-group">
									<label class="form-label"> الهاتف : <span class="tx-danger">*</span></label>
										<input type="number" class="form-control" name="phone" placeholder="رقم الهاتف" required>
									</div>
                                    <div class="form-group">
									<label class="form-label"> المدينة : <span class="tx-danger">*</span></label>
										<input type="text" class="form-control" name="ville" placeholder="المدينة" required>
									</div>
                                    <div class="form-group">
									<label class="form-label"> العنوان : <span class="tx-danger">*</span></label>
										<textarea class="form-control" rows="4" name="adresse" placeholder="العنوان" required>
                                        </textarea>
										<p class="mb-2"></p>

									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
										<button class="btn btn-success-gradient btn-block  rounded-10">ارسال الطلب</button>
									</div>
									</div>
								</form>
							
						</div>

	
			</div>
			</div></div></div>
</div>
<script>

	function p(){
	    document.getElementById("sidebar-remove").click();
           }
</script>