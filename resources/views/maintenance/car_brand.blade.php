@extends('home')

@section('pageTitle', 'Car Brand')

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
		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="cbrand" action="/carbrandAdd" method="post">
			{!! csrf_field() !!}
			<div id="Add" class="collapse col-sm-12 animated flipInX" style="border:0px; background-color:white;width:100%; ">	
				<div class="card" style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;C&nbsp;A&nbsp;R&nbsp; &nbsp;B&nbsp;R&nbsp;A&nbsp;N&nbsp;D</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
								<input value="{{$newID}}" id="carbrandId" name="carbrandId" type="text" hidden>
							    <div class="col-sm-12" style="color:black">
								    <div class="md-form form-group">
								        <i class="fa fa-car prefix"></i>
								        <input type="text" id="brandname" name="brandname" class="form-control">
								        <label for="brandname">Brand Name</label>
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
					        <button type="submit" class="btn btn-danger" style="background-color:black" >Save</button>
					        <button type="button" class="btn btn-danger" data-toggle="collapse" href="#Add" >Cancel</button>							
						</div>
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#cbrand').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            brandname: {
			                message: 'The brand name is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The brand name is required and can\'t be empty'
			                    },
			                    stringLength: {
			                        min: 2,
			                        max: 35,
			                        message: 'The brand name must be more than 2 and less than 35 characters long'
			                    }
			                }
			            },
			            desc: {
			                validators: {
			                    stringLength: {
			                    	min: 2,
			                    	max: 255,
			                        message: 'The description must be more than 1 and less than 255 characters.'
			                    }
			                }
			            }
			        }
			    });
			});
		</script>
		<!-- ADD -->
		<!-- Ediiiiiiiitttttttt -->
		@foreach($carbrands as $cb)
			<!-- Modal Contact -->
			<form id="{{ $cb->strCarBrandId }}" action="/carbrandUp" method="post">
				{!! csrf_field() !!}
				<div class="modal fade animated zoomIn modal-ext" id="edit{{ $cb->strCarBrandId }}" style="border:0px; width:100%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				        <!--Content-->
				        <div class="modal-content">
				            <!--Header-->
				            <div class="modal-header danger-color-dark white-text"">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>								
				                <h1 id="myModalLabel" class="modal-title" style="color:white"><center>E&nbsp;D&nbsp;I&nbsp;T&nbsp; &nbsp;C&nbsp;A&nbsp;R&nbsp; &nbsp;B&nbsp;R&nbsp;A&nbsp;N&nbsp;D</center></h1>
				            </div>
				            <!--Body-->
				            <div class="modal-body">
								<div class="row">
								    <div class="col-sm-12" style="color:black">
									    <input value="{{ $cb->strCarBrandId }}" id="carbrandIdEdit" name="carbrandIdEdit" onkeyup="Capital(this.id);" type="text" hidden>
									    <div class="md-form form-group">
									        <i class="fa fa-car prefix"></i>
									        <input value="{{ $cb->strCarBrandName }}" type="text" id="brandnameEdit" name="brandnameEdit" class="form-control validate">
									        <label  for="brandnameEdit">Brand Name</label>
									    </div>
									</div>
								    <div class="col-sm-12" style="color:black">
									    <div class="md-form form-group">
									        <i class="fa fa-pencil prefix"></i>
									        <textarea type="text" id="descEdit" name="descEdit" class="md-textarea">{{ $cb->strCarBrandDesc }}</textarea>
							                <label for="descEdit"">Description</label>
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
				    $('#{{ $cb->strCarBrandId }}').bootstrapValidator({
				        message: 'This value is not valid',
				        feedbackIcons: {
				            valid: 'glyphicon glyphicon-ok',
				            invalid: 'glyphicon glyphicon-remove',
				            validating: 'glyphicon glyphicon-refresh'
				        },
				        fields: {
				            brandnameEdit: {
				                message: 'The brand name is not valid',
				                validators: {
				                    notEmpty: {
				                        message: 'The brand name is required and can\'t be empty'
				                    },
				                    stringLength: {
				                        min: 2,
				                        max: 35,
				                        message: 'The brand name must be more than 2 and less than 35 characters long'
				                    }
				                }
				            },
				            descEdit: {
				                validators: {
				                    stringLength: {
				                    	min: 2,
				                    	max: 255,
				                        message: 'The description must be more than 1 and less than 255 characters.'
				                    }
				                }
				            }
				        }
				    });
				});
			</script>
		@endforeach

<!-- viewwwwwwwwwwwwwwww -->

		
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
								<h1 style="color:white">C&nbsp;A&nbsp;R&nbsp; &nbsp;B&nbsp;R&nbsp;A&nbsp;N&nbsp;D</h1>
							</center>
							<div class="clearfix"></div>
						</div>
					<div class="card-block" style="color:black;">
						<div class="dataTables_wrapper">
		                    <table id="cbrandtable" class="table table-bordered table-hover">
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
										@if($cb->status == 1)
					                        <tr>
												<td>{{$cb->strCarBrandId}}</td>
												<td>{{$cb->strCarBrandName}}</td>
												<td>{{$cb->strCarBrandDesc}}</td>
												<td>
													<center>
														<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black " data-toggle="modal" data-target="#delete{{ $cb->strCarBrandId  }}">
															<span  title="Delete" data-placement="bottom">
																<i class="fa fa-remove" style="color:white"></i>
															</span>
														</a>


														<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black;" class="pull-right" data-toggle="modal" data-target="#edit{{ $cb->strCarBrandId }}">
															<span data-toggle="tooltip" title="Edit" data-placement="bottom" >
																<i class="fa fa-pencil" style="color:white"></i>
															</span>
														</a>
													</center>
												</td>
					                        </tr>
					                        <div id="delete{{ $cb->strCarBrandId }}" class="modal fade" role="dialog">
											    <div class="modal-dialog ">
											    	<div class="modal-content"> 
											    		<div class="modal-header" style="background-color:#cc0000">
												    		<h4 class="modal-title" style="color:white;"><center>DELETE CAR BRAND</center></h4>
												    	</div>
												    	<form id="delete" action="/carbrandDel" method="post">
												    	{!! csrf_field() !!}
												      		<div class="modal-body" style="background-color:white; color:black">
												        		<div class="form-group">
																    <input value="{{$cb->strCarBrandId}}" id="carbrandIdDelete" name="carbrandIdDelete" type="text" hidden>
																	<h4 style="margin-left:20px">Are you sure you want to delete <b>{{ $cb->strCarBrandName }}</b> ?</h4>
																    
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

		<!-- VIEW -->
	</div>

@stop