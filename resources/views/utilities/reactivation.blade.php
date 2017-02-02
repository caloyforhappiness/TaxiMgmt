@extends('home')

@section('pageTitle', 'Company Information')

@section('content')


	<div class="row">
		@if (Session::has('message'))
			<script>
				swal({   
					title: "{{ Session::get('title') }}",   
					text: "{{ Session::get('message') }}",   
					type: "{{ Session::get('type') }}",
					timer: 5000,
					confirmButtonText: "Okay" 
				});
			</script>
		@endif
		{!! csrf_field() !!}
		
		<!-- CARBRAND -->
			<div id="carb" class="collapse" style="border:0px; background-color:white;width:100%; ">	
				<div class="card" style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="close" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#carb" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>C&nbsp;A&nbsp;R&nbsp; &nbsp;B&nbsp;R&nbsp;A&nbsp;N&nbsp;D</center></h1>
					</div>
					<div class="card-block" style="color:black;">
						
							  <div class="dataTables_wrapper">
		                    <table id="cbrandtableact" class="table table-bordered table-hover" style="color: black">
								<thead>
			                        <tr>
										<th>ID</th>
										<th>Brand Name</th>
										<th>Description</th>
										<th></th>
			                        </tr>
			                    </thead>
								<tbody>
									@foreach($carbrands as $cb)
										@if($cb->status == 0)
					                        <tr>
												<td>{{$cb->strCarBrandId}}</td>
												<td>{{$cb->strCarBrandName}}</td>
												<td>{{$cb->strCarBrandDesc}}</td>
												<td>
													<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black " data-toggle="modal"   data-target="#activate{{ $cb->strCarBrandId  }}">
														<span title="Add" data-placement="bottom" >
															<i class="fa fa-remove" style="color:white"></i>
														</span>
													</a>

												</td>
					                        </tr>
					                         <div id="activate{{ $cb->strCarBrandId }}" class="modal fade" role="dialog">
											    <div class="modal-dialog ">
											    	<div class="modal-content"> 
											    		<div class="modal-header" style="background-color:#cc0000">
												    		<h4 class="modal-title" style="color:white;"><center>ACTIVATE CAR BRAND</center></h4>
												    	</div>
												    	<form id="activate" action="/carbrandAct" method="post">
												    	{!! csrf_field() !!}
												      		<div class="modal-body" style="background-color:white; color:black">
												        		<div class="form-group">
																    <input value="{{$cb->strCarBrandId}}" id="carbrandIdAct" name="carbrandIdAct" type="text" hidden>
																	<h4 style="margin-left:20px">Are you sure you want to activate <b>{{ $cb->strCarBrandName }}</b> ?</h4>
																    
																</div>
												      		</div>
												      		<div class="modal-footer">
														        <button type="submit" class="btn btn-danger" style="background-color:black">Yes</button>
														        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
														    </div>
									      				</form>
											    	</div>
											  	</div>
											</div>s
					                    @endif
					                @endforeach
			                    	</tbody>
			                    </table>
		                    </div>
								
						</div>
					</div>
					
				</div>

				<!-- CAR BRAND -->

				<!-- Taxi Model -->
				<div id="taxim" class="collapse" style="border:0px; background-color:white;width:100%; ">	
				<div class="card" style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="tclose" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#taxim" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>T&nbsp;A&nbsp;X&nbsp;I&nbsp; &nbsp;M&nbsp;O&nbsp;D&nbsp;E&nbsp;L</center></h1>
					</div>
					<div class="card-block" style="color:black;">
						
							  <div class="dataTables_wrapper">
		                    <table id="taximodeltableact" class="table table-bordered table-hover" style="color: black">
								<thead>
			                        <tr>
											<th>ID</th>
											<th>Brand Name</th>
											<th>Model Name</th>
											<th>Plate Number</th>
											<th>Description</th>
											<th></th>
				                        </tr>
				                    </thead>
									<tbody>
									@foreach($models as $mod)
									@if($mod->status == 0)
				                        <tr>
					                        <td>{{$mod->strTaxiOwnedId}}</td>
					                        <td>{{$mod->strCarBrandName}} </td>
											<td>{{$mod->strTaxiOwnedMName}}</td>
											<td>{{$mod->strTaxiOwnedPNum}}</td>
											<td>{{$mod->strTaxiOwnedDesc}}</td>
				
											<td>
													<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black " data-toggle="modal"   data-target="#activate{{ $mod->strTaxiOwnedId  }}">
														<span title="Add" data-placement="bottom" >
															<i class="fa fa-remove" style="color:white"></i>
														</span>
													</a>

												</td>
					                        </tr>
					                         <div id="activate{{ $mod->strTaxiOwnedId }}" class="modal fade" role="dialog">
											    <div class="modal-dialog ">
											    	<div class="modal-content"> 
											    		<div class="modal-header" style="background-color:#cc0000">
												    		<h4 class="modal-title" style="color:white;"><center>ACTIVATE TAXI MODEL</center></h4>
												    	</div>
												    	<form id="activate" action="/taximodelAct" method="post">
												    	{!! csrf_field() !!}
												      		<div class="modal-body" style="background-color:white; color:black">
												        		<div class="form-group">
																    <input value="{{$mod->strTaxiOwnedId}}" id="taximodelIdAct" name="taximodelIdAct" type="text" hidden>
																	<h4 style="margin-left:20px">Are you sure you want to activate <b>{{ $mod->strTaxiOwnedMName }}</b> ?</h4>
																    
																</div>
												      		</div>
												      		<div class="modal-footer">
														        <button type="submit" class="btn btn-danger" style="background-color:black">Yes</button>
														        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
														    </div>
									      				</form>
											    	</div>
											  	</div>
											</div>s
					                    @endif
					                @endforeach
			                    	</tbody>
			                    </table>
		                    </div>
								
						</div>
					</div>
					
				</div>

				<!-- Taxi Model -->

		
		<div class="container">
			<div class="row">
				
					<div class="col-sm-12">
						<div class="card" style="width:100%;border:0px; color:black">
							<div class="card-header" style="background-color:black;">
								<!-- <a id="edit"  class="btn btn-danger btn-lg pull-right" style="border:0px; background-color:black ">
									<span data-toggle="tooltip" title="Edit" data-placement="bottom" >
										<i class="fa fa-pencil-square-o" style="color:white;font-size:20pt;" id="edit"></i>
									</span>
								</a> -->
								<center>
									<h1 style="color:white;font-size: 30pt;">R&nbsp;E&nbsp;A&nbsp;C&nbsp;T&nbsp;I&nbsp;V&nbsp;A&nbsp;T&nbsp;I&nbsp;O&nbsp;N</h1>
								</center>
								<div class="clearfix"></div>
							</div>
							<div class="card-block" style="color:black;">
								<div class="container">
									<div class="row">
										<br>
										<div class="col-sm-12" style="color:black;padding-top:4%;padding-bottom: 4%;">
										
										<div class="col-sm-6">
										<button type="button" class="btn btn-primary" style="width: 88%; height: 80px; font-size: 23pt " data-toggle="collapse" id="carb" data-parent="#accordion" href="#carb">
								        <i class="fa fa-car prefix"></i>   Car Brand <span class="tag red">{{$cn}}</span></button><br><br>

										<button type="button" class="btn btn-primary" style="width: 88%; height: 80px; font-size: 23pt " data-toggle="collapse" id="carb" data-parent="#accordion" href="#taxim"><i class="fa fa-taxi prefix"></i>   Taxi Model <span class="tag red">{{$taxicn}}</span></button><br><br>

										<button type="button" class="btn btn-primary" style="width: 88%; height: 80px; font-size: 23pt "><i class="fa fa-archive prefix"></i>   Shift Template <span class="tag red">0</span></button><br><br>
										</div>

										<div class="col-sm-6">
										<button type="button" class="btn btn-primary" style="width: 70%; height: 80px; font-size: 23pt "><i class="fa fa-book prefix"></i>   Boundary <span class="tag red">2</span></button><br><br>

										<button type="button" class="btn btn-primary" style="width: 100%; height: 80px; font-size: 20pt "><i class="fa fa-user prefix"></i>   Driver's Information <span class="tag red">2</span></button><br><br>

										<button type="button" class="btn btn-primary" style="width: 85%; height: 80px; font-size: 23pt "><i class="fa fa-wrench prefix"></i>   Fees & Charges <span class="tag red">1</span></button><br><br>
										</div>
											
										</div>


									</div>
								</div>
							</div>
						</div>
				</div>						
				
			
			</div>
		</div>	
	</div>
	


    <script>
	    $(document).ready(function() {
	      


	    });


    </script>
@stop