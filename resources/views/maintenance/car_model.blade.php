@extends('home')

@section('pageTitle', 'Car Model')

@section('content')

	<div class="row">
		@if (Session::has('message'))
			<script>
				swal({   
					title: "Success!",   
					text: "{{ Session::get('message') }}",   
					type: "success",
					timer: 5000,
					confirmButtonText: "Okay" 
				});
			</script>
		@endif
		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="cmodel" action="/taximodelAdd" method="post">
			 {!! csrf_field() !!}
			<div id="Add" class="collapse col-sm-12 animated flipInX" style="border:0px; background-color:white;width:100%; ">	
				<div  class="card"  style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;T&nbsp;A&nbsp;X&nbsp; I&nbsp; &nbsp;M&nbsp;O&nbsp;D&nbsp;E&nbsp;L</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
							    <div class="col-sm-12" style="color:black">
								    <input  value="{{$newID}}" id="taxiModelId" name="taxiModelId" type="text" hidden>
								    <br/>
								    <div class="md-form form-group">
										<select id="selectcbrand" name="selectcbrand" onchange="fnChangeModelName();" class="mdb-select colorful-select dropdown-dark">
					            			<option value="" disabled selected>Choose a car brand</option>
											@foreach($carbrands as $cb)
							            		@if($cb->status == '1')
							                		<option value="{{ $cb->strCarBrandId }}">{{ $cb->strCarBrandName }}</option>
							                	@endif
							                @endforeach
										</select>
										<label>Car Brand</label>
								    </div>
								</div>
							    <div class="col-sm-12" style="color:black">
								    <div class="md-form form-group">
								        <i class="fa fa-car prefix"></i>
								        <input type="text" id="modelName" name="modelName" class="form-control">
								        <label for="modelName">Model Name</label>
								    </div>
								</div>
							    <div class="col-sm-12" style="color:black">
								    <div class="md-form form-group">
								        <i class="fa fa-bars prefix"></i>
								        <input type="text" id="plateNumber" onkeyup="fnPlate();" name="plateNumber" class="form-control">
								        <label for="plateNumber">Plate Number</label>
								    </div>
								</div>
							    <div class="col-sm-12" style="color:black">
								    <div class="md-form form-group">
								        <i class="fa fa-pencil prefix"></i>
								        <textarea type="text" id="desc" name="desc" class="md-textarea"></textarea>
						                <label for="desc">Description</label>
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
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#cmodel').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            desc: {
			                validators: {
			                    stringLength: {
			                    	min: 2,
			                    	max: 255,
			                        message: 'The description must be more than 1 and less than 255 characters.'
			                    }
			                }
			            },
			            plateNumber: {
			                message: 'The Plate number is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The Plate number is required and cannot be empty'
			                    },
			                    stringLength: {
			                    	min: 7,
			                        max: 8,
			                        message: 'The Plate number must be 7-8 characters long'
			                    },
			                    regexp: {
			                        regexp: /^[A-Z]{2,3}-[0-9]{3,4}$/,
			                        message: 'The Plate number only consist alphanumeric characters and a dash'
			                    },
								remote: {
									type: 'GET',
			                        url: 'validatePNum',
			                        data: function(validator) {
			                            return {
			                                plateNumber: validator.getFieldElements('plateNumber').val()
			                            };
			                        },
			                        message: 'The Plate number is not available, try a different Plate number'
			                    }
			                }
			            },
			            modelName: {
			                message: 'The Model name is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The Model name is required and cannot be empty'
			                    },
			                    stringLength: {
			                    	min: 2,
			                        max: 35,
			                        message: 'The Model name must be 2-35 characters long'
			                    }
			                }
			            }
			        }
			    });
			});
		</script>

		<!-- Add -->
		<!-- EDIIT -->
		@foreach($models as $mod)

			<!-- Modal Contact -->
			<form id="{{ $mod->strTaxiOwnedId }}" action="/taximodelUp" method="post">
				{!! csrf_field() !!}
				<div class="modal fade animated zoomIn modal-ext" id="edit{{ $mod->strTaxiOwnedId }}" style="border:0px; width:100%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				        <!--Content-->
				        <div class="modal-content">
				            <!--Header-->
				            <div class="modal-header danger-color-dark white-text"">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>								
				                <h1 id="myModalLabel" class="modal-title" style="color:white"><center>E&nbsp;D&nbsp;I&nbsp;T&nbsp; &nbsp;T&nbsp;A&nbsp;X&nbsp; I&nbsp; &nbsp;M&nbsp;O&nbsp;D&nbsp;E&nbsp;L</center></h1>
				            </div>
				            <!--Body-->
				            <div class="modal-body">
								<div class="row">
								    <div class="col-sm-12" style="color:black">
									    <input value="{{ $mod->strTaxiOwnedId }}" id="taxiModelIdEdit" name="taxiModelIdEdit" type="text" hidden>
									    <div class="md-form form-group">
											<select id="selectcbrandEdit" name="selectcbrandEdit" onchange="fnChangeModelNameE{{ $mod->strTaxiOwnedId }}();" class="mdb-select colorful-select dropdown-dark">
						            			<option selected value="{{ $mod->strCarBrandId }}" >{{$mod->strCarBrandName}}</option>
												 @foreach($carbrands as $cb)
								            		@if(($cb->status == '1') && ($cb->strCarBrandId !=  $mod->strCarBrandId ))
								                		<option value="{{ $cb->strCarBrandId }}">{{ $cb->strCarBrandName }}</option>
								                	@endif
								                @endforeach
											</select>
											<label>Car Brand</label>
									    </div>
									</div>
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
									        <i class="fa fa-car prefix"></i>
									        <input type="text" id="modelNameEdit" name="modelNameEdit" value = "{{$mod->strTaxiOwnedMName }}" class="form-control">
									        <label for="modelName">Model Name</label>
									    </div>
									</div>
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
									        <i class="fa fa-bars prefix"></i>
									        <input type="text" id="plateNumberEdit" onkeyup="fnPlateE{{ $mod->strTaxiOwnedId }}();" name="plateNumberEdit" value="{{$mod->strTaxiOwnedPNum }}" class="form-control">
									        <label for="plateNumber">Plate Number</label>
									    </div>
									</div>
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
									        <i class="fa fa-pencil prefix"></i>
									        <textarea type="text" id="descEdit" name="descEdit" class="md-textarea">{{$mod->strTaxiOwnedDesc}} </textarea>
							                <label for="desc">Description</label>
									    </div>
									</div>
								</div>
				            </div>
				            <!--Footer-->
				            <div class="modal-footer">
						        <button type="submit" class="btn btn-danger" style="background-color:black" >Update</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>
				            </div>
				        </div>
				        <!--/.Content-->
				    </div>
				</div>
			</form>
			<script type="text/javascript">
				$(document).ready(function() {
				    $('#{{ $mod->strTaxiOwnedId }}').bootstrapValidator({
				        message: 'This value is not valid',
				        feedbackIcons: {
				            valid: 'glyphicon glyphicon-ok',
				            invalid: 'glyphicon glyphicon-remove',
				            validating: 'glyphicon glyphicon-refresh'
				        },
				        fields: {
				            descEdit: {
				                validators: {
				                    stringLength: {
				                    	min: 2,
				                    	max: 255,
				                        message: 'The description must be more than 1 and less than 255 characters.'
				                    }
				                }
				            },
				            plateNumberEdit: {
				                message: 'The Plate number is not valid',
				                validators: {
				                    notEmpty: {
				                        message: 'The Plate number is required and cannot be empty'
				                    },
				                    stringLength: {
				                    	min: 7,
				                        max: 8,
				                        message: 'The Plate number must be 7-8 characters long'
				                    },
				                    regexp: {
				                        regexp: /^[A-Z]{2,3}-[0-9]{3,4}$/,
				                        message: 'The Plate number only consist alphanumeric characters and a dash'
				                    },
									remote: {
										type: 'GET',
				                        url: 'validatePNumE',
				                        data: function(validator) {
				                            return {
				                            	taxiModelIdEdit: validator.getFieldElements('taxiModelIdEdit').val(),
				                                plateNumberEdit: validator.getFieldElements('plateNumberEdit').val()
				                            };
				                        },
				                        message: 'The Plate number is not available, try a different Plate number'
				                    }
				                }
				            },
				            modelNameEdit: {
				                message: 'The Model name is not valid',
				                validators: {
				                    notEmpty: {
				                        message: 'The Model name is required and cannot be empty'
				                    },
				                    stringLength: {
				                    	min: 2,
				                        max: 35,
				                        message: 'The Model name must be 2-35 characters long'
				                    }
				                }
				            },
				        }
				    });
				});
			</script>
			 <script>
				function fnPlateE{{ $mod->strTaxiOwnedId }}()
				{
					var n = document.getElementById('plateNumberEdit').value;
					var m = n.length;
					
					document.getElementById('plateNumberEdit').value = n.toUpperCase();

					if(m == 3)
					{
						document.getElementById('plateNumberEdit').value = n+'-';
					}
				}
				function fnChangeModelNameE{{ $mod->strTaxiOwnedId }}()
				{
					
					var n = $('#selectcbrandEdit option:selected').text();
					
					
					document.getElementById('modelNameEdit').value = n;
				}
			 </script>
		 @endforeach
		<!-- Edit -->
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
								<h1 style="color:white">T&nbsp;A&nbsp;X&nbsp; I&nbsp; &nbsp;M&nbsp;O&nbsp;D&nbsp;E&nbsp;L</h1>
							</center>
							<div class="clearfix"></div>
						</div>
						<div class="card-block" style="color:black;">
							<div class="dataTables_wrapper">
			                    <table id="cmodeltable" class="table table-bordered table-hover">
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
									@if($mod->status == 1)
				                        <tr>
					                        <td>{{$mod->strTaxiOwnedId}}</td>
					                        <td>{{$mod->strCarBrandName}} </td>
											<td>{{$mod->strTaxiOwnedMName}}</td>
											<td>{{$mod->strTaxiOwnedPNum}}</td>
											<td>{{$mod->strTaxiOwnedDesc}}</td>
				
											<td>
												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black " data-toggle="modal" data-target="#delete{{ $mod->strTaxiOwnedId  }}">
															<span  title="Delete" data-placement="bottom">
																<i class="fa fa-remove" style="color:white"></i>
															</span>
														</a>

												<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black"  data-toggle="modal" data-target="#edit{{ $mod->strTaxiOwnedId  }}" class="pull-right">
														<span data-toggle="tooltip" title="Edit" data-placement="bottom" >
															<i class="fa fa-pencil" style="color:white"></i>
														</span>
													</a>
											</td>
				                        </tr>

				                        <div id="delete{{ $mod->strTaxiOwnedId }}" class="modal fade" role="dialog">
											    <div class="modal-dialog ">
											    	<div class="modal-content"> 
											    		<div class="modal-header" style="background-color:#cc0000">
												    		<h4 class="modal-title" style="color:white;"><center>DELETE TAXI MODEL</center></h4>
												    	</div>
												    	<form id="delete" action="/taxiModelDel" method="post">
												    	{!! csrf_field() !!}
												      		<div class="modal-body" style="background-color:white; color:black">
												        		<div class="form-group">
																    <input value="{{$mod->strTaxiOwnedId}}" id="taxiModelIdDelete" name="taxiModelIdDelete" type="text" hidden>
																	<h4 style="margin-left:20px">Are you sure you want to delete <b>{{ $mod->strTaxiOwnedMName }}</b> ?</h4>
																    
																</div>
												      		</div>
												      		<div class="modal-footer">
														        <button type="submit" class="btn btn-danger" style="background-color:black">Yes</button>
														        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
														    </div>
									      				</form>
											    	</div>
											  	</div>
											</div>
				                        @endif
					                @endforeach
				                        
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
		function fnPlate()
		{
			var n = document.getElementById('plateNumber').value;
			var m = n.length;
			
			document.getElementById('plateNumber').value = n.toUpperCase();

			if(m == 3)
			{
				document.getElementById('plateNumber').value = n+'-';
			}
		}
		function fnChangeModelName()
		{
			
			var n = $('#selectcbrand option:selected').text();
			
			
			document.getElementById('modelName').value = n;
			// alert($('#selectcbrand').val())
		}
	</script>
@stop