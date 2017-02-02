@extends('home')

@section('pageTitle', 'Driver Information')

@section('content')
	<div class="row">
		<div class="modal fade modal-ext" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <h3><i class="fa fa-cab"></i> Assigned Shift on a Selected Vehicle</h3>
		            </div>
		            <div class="modal-body">
					    <div class="md-form form-group">
							<select id="selectcmodel" class="mdb-select colorful-select dropdown-dark">
							    <option value="" disabled selected>Select a shift</option>
							    <option value="1">Monday 1st half</option>
							    <option value="2">Monday 2nd half</option>
							    <option value="3">Monday Late Night</option>
							</select>
							<label>Assign Shift</label>
					    </div>
		            </div>		            
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="driver" action="" method="post">
			<div id="Add" class="collapse" style="border:0px; background-color:white;width:100%; ">	
				<div  class="card"  style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;D&nbsp;R&nbsp;I&nbsp;V&nbsp;E&nbsp;R</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
								<div class="col-sm-6">
									<h4 style="color:black;"><b> Driver Type </b></h4>
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
											<select id="selectdtype" class="mdb-select colorful-select dropdown-dark">
											    <option value="" disabled selected>Select a Driver Type</option>
											    <option value="assSV">Regular Driver</option>
											    <option value="assSVH">Irregular Driver</option>
											</select>
											<!-- <label>Boundary</label> -->
									    </div>
									</div>
								</div>
							</div>
							<hr class="my2"/ >
							<div class="row">
								<div class="col-sm-12" style="color:black">
									<h3 style="color:black;">Personal Information</h3>
									<div class="col-sm-6">
										<div class="col-sm-12">
										    <div class="md-form form-group">
										        <i class="fa fa-user prefix"></i>
										        <input type="text" id="form91" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">First Name</label>
										    </div>											
										</div>
										<div class="col-sm-12">
										    <div class="md-form form-group">
										        <i class="fa fa-user prefix"></i>
										        <input type="text" id="form91" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">Middle Name</label>
										    </div>											
										</div>
										<div class="col-sm-12">
										    <div class="md-form form-group">
										        <i class="fa fa-user prefix"></i>
										        <input type="text" id="form91" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">Last Name</label>
										    </div>	
										</div>											
									</div>
									<div class="col-sm-6" style="color:black">
									    <div class="col-sm-12">
										    <div class="md-form form-group">
										        <i class="fa fa-home prefix"></i>
										        <input type="text" id="address" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">Address</label>
										    </div>
										</div>
									    <div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-birthday-cake prefix"></i>
										        <input type="date" id="birthday" class="form-control datepicker validate">
										        <label for="form91" data-error="Error" data-success="Valid">Birthday</label>
										    </div>
										</div>
										<div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-clock-o prefix"></i>
										        <input type="number" id="agee" class="form-control validate" disabled>
										        <label for="form91" data-error="Error" data-success="Valid">Age</label>
										    </div>
										</div>											
									</div>
								</div>
							</div>
							<hr class="my2"/ >
							<div class="row">
								<div class="col-sm-6">
									<h3 style="color:black;">Contact Information</h3>
									<div class="col-sm-12">
									    <div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-drivers-license-o prefix"></i>
										        <input type="text" id="address" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">License No.</label>
										    </div>
										</div>
									</div>
									<div class="col-sm-12">
									    <div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-vcard-o prefix"></i>
										        <input type="number" id="address" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">Contact No.</label>
										    </div>
										</div>
									</div>
									<div class="col-sm-12">
									    <div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-vcard-o prefix"></i>
										        <input type="email" id="address" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">Email Address</label>
										    </div>
										</div>
									</div>
									<div class="col-sm-12">
									    <div class="col-sm-12" style="color:black">
										    <div class="md-form form-group">
										        <i class="fa fa-vcard-o prefix"></i>
										        <input type="email" id="address" class="form-control validate">
										        <label for="form91" data-error="Error" data-success="Valid">SSS No.</label>
										    </div>
										</div>
									</div>
									<h4 style="color:black;"> Assigned Boundary </h4>
									<hr class="my2"/ >
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
											<select id="selectcmodel" class="mdb-select colorful-select dropdown-dark">
											    <option value="" disabled selected>Select a Boundary</option>
											    <option value="1">Boundary1</option>
											    <option value="2">Boundary2</option>
											    <option value="3">Boundary3</option>
											</select>
											<label>Boundary</label>
									    </div>
									</div>
								</div>
								<div id="assSV" class="col-sm-6">
									<h3 style="color:black;">Assigned Shift and Vehicle</h3>
								    <div class="col-sm-10" style="color:black">
									    <div class="md-form form-group">
											<select id="selectcmodel" class="mdb-select colorful-select dropdown-dark">
											    <option value="" disabled selected>Select a car model</option>
											    <option value="1">Toyota Corolla (AA-1111)</option>
											    <option value="2">Nissan Skyline (AA-2222)</option>
											    <option value="3">Mitsubishi Lancer (AA-3333)</option>
											</select>
											<label>Car Model</label>
									    </div>
									</div>
									<div class="col-sm-2">
										<a data-toggle="modal" data-target="#modal-login" id="btnModalAddASV" class="btn btn-danger btn-sm pull-right" style="border:0px; ">
											<span data-toggle="tooltip" title="Add" data-placement="bottom" >
												<i class="fa fa-plus" style="color:white"></i>
											</span>
										</a>										
									</div>
									<div class="col-sm-12" style="color:black;">
					                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
											<thead>
						                        <tr>
													<th>Car Model</th>
													<th>Plate Number</th>
													<th>Shift Hours</th>
													<th>Shift Day</th>
													<th></th>
						                        </tr>
						                    </thead>
											<tbody>
						                        <tr>
													<td>Tiger Nixon</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
													<td>61</td>
													<td>
														<a id="add" class="btn btn-danger btn-sm pull-right" style="border:0px; color:white ">
															<span data-toggle="tooltip" title="Remove" data-placement="bottom" >
																<i class="fa fa-remove"></i>
															</span>
														</a>
													</td>
						                        </tr>
						                        <tr>
													<td>Garrett Winters</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>63</td>
													<td>
														<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-sm pull-right" href="#RemoveASV" style="border:0px; color:white ">
															<span data-toggle="tooltip" title="Close" data-placement="bottom" >
																<i class="fa fa-remove"></i>
															</span>
														</a>
													</td>
						                        </tr>
						                        <tr>
													<td>Tiger Nixon</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
													<td>61</td>
													<td>
														<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-sm pull-right" href="#RemoveASV" style="border:0px; color:white ">
															<span data-toggle="tooltip" title="Close" data-placement="bottom" >
																<i class="fa fa-remove"></i>
															</span>
														</a>
													</td>
						                        </tr>
						                        <tr>
													<td>Garrett Winters</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>63</td>
													<td>
														<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-sm pull-right" href="#RemoveASV" style="border:0px; color:white ">
															<span data-toggle="tooltip" title="Close" data-placement="bottom" >
																<i class="fa fa-remove"></i>
															</span>
														</a>
													</td>
						                        </tr>
					                    	</tbody>
					                    </table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer md-form form-group">
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
					        <button type="submit" class="btn btn-danger" style="background-color:black">Save</button>
					        <button type="button" class="btn btn-danger" data-toggle="collapse" href="#Add" >Cancel</button>							
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="card" style="width:100%;border:0px; color:black">
						<div class="card-header" style="background-color:black;">
							<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:black ">
								<span data-toggle="tooltip" title="Add" data-placement="bottom" >
									<i class="fa fa-plus" style="color:white"></i>
								</span>
							</a>
							<center>
								<h1 style="color:white">D&nbsp;R&nbsp;I&nbsp;V&nbsp;E&nbsp;R&nbsp;S&nbsp;</h1>
							</center>
							<div class="clearfix"></div>
						</div>
						<div class="card-block" style="color:black;">
							<div class="dataTables_wrapper">
			                    <table id="cdrivertable" class="table table-bordered table-hover">
									<thead>
				                        <tr>
											<th>ID</th>
											<th>Full Name</th>
											<th>Age</th>
											<th>Contact No.</th>
											<th>License No.</th>
											<th>SSS No.</th>
											<th>Boundary</th>
											<th></th>
				                        </tr>
				                    </thead>
									<tbody>
				                        <tr>
											<td>DRIVER2017000000</td>
											<td>Tiger Nixon</td>
											<td>51</td>
											<td>1237821973</td>
											<td>6112312</td>
											<td>91273981273</td>
											<td>$320,800</td>
											<td>
												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-remove" style="color:white"></i>
													</span>
												</a>

												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-pencil" style="color:white"></i>
													</span>
												</a>
											</td>
				                        </tr>
				                        <tr>
											<td>DRIVER2017000001</td>
											<td>Garrett Winters</td>
											<td>51</td>
											<td>1237821973</td>
											<td>6112312</td>
											<td>91273981273</td>
											<td>$170,750</td>
											<td>
												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-remove" style="color:white"></i>
													</span>
												</a>

												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-pencil" style="color:white"></i>
													</span>
												</a>
											</td>
				                        </tr>
				                        <tr>
											<td>DRIVER2017000002</td>
											<td>Tiger Nixon</td>
											<td>51</td>
											<td>1237821973</td>
											<td>6112312</td>
											<td>91273981273</td>
											<td>$320,800</td>
											<td>
												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-remove" style="color:white"></i>
													</span>
												</a>

												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-pencil" style="color:white"></i>
													</span>
												</a>
											</td>
				                        </tr>
				                        <tr>
											<td>DRIVER2017000003</td>
											<td>Garrett Winters</td>
											<td>Accountant</td>
											<td>Tokyo</td>
											<td>63</td>
											<td>2011/07/25</td>
											<td>$170,750</td>
											<td>
												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-remove" style="color:white"></i>
													</span>
												</a>

												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
													<span data-toggle="tooltip" title="Add" data-placement="bottom" >
														<i class="fa fa-pencil" style="color:white"></i>
													</span>
												</a>
											</td>
				                        </tr>
			                    	</tbody>
			                    </table>
			                </div>
						</div>
					</div>						
				</div>
			</div>
		</div>	
	</div>


    <script>
	    $(document).ready(function() {
	    	$('#assSV').hide();
		    $('#selectdtype').change(function () {
		        $('#assSV').hide();
		        console.log("entered");
		        $('#'+$(this).val()).show();
		    })
	        $('#birthday').daterangepicker({
		        	singleDatePicker: true,
		        	calender_style: "picker_4"
		        }, 
		        function(start, end, label) {
		        	console.log(start.toISOString(), end.toISOString(), label);
	        });
	        $('#myModal').on('shown.bs.modal', function () {
	  			$('#form2').focus()
			})
	    });
    </script>
@stop