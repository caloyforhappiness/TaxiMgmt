@extends('home')

@section('pageTitle', 'Create Shift')

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

		<!-- Modal Contact -->
		<form id="editShiftTempForm">
			{!! csrf_field() !!}
			<div class="modal fade animated zoomIn modal-ext" id="editShiftTemp" style="border:0px; width:100%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <!--Content-->
			        <div class="modal-content">
			            <!--Header-->
			            <div class="modal-header danger-color-dark white-text"">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>								
			                <h1 id="myModalLabel" class="modal-title" style="color:white"><center>E&nbsp;D&nbsp;I&nbsp;T&nbsp; &nbsp;S&nbsp;H&nbsp;I&nbsp;F&nbsp;T&nbsp; &nbsp;T&nbsp;E&nbsp;M&nbsp;P&nbsp;L&nbsp;A&nbsp;T&nbsp;E</center></h1>
			            </div>
			            <!--Body-->
			            <div class="modal-body">
							<div class="row">
								<input value="" id="editshiftId" name="editshiftId" type="text" hidden>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-archive prefix"></i>
							        <input value="aaa" type="text" id="editshiftName" name="editshiftName" class="form-control">
							        <label for="editshiftName">Shift Name</label>
							    </div>
							    <div class="well well-sm">
							    	<h4 style="color:black"><b><u> Selected day/s</u></b></h4>
								    <div class="md-form form-group" style="color:black">
									    <fieldset class="form-group">
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk0" value="0">
									        <label for="editchk0">Sunday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk1" value="1">
									        <label for="editchk1">Monday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk2" value="2">
									        <label for="editchk2">Tuesday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk3" value="3">
									        <label for="editchk3">Wednesday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk4" value="4">
									        <label for="editchk4">Thursday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk5" value="5">
									        <label for="editchk5">Friday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" id="editchk6" value="6">
									        <label for="editchk6">Saturday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="editchkDays[]" hidden id="editchk7" value="">
									        <label for="editchk7" hidden>error in bootstrap</label>&nbsp;
									    </fieldset>
								    </div>
							    </div>
								<div class="md-form" style="color:black">
									<i class="fa fa-clock prefix"></i>
								    <input value="aaaa" type="text" id="editstarttimeshift" name="editstarttimeshift" class="form-control timepicker">
								    <label for="editstarttimeshift">Shift Start</label>
								</div>

								<div class="md-form" style="color:black">
									<i class="fa fa-clock prefix"></i>
								    <input value="aaa" type="text" id="editendtimeshift" name="editendtimeshift" class="form-control timepicker">
								    <label for="editendtimeshift">Shift End</label>
								</div>
							    <input type="hidden" id="token" value="{{ csrf_token() }}">
							</div>
			            </div>
			            <!--Footer-->
			            <div class="modal-footer">
					        <button class="btn btn-danger" id="editbtnSave" style="background-color:black" >Update</button>
					        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>
			            </div>
			        </div>
			        <!--/.Content-->
			    </div>
			</div>
		</form>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#editShiftTempForm').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            editshiftName: {
			                message: 'The shift name is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The shift name is required and can\'t be empty'
			                    },
			                    stringLength: {
			                        min: 2,
			                        max: 35,
			                        message: 'The shift name must be more than 2 and less than 35 characters long'
			                    }
			                }
			            },
	                    'editchkDays[]': {
			                validators: {
			                    choice: {
			                        min: 1,
			                        max: 7,
			                        message: 'Please choose %s - %s days'
			                    }
			                }
	                    }
			        }
			    });
			});
		</script>
		<!-- ADDDDDDDDDDDDDDDDDDDDDDDDD -->
		<form id="addshift">
			{!! csrf_field() !!}
			<div id="Add" class="collapse animated flipInX col-sm-12" style="border:0px; background-color:white;width:100%; ">	
				<div  class="card"  style=" border:0px; background-color:white; color:white ">
					<div class="card-header danger-color-dark white-text">
						<a data-toggle="collapse" id="add" data-parent="#accordion"  class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:#cc0000 ">
							<span data-toggle="tooltip" title="Close" data-placement="bottom" >
								<i class="fa fa-remove"></i>
							</span>
						</a>
						<h1 style="color:white"><center>A&nbsp;D&nbsp;D&nbsp; &nbsp;S&nbsp;H&nbsp;I&nbsp;F&nbsp;T</center></h1>
					</div>
					<div class="card-block">
						<div class="container">
							<div class="row">
								<input value="{{$newID}}" id="shiftId" name="shiftId" type="text" hidden>
							    <div class="md-form form-group" style="color:black;">
							        <i class="fa fa-archive prefix"></i>
							        <input type="text" id="shiftName" name="shiftName" class="form-control">
							        <label for="shiftName">Shift Name</label>
							    </div>
							    <div class="well well-sm">
							    	<h4 style="color:black"><b><u> Selected day/s</u></b></h4>
								    <div class="md-form form-group" style="color:black">
									    <fieldset class="form-group">
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk0" value="0">
									        <label for="chk0">Sunday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk1" value="1">
									        <label for="chk1">Monday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk2" value="2">
									        <label for="chk2">Tuesday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk3" value="3">
									        <label for="chk3">Wednesday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk4" value="4">
									        <label for="chk4">Thursday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk5" value="5">
									        <label for="chk5">Friday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" id="chk6" value="6">
									        <label for="chk6">Saturday</label>&nbsp;
									        <input type="checkbox" class="form-control" name="chkDays[]" hidden id="chk7" value="">
									        <label for="chk7" hidden>error in bootstrap</label>&nbsp;
									    </fieldset>
								    </div>
							    </div>
								<div class="md-form" style="color:black">
									<i class="fa fa-clock prefix"></i>
								    <input type="text" id="starttimeshift" name="starttimeshift" class="form-control timepicker">
								    <label for="starttimeshift">Shift Start</label>
								</div>

								<div class="md-form" style="color:black">
									<i class="fa fa-clock prefix"></i>
								    <input type="text" id="endtimeshift" name="endtimeshift" class="form-control timepicker">
								    <label for="endtimeshift">Shift End</label>
								</div>
							    <input type="hidden" id="token" value="{{ csrf_token() }}">
							</div>
						</div>
					</div>
					<div class="card-footer md-form form-group">
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
					        <button class="btn btn-danger" id="btnSave" name="btnSave" style="background-color:black">Save</button>
					        <button type="button" class="btn btn-danger" data-toggle="collapse" href="#Add" >Cancel</button>							
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#addshift').bootstrapValidator({
			        message: 'This value is not valid',
			        feedbackIcons: {
			            valid: 'glyphicon glyphicon-ok',
			            invalid: 'glyphicon glyphicon-remove',
			            validating: 'glyphicon glyphicon-refresh'
			        },
			        fields: {
			            shiftName: {
			                message: 'The shift name is not valid',
			                validators: {
			                    notEmpty: {
			                        message: 'The shift name is required and can\'t be empty'
			                    },
			                    stringLength: {
			                        min: 2,
			                        max: 35,
			                        message: 'The shift name must be more than 2 and less than 35 characters long'
			                    }
			                }
			            },
	                    'chkDays[]': {
			                validators: {
			                    choice: {
			                        min: 1,
			                        max: 7,
			                        message: 'Please choose %s - %s days'
			                    }
			                }
	                    }
			        }
			    });
			});
		</script>
		<form id="formShiftTable">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="card" style="width:100%;border:0px; color:black">
							<div class="card-header" style="background-color:black;">
								<a data-toggle="collapse" id="add" data-parent="#accordion" class="btn btn-danger btn-lg pull-right" href="#Add" style="border:0px; background-color:black ">
									<span data-toggle="tooltip" title="Add" data-placement="bottom" >
										<i class="fa fa-plus" style="color:white"></i>
									</span>
								</a>
								<center>
									<h1 style="color:white">S&nbsp;H&nbsp;I&nbsp;F&nbsp;T&nbsp; &nbsp;T&nbsp;E&nbsp;M&nbsp;P&nbsp;L&nbsp;A&nbsp;T&nbsp;E</h1>
								</center>
								<div class="clearfix"></div>
							</div>
							<div class="card-block" style="color:black;">
								<div class="dataTables_wrapper">
				                    <table id="cshifttable" class="table table-bordered table-hover">
										<thead>
					                        <tr>
												<th>ID</th>
												<th>Shift Name</th>
												<th>Shift Day</th>
												<th></th>
					                        </tr>
					                    </thead>
										<tbody>
										@foreach($shift as $sh)
											@if($sh->status == 1)
					                        <tr>
												<td>{{$sh->strShiftTemplateId}}</td>
												<td>{{$sh->strShiftTemplateName}}</td>
												<td>
													<center>
														<a class="btn btn-danger btn-sm pull-right" onclick="getDetails(this.name);" name="{{$sh->strShiftTemplateId}}" data-toggle="modal" data-target="#modalShiftDays" style="border:0px; background-color:black ">
															<span data-toggle="tooltip" title="Details" data-placement="bottom" >
																<i style="color:white">View Details</i>
															</span>
														</a>
													</center>
												</td>
												<td>
													<a class="btn btn-danger btn-sm pull-right" style="border:0px; background-color:black ">
														<span data-toggle="tooltip" title="Add" data-placement="bottom" >
															<i class="fa fa-remove" style="color:white"></i>
														</span>
													</a>

													<a class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#editShiftTemp" onclick="editgetDetails(this.name);" name="{{$sh->strShiftTemplateId}}" style="border:0px; background-color:black ">
														<span data-toggle="tooltip" title="Add" data-placement="bottom" >
															<i class="fa fa-pencil" style="color:white"></i>
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
		<form id="formShiftDays">
			<div class="modal fade animated zoomIn modal-ext" id="modalShiftDays" style="border:0px; width:100%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <!--Content-->
			        <div class="modal-content">
			            <!--Header-->
			            <div class="modal-header"">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>								
			                <h1 id="myModalLabel" class="modal-title" style="color:black"><center>S&nbsp;H&nbsp;I&nbsp;F&nbsp;T&nbsp;/&nbsp;S</center></h1>
			            </div>
			            <!--Body-->
			            <div class="modal-body">
							<div class="row">
								<div class="dataTables_wrapper">
				                    <table id="bshifttable" class="table table-bordered table-hover">
										<thead>
					                        <tr>
												<th>Day</th>
												<th>In</th>
												<th>Out</th>
					                        </tr>
					                    </thead>
										<tbody id="bbshifttable" style="color:black;">

				                    	</tbody>
				                    </table>
				                </div>
							</div>
			            </div>
			            <!--Footer-->
			            <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>
			            </div>
			        </div>
			        <!--/.Content-->
			    </div>
			</div>
		</form>	
	</div>
	<script>

		function editgetDetails(id)
		{
	        $('#editshiftName').val("");
	        $('#editshiftId').val("");
	        $('#editchk0').prop("checked", false);
	        $('#editchk1').prop("checked", false);
	        $('#editchk2').prop("checked", false);
	        $('#editchk3').prop("checked", false);
	        $('#editchk4').prop("checked", false);
	        $('#editchk5').prop("checked", false);
	        $('#editchk6').prop("checked", false);
	        $('#editchk7').prop("checked", false);
            $.ajax({
                type: "GET",
                url:  "getESDetails",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                    var timeOUt = null;
                    var timeIn = null;
                    for(i=0; i<data['sdays'].length; i++)
                    {

                    	var dayChecked = "";
                    	if(data['sdays'][i]['intSTDay'] == "0")
                    	{
					        $('#editchk0').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "1")
                    	{
                    		$('#editchk1').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "2")
                    	{
                    		$('#editchk2').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "3")
                    	{
                    		$('#editchk3').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "4")
                    	{
                    		$('#editchk4').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "5")
                    	{
                    		$('#editchk5').prop("checked", true);
                    	}
                    	else if(data['sdays'][i]['intSTDay'] == "6")
                    	{
                    		$('#editchk6').prop("checked", true);
                    	}
						var time = data['sdays'][i]['tmSTShiftIn']; // your input

						time = time.split(':'); // convert to array

						// fetch
						var hours = Number(time[0]);
						var minutes = Number(time[1]);

						// calculate
						timeIn = "" + ((hours >12) ? hours - 12 : (hours == 0)? 12 : hours);  // get hours
						timeIn += (minutes < 10) ? ":0" + minutes : ":" + minutes;  // get minutes
						timeIn += (hours >= 12) ? " P.M." : " A.M.";  // get AM/PM

						var timeO = data['sdays'][i]['tmSTShiftOut']; // your input

						timeO = timeO.split(':'); // convert to array

						// fetch
						var hoursO = Number(timeO[0]);
						var minutesO = Number(timeO[1]);
						
						// // calculate
						timeOUt = "" + ((hoursO >12) ? hoursO - 12 : (hoursO == 0)? 12 : hoursO);  // get hoursO
						timeOUt += (minutesO < 10) ? ":0" + minutesO : ":" + minutesO;  // get minutes
						timeOUt += (hoursO >= 12) ? " P.M." : " A.M.";  // get AM/PM
                    }
					$('#editstarttimeshift').val(timeIn);
					$('#editendtimeshift').val(timeOUt);;
					$('#editshiftName').val(data['stemp'][0]['strShiftTemplateName']);
					$('#editshiftId').val(data['stemp'][0]['strShiftTemplateId']);

                },
                error: function(xhr)
                {
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
		}
		function getDetails(id)
		{
	        var tblSDet = $('#bshifttable').DataTable();
	            
	        tblSDet.clear();
	        tblSDet.draw(true);
	        var newIds = id;
	        // alert(tblSDet);
            $.ajax({
                type: "GET",
                url:  "getSDetails",
                data: 
                {
                    sdid: newIds
                },
                success: function(data){
                    // alert();
                    for(i=0; i<data[0].length; i++)
                    {

                    	var dayChecked = "";
                    	if(data[0][i]['intSTDay'] == "0")
                    	{
                    		dayChecked = "Sunday";
                    	}
                    	else if(data[0][i]['intSTDay'] == "1")
                    	{
                    		dayChecked = "Monday";	
                    	}
                    	else if(data[0][i]['intSTDay'] == "2")
                    	{
                    		dayChecked = "Tuesday";
                    	}
                    	else if(data[0][i]['intSTDay'] == "3")
                    	{
                    		dayChecked = "Wednesday";
                    	}
                    	else if(data[0][i]['intSTDay'] == "4")
                    	{
                    		dayChecked = "Thursday";
                    	}
                    	else if(data[0][i]['intSTDay'] == "5")
                    	{
                    		dayChecked = "Friday";
                    	}
                    	else if(data[0][i]['intSTDay'] == "6")
                    	{
                    		dayChecked = "Saturday";
                    	}
						var time = data[0][i]['tmSTShiftIn']; // your input

						time = time.split(':'); // convert to array

						// fetch
						var hours = Number(time[0]);
						var minutes = Number(time[1]);

						// calculate
						var timeIn = "" + ((hours >12) ? hours - 12 : (hours == 0)? 12 : hours);  // get hours
						timeIn += (minutes < 10) ? ":0" + minutes : ":" + minutes;  // get minutes
						timeIn += (hours >= 12) ? " P.M." : " A.M.";  // get AM/PM

						var timeO = data[0][i]['tmSTShiftOut']; // your input

						timeO = timeO.split(':'); // convert to array

						// fetch
						var hoursO = Number(timeO[0]);
						var minutesO = Number(timeO[1]);
						
						// // calculate
						var timeOUt = "" + ((hoursO >12) ? hoursO - 12 : (hoursO == 0)? 12 : hoursO);  // get hoursO
						timeOUt += (minutesO < 10) ? ":0" + minutesO : ":" + minutesO;  // get minutes
						timeOUt += (hoursO >= 12) ? " P.M." : " A.M.";  // get AM/PM


	                    tblSDet.row.add([
	                        dayChecked,
	                        timeIn,
	                        timeOUt
	                    ]).draw(true);
                    }

                },
                error: function(xhr)
                {
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
		}
		$("#editbtnSave").click(function(e){	
			var daysArr = [];
			for(i = 0; i<7; i++){
				if($("input:checkbox[id=editchk"+i+"]").is(':checked'))
				{
					var daysid = $('#editchk'+i+'').val();
					daysArr.push([daysid]);
				}
			}
			var form_data = $('#editShiftTempForm').serialize();
			
			var sID = $('#editshiftId').val();
			var sName = $('#editshiftName').val();
			var sIn = $('#editstarttimeshift').val();
			var sOut = $('#editendtimeshift').val();
			$.ajax({
                url:  "shiftTempEdit",
                type: "POST",
		        beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');

		            if (token) {
		                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
                data: {
	            	id: sID,
	            	name: sName,
	            	dArr: daysArr,
	            	in: sIn,
	            	out: sOut,
	            	'_token': $('#token').val()
         		},
                success: function(data){
	            	// alert("Success");
					swal({   
						title: "Success!",   
						text: "Shift Template Successfully Updated!",   
						type: "success",
						timer: 5000,
						confirmButtonText: "Okay" 
					});
	            	window.location.href = "create_shift";            
                },
                error: function(xhr)
	            {

					swal({   
						title: "Erroor!",   
						text: $.parseJSON(xhr.responseText)['error']['message'],   
						type: "error",
						confirmButtonText: "Okay" 
					});
	            }                  
    		});
		});
		$("#btnSave").click(function(e){	
			var daysArr = [];
			for(i = 0; i<7; i++){
				if($("input:checkbox[id=chk"+i+"]").is(':checked'))
				{
					var daysid = $('#chk'+i+'').val();
					daysArr.push([daysid]);
				}
			}
			var form_data = $('#addshift').serialize();
			
			var sID = $('#shiftId').val();
			var sName = $('#shiftName').val();
			var sIn = $('#starttimeshift').val();
			var sOut = $('#endtimeshift').val();

			alert(sID+ ' ' + sName+ ' ' + sIn+ ' ' + sOut);
			alert(daysArr);
			$.ajax({
                url:  "/shiftTempAdd",
                type: "POST",
		        beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');

		            if (token) {
		                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
                data: {
	            	id: sID,
	            	name: sName,
	            	dArr: daysArr,
	            	in: sIn,
	            	out: sOut,
	            	'_token': $('#token').val()
         		},
                success: function(data){
	            	// alert("Success");
					swal({   
						title: "Success!",   
						text: "Shift Template Successfully added!",   
						type: "success",
						timer: 5000,
						confirmButtonText: "Okay" 
					});
	            	window.location.href = "create_shift";            
                },
                error: function(xhr)
	            {
	                alert($.parseJSON(xhr.responseText)['error']['message']);
	            }                  
    		});
		});
	</script>
@stop