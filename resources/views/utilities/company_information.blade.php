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
		<!-- Company -->

		@foreach($company as $com)
		<form action="/companyUp" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="container">
			<div class="row">
			
				
					<div class="col-sm-12">
						<div class="card" style="width:100%;border:0px; color:black">
							<div class="card-header" style="background-color:black;">
								<a id="edit"  class="btn btn-danger btn-lg pull-right" style="border:0px; background-color:black ">
									<span data-toggle="tooltip" title="Edit" data-placement="bottom" >
										<i class="fa fa-pencil-square-o" style="color:white;font-size:20pt;" id="edit"></i>
									</span>
								</a>
								<center>
									<h1 style="color:white">C&nbsp;O&nbsp;M&nbsp;P&nbsp;A&nbsp;N&nbsp;Y&nbsp; &nbsp;I&nbsp;N&nbsp;F&nbsp;O&nbsp;R&nbsp;M&nbsp;A&nbsp;T&nbsp;I&nbsp;O&nbsp;N</h1>
								</center>
								<div class="clearfix"></div>
							</div>
							<div class="card-block" style="color:black;">
								<div class="container">
									<div class="row">
										<br>
										<div class="col-sm-12" style="color:black">

											<input value="{{$com->strCompanyId}}" id="companyId" name="companyId" onkeyup="Capital(this.id);" type="text" hidden>
											<div class="col-sm-6">
												<div class="col-sm-12">
												    <div class="md-form form-group">
												        <i class="fa fa-building prefix"></i>
												        <input type="text" id="companyname" name="companyname" class="form-control validate" value="{{$com->strCompanyName}}">
												        <label for="companyname" data-error="Error" data-success="Valid" style="font-size:15pt;color: black;"><b>Company Name</b></label>

												    </div>											
												</div>

												<br><br><br><br><br>
											<div class="col-sm-12">
												    <div class="md-form form-group">
												        <i class="fa fa-address-card-o prefix"></i>
												        <input type="text" id="companyaddress" name="companyaddress" class="form-control validate" value="{{$com->strCompanyAddress}}">
												        <label for="companyaddress" data-error="Error" data-success="Valid" style="font-size:15pt;color:black"><b>Company Address</b></label>
												    </div>											
												</div>

												<br><br><br><br>
											<div class="col-sm-12">
												    <div class="md-form form-group">
												    <h3 style="font-size:15pt;color:black"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company Logo</b></h3>
												   
												      <i class="fa fa-image prefix" style="color:#cc0000;"></i>
												      		<div class="col-sm-6">
												        		<img  src="images/upload/{{$com->strCompanyLogo}}" class="img-responsive" style="width:80%;height:80%;margin-left:20%;"/>
												        		<input type="text" id="logocomp" name="logocomp" value="{{$com->strCompanyLogo}}" hidden>
												        	</div>
												        	<div class="col-sm-6">
													           <div class="file-field" style="margin-left:10%;">
														       <div class="btn btn-primary btn-sm" style="width:100%;height:60px;">
														            <span><a  style="font-size:10pt;">Choose file</a></span>
														            <input type="file" id="companylogo" name="companylogo" >
														        </div>
														        <!-- <div class="file-path-wrapper">
														           <input class="file-path validate" type="text" placeholder="Upload your file">
														        </div> -->
														        </div>
														     </div>
														
												    </div>											
												</div>	

												<br><br><br><br><br></br><br><br><br><br>
											<div class="col-sm-12">
											<h3 style="font-size:15pt;color:black"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Working Hours</b></h3>
												    <div class="md-form form-group">
												    
												        <i class="fa fa-clock-o prefix" style="color:#cc0000;"></i>
												        <div class="col-sm-3">
												        <label for="workinghoursfrom" data-error="Error" data-success="Valid" style="font-size:15pt;color:black;margin-left: 40%;"><b>From</b></label>
												        </div>
												        <div class="col-sm-3">
												        <input type="text" id="workinghoursfrom" name="workinghoursfrom" class="form-control validate" value="{{$com->tmCompanyWHFrom}}">
												        </div>

												         <div class="col-sm-3">
												        <label for="workinghoursto" data-error="Error" data-success="Valid" style="font-size:15pt;color:black;margin-left: 40%;"><b>To</b></label>
												        </div>
												        <div class="col-sm-3">
												        <input type="text" id="workinghoursto" name="workinghoursto" class="form-control validate" value="{{$com->tmCompanyWHTo}}">
												        </div>
												        
												    </div>											
											</div>

										</div>

											<div class="col-sm-6">
												<h3 style="color:black;">Contact Details</h3><br>
												<div class="col-sm-12">
												    <div class="md-form form-group">
												        <i class="fa fa-mobile-phone prefix"></i>
												        <input type="text" id="contactnumber" name="contactnumber" class="form-control validate" value="{{$com->strCompanyContNo}}">
												        <label for="contactnumber" data-error="Error" data-success="Valid" style="font-size:15pt;color: black;"><b>Contact Number</b></label>
												    </div>											
												</div>

												<br><br><br><br><br>
												<div class="col-sm-12">
												    <div class="md-form form-group">
												        <i class="fa fa-at prefix"></i>
												        <input type="email" id="emailaddress" name="emailaddress" class="form-control validate" value="{{$com->strCompanyEmail}}">
												        <label for="emailaddress" data-error="Error" data-success="Valid" style="font-size:15pt;color: black;"><b>Email Address</b></label>
												    </div>											
												</div>

												<br><br><br><br><br><br><br><br>
												
												<div class="col-sm-12">
												   <div class="card-footer md-form form-group">
														<div class="col-sm-8"><button type="submit" class="btn btn-danger" style="background-color:black;margin-left:50%; " id="save">Save</button>
														</div>
														<div class="col-sm-4">
													        
													        <button type="button" class="btn btn-danger" id="cancel"">Cancel</button>							
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
				
			
			</div>
		</div>	
		</form>
					                @endforeach
	</div>


    <script>
	    $(document).ready(function() {
	       $('#companyname').prop('disabled',true);
	        $('#companyaddress').prop('disabled',true);
	        $('#companylogo').prop('disabled',true);
	      $('#workinghoursto').prop('disabled',true);
	      $('#workinghoursfrom').prop('disabled',true);
	      $('#contactnumber').prop('disabled',true);
		 $('#emailaddress').prop('disabled',true);
		 $('#save').prop('disabled',true);
		 $('#cancel').prop('disabled',true);

		$("#edit").click(function(){
			$('#companyname').prop('disabled',false);
	        $('#companyaddress').prop('disabled',false);
	        $('#companylogo').prop('disabled',false);
	      $('#workinghoursto').prop('disabled',false);
	      $('#workinghoursfrom').prop('disabled',false);
	      $('#contactnumber').prop('disabled',false);
		 $('#emailaddress').prop('disabled',false);
		 $('#save').prop('disabled',false);
		 $('#cancel').prop('disabled',false);

		});

		$("#cancel").click(function(){
			 $('#companyname').prop('disabled',true);
	        $('#companyaddress').prop('disabled',true);
	        $('#companylogo').prop('disabled',true);
	      $('#workinghoursto').prop('disabled',true);
	      $('#workinghoursfrom').prop('disabled',true);
	      $('#contactnumber').prop('disabled',true);
		 $('#emailaddress').prop('disabled',true);
		 $('#save').prop('disabled',true);
		 $('#cancel').prop('disabled',true);
		});



	    });


    </script>
@stop