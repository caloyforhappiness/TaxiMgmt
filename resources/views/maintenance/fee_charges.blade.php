@extends('home')

@section('pageTitle', 'Fee & Charges')

@section('content')
	<div class="row">
		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="addshift" action="" method="post">
			<div id="Add" class="collapse" style="border:0px; background-color:white;width:100%; ">	
				<div  class="card"  style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;F&nbsp;E&nbsp;E&nbsp;&&nbsp;C&nbsp;H&nbsp;A&nbsp;R&nbsp;G&nbsp;E&nbsp;S</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-wrench prefix"></i>
							        <input type="text" id="address" class="form-control validate">
							        <label for="form91" data-error="Error" data-success="Valid">Fee/Charge Name</label>
							    </div>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-pencil prefix"></i>
							        <textarea type="text" id="form76" class="md-textarea"></textarea>
					                <label for="form76">Description</label>
							    </div>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-rub archive prefix"></i>
							        <input type="number" id="address" class="form-control validate">
							        <label for="form91" data-error="Error" data-success="Valid">Fee/Charge</label>
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
								<h1 style="color:white">&nbsp;F&nbsp;E&nbsp;E&nbsp;&&nbsp;C&nbsp;H&nbsp;A&nbsp;R&nbsp;G&nbsp;E&nbsp;S</h1>
							</center>
							<div class="clearfix"></div>
						</div>
						<div class="card-block" style="color:black;">
							<div class="dataTables_wrapper">
			                    <table id="cfctable" class="table table-bordered table-hover">
									<thead>
				                        <tr>
											<th>ID</th>
											<th>Boundary Name</th>
											<th>Description</th>
											<th>Boundary</th>
											<th></th>
				                        </tr>
				                    </thead>
									<tbody>
				                        <tr>
											<td>FEECHAR201700001</td>
											<td>Fee Charge for Taxi1</td>
											<td>New Fee</td>
											<td>300</td>
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
											<td>FEECHAR201700001</td>
											<td>Fee Charge for Taxi2</td>
											<td>New Fee</td>
											<td>350</td>
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
											<td>FEECHAR201700001</td>
											<td>Fee Charge for Taxi3</td>
											<td>New Fee</td>
											<td>600</td>
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
@stop