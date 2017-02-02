@extends('home')

@section('pageTitle', 'Boundary')

@section('content')

	<div class="row">
	<form id="bdown">
	{!! csrf_field() !!}
		<div class="modal fade modal-ext" id="addBdownBoundary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <h3><i class="fa fa-cab"></i> Add Boundary Breakdown</h3>
		            </div>
		            <div class="modal-body">
					    <div class="md-form form-group" style="color:black;">
					        <i class="fa fa-book prefix"></i>
					        <input type="text" id="fName"  name="fName" class="form-control" onkeyup="check();">
					        <label for="fName" data-error="Error" data-success="Valid">Fees Name</label>
					    </div>
					    <div class="md-form form-group" style="color:black;">
					        <i class="fa fa-rub prefix"></i>
					        <input type="number" id="fAmount" name="fAmount" onkeyup="check();" class="form-control"/ >
			                <label for="fAmount">Amount</label>
					    </div>
		            </div>		      

							    <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">      
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal" id="addbdown" name="addbdown" onclick="adddata();">Add</button>
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		        </div>
		    </div>
		</div>
		</form>

		<script type="text/javascript">
	

			$(document).ready(function() {
	       $('#addbdown').prop('disabled',true);

           			total = document.getElementById('boundamt').value;
           			document.getElementById('boundaryamount').value = total;
			    $('#bdown').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            fName: {
			                message: 'The fee name is not valid',
			                validators: {
			                    notEmpty: {

			                        message: 'The fee name is required and can\'t be empty'
			                    },
			                    stringLength: {
			                        min: 2,
			                        max: 35,
			                        message: 'The fee name must be more than 2 and less than 35 characters long'
			                    }
			                }
			            },
	                   fAmount: {
			                message: 'The amount is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The amount is required and can\'t be empty'
			                    },
			                   
			                }
			            },
			        }
			    });
			});
		</script>
		<script type="text/javascript">
		
		function check()
				{	
					fch="0";
					ach="0";
					fn = document.getElementById('fName').value
					// alert(fn);
					if(fn==null || fn==""){
					fch="0";
					}
					else{
					fch="1";
					}

					amt = document.getElementById('fAmount').value
					// alert(fn);
					if(amt==null || amt==""){
					ach="0";
					}
					else{
					ach="1";
					}

						if(ach=="1" && fch== "1"){
						
	     				  $('#addbdown').prop('disabled',false);
						}
						else{

	      				 $('#addbdown').prop('disabled',true);
						}
				}
				ctr=0;
		function adddata(){
					rows="";

					fn = document.getElementById('fName').value
					amt = document.getElementById('fAmount').value
					ctr=ctr+1;
					// rows.appendChild();
					
           			tot = document.getElementById('boundaryamount').value;
           			var aa = parseInt(amt);
           			var ab = parseInt(tot)
	           			
           			totall= aa + ab;
           			document.getElementById('boundaryamount').value=totall;

			rows += "<tr><td>" + fn + "</td><td>" + amt + "</td><td><a class='btn btn-danger btn-sm pull-right clearRow' style='border:0px; color:white' onclick='deletedata()'><span data-toggle='tooltip' title='Remove' data-placement='bottom' ><i class='fa fa-remove'></i></span> </a></td></tr>";


								
		
            $(rows).appendTo("#bbreakdowntable tbody");

            document.getElementById('fName').value="";
			document.getElementById('fAmount').value="";

		}
		
		function deletedata(){
			$('#bbreakdowntable').on('click', '.clearRow', function(e){
   				 $(this).closest('tr').remove()
		});
		}




		</script>

		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="addbound">
		{!! csrf_field() !!}
			<div id="Add" class="collapse" style="border:0px; background-color:white;width:100%; ">	
				<div  class="card"  style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;B&nbsp;O&nbsp;U&nbsp;N&nbsp;D&nbsp;A&nbsp;R&nbsp;Y</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
								<input value="{{$newID}}" id="boundaryId" name="boundaryId" type="text" hidden>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-cab prefix"></i>
							        <input type="text" id="bName" name="bName" class="form-control">
							        <label for="bName" data-error="Error" data-success="Valid">Boundary Name</label>
							    </div>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-pencil prefix"></i>
							        <textarea type="text" id="bdesc" name="bdesc" class="md-textarea"></textarea>
					                <label for="bdesc">Description</label>
							    </div>
								<div class="col-sm-6">
								    <div class="col-sm-10" style="color:black">
								    	<h3 style="color:black;">Boundary Breakdown</h3>
									</div>
									<div class="col-sm-2">
										<a data-toggle="modal" data-target="#addBdownBoundary" id="btnModalAddBB" class="btn btn-danger btn-sm pull-right" style="border:0px; ">
											<span data-toggle="tooltip" title="Add" data-placement="bottom" >
												<i class="fa fa-plus" style="color:white"></i>
											</span>
										</a>										
									</div>
									<div class="col-sm-12" style="color:black;">
					                    <table id="bbreakdowntable" class="table table-hover table-bordered">
											<thead>
						                        <tr>
													<th>Breakdown Name</th>
													<th>Amount</th>
													<th></th>
						                        </tr>
						                    </thead>
											<tbody id="tbodybbreakdowntable">
						                    
					                    	</tbody>
					                    </table>
									</div>
								</div>
								<div class="col-sm-6">
									<h3 style="color:black;">Boundary Total</h3>
								    <div class="md-form form-group" style="color:black;">
								    <i class="fa fa-rub prefix"></i>

								        <label style="font-size: 15pt;"> Amount :</label>	
								        <input type="number" step="any" id="boundaryamount" name="boundaryamount" class="form-control" disabled>
								    </div>

								</div>

							    <input type="hidden" id="token" value="{{ csrf_token() }}">
							</div>
						</div>
					</div>

					<div class="card-footer md-form form-group">
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
					  		<button type="submit" class="btn btn-danger" id="btnSave" name="btnSave" style="background-color:black">Save</button>
					        <button type="button" class="btn btn-danger" data-toggle="collapse" href="#Add" >Cancel</button>							
						</div>
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#addbound').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			        	 bdesc: {
				                validators: {
				                    stringLength: {
				                    	min: 2,
				                    	max: 255,
				                        message: 'The description must be more than 1 and less than 255 characters.'
				                    }
				                }
				            },
			            bName: {
			                message: 'The Boundary name is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The boundary name is required and can\'t be empty'
			                    },
			                    stringLength: {
			                        min: 2,
			                        max: 35,
			                        message: 'The boundary name must be more than 2 and less than 35 characters long'
			                    }
			                }
			            },
	                   boundaryamount: {
			                message: 'The amount is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The amount is required and can\'t be empty'
			                    },
			                   
			                }
			            },

			        }
			    });
			});
		</script>
		<form id="bound">

	{!! csrf_field() !!}
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
								<h1 style="color:white">B&nbsp;O&nbsp;U&nbsp;N&nbsp;D&nbsp;A&nbsp;R&nbsp;Y</h1>
							</center>
							<div class="clearfix"></div>
						</div>
						<div class="card-block" style="color:black;">
							<div class="dataTables_wrapper">
			                    <table id="cboundarytable" class="table table-hover table-bordered">
											<thead>
						                        <tr>
													<th>Breakdown Name</th>
													<th>Amount</th>
													<th></th>
													<th></th>
						                        </tr>
						                    </thead>
											<tbody>
						                        @foreach($bound as $bd)
											@if($bd->status == 1)
					                        <tr>
												<td>{{$bd->strBoundaryId}}</td>
												<td>{{$bd->strBoundaryName}}</td>
												<td>
													<center>
														<a class="btn btn-danger btn-sm pull-right"  data-toggle="modal" data-target="#modalShiftDays" style="border:0px; background-color:black ">
															<span data-toggle="tooltip" title="Details" data-placement="bottom" >
																<i style="color:white">View Details</i>
															</span>
														</a>
													</center>
												</td>
												<td>
														<a id="add" class="btn btn-danger btn-sm pull-right" style="border:0px; color:white ">
															<span data-toggle="tooltip" title="Remove" data-placement="bottom" >
																<i class="fa fa-remove"></i>
															</span>
														</a>
													</td>
						                        </tr>
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

	</form>
	</div>

	<script>

	$("#btnSave").click(function(e){	
			
			var feeArr = [];
			var amtArr = [];
			
		var rowsc = document.getElementById("tbodybbreakdowntable").rows.length

			for(i = 0; i<rowsc; i++){

			var a = document.getElementById("tbodybbreakdowntable").rows[i].cells[0].innerHTML;
				
					feeArr.push([a]);
				
			}
			for(j = 0; j<rowsc; j++){

			var b = document.getElementById("tbodybbreakdowntable").rows[j].cells[1].innerHTML;
				
					amtArr.push([b]);
				
			}


			var form_data = $('#addbound').serialize();
			
			var sID = $('#boundaryId').val();
			var sName = $('#bName').val();
			var sDesc = $('#bDesc').val();
			var sTamt = $('#boundaryamount').val();
			alert(sID +' ' + sName  +' ' + sDesc  +' ' + sTamt);
			alert(feeArr);
			alert(amtArr);
		


    		$.ajax({
                url:"boundaryAdd",
                type:"POST",
		        beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');

		            if (token) {
		                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
                data: {
	            	id: sID,
	            	name: sName,
	            	desc: sDesc,
	            	fArr: feeArr,
	            	aArr: amtArr,
	            	tAmt: sTamt,
	            	'_token': $('#token').val()
	            	
         		},
                success: function(data){

	            	// alert("Success");
					swal({   
						title: "Success!",   
						text: "Boundary Successfully added!",   
						type: "success",
						timer: 5000,
						confirmButtonText: "Okay" 
					});
	            	window.location.href = "create_boundary";            
                },
                error: function(xhr)
	            {
	                alert($.parseJSON(xhr.responseText)['error']['message']);
	            }                  
    		});
		});
	</script>
@stop