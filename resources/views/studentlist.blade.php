
@extends('layouts.app')
 
@section('title', 'About Us')

@section('pagecontent')

<div class="row">

	@include('layouts.header') 

	<div id="pagecontent" class="col-sm-12">

		@if(session('sucmessage'))			
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> {{ session('sucmessage') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

		@if(session('errmessage'))			
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> {{ session('errmessage') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

		@foreach ($errors->all() as $error)
			<!-- <p class="message error" > {{ $error }} </p> -->
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> {{ $error }} 
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endforeach

		<h1><center> Student </center></h1>

		<!-- <p>Student Para.</p>		 -->
		<div class="row">
			<div class="col-sm-12">
				<form name="frmStudent" id="frmStudent" method="post" action="{{ url('savestudent') }}" >
					@csrf
				<table align="center" >
					<tr>
						<td>First Name</td>
						<td><input type="text" name="firstname" id="firstname" class="form-control" />  </td>
					</tr>

					<tr>
						<td>Last Name</td>
						<td><input type="text" name="lastname" id="lastname" class="form-control" />  </td>
					</tr>

					<tr>
						<td>Email</td>
						<td><input type="email" name="email" id="email" class="form-control" />  </td>
					</tr>

					<tr>
						<td>Password</td>
						<td><input type="password" name="password" id="password" class="form-control" />  </td>
					</tr>

					<tr>
						<td>Gender</td>
						<td>
							Male <input type="radio" name="gender" value="male"/>  
							Female <input type="radio" name="gender" value="female"/>  
						</td>
					</tr>

					<tr>
						<td>About</td>
						<td>
							<textarea name="about" class="form-control" ></textarea>  
						</td>
					</tr>

					<tr>
						<td> <button id="btnAjaxSubmit" type="button" class="btn btn-secondary" >Ajax Submit</button> </td>
						<td>
							<input type="submit"  class="btn btn-secondary" name="submit" id="submit" value="Submit" />
						</td>
					</tr>

				</table>
				</form>
			</div>

			<div class="col-sm-12">

				<table id="tblStudentList" align="center" border="1" >
					<thead>
						<tr>
							<th>ID</th>
							<th>Student Name</th>
							<th>Email</th>
							<th>Gender</th>
						</tr>		
					</thead>
					
					<tbody>
						@foreach($pageData['students'] as $student)
						<tr>
							<td>{{ $student->id }}</td>
							<td>{{ $student->firstname }} {{ $student->lastname }} </td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->gender }}</td>
						</tr>			
						@endforeach
					</tbody>

				</table>

			</div>
		</div>

	</div>

	@include('layouts.footer')
	
</div>

@endsection

@section('pagescript')
<script>
	$(document).ready(function(){		

		$("#btnAjaxSubmit").click(function(e){	
			e.preventDefault();
														
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var email = $("#email").val();
			var password = $("#password").val();
			var gender = $("[name='gender']").val();
			
			// build the ajax call
			$.ajax({
				url: site_url+"savestudent",
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {					
					firstname:firstname,
					lastname:lastname,
					email:email,
					password:password,
					gender:gender,
				},
				success: function (response) {										
					if(response.status == '1'){
						$.toast({
							heading: 'Success',
							text: response.message,
							showHideTransition: 'slide',
							icon: 'success',
							position:'top-right',
						});		

						$("#tblStudentList tbody").html("");
						$("#tblStudentList tbody").html(response.data.listrows);

					}else if(response.status == '0'){
						$.toast({
							heading: 'Error',
							text: response.message,
							showHideTransition: 'fade',
							icon: 'error',
							position:'top-right',
						});		
					}

				},
				error: function (response) {
					//console.log(response);
					$.toast({
						heading: 'Error',
						text: response.status+" "+response.statusText,
						showHideTransition: 'fade',
						icon: 'error',
						position:'top-right',
					});
				},				
			});
		});
		
		$("#frmStudent").validate({
			rules: {
				firstname: {
					required: true
				},
				/* lastname: {
					required: true
				}, */
				email: {
					required: true,
					email: true
				},
			}
		});

	});
</script>			
@endsection


@section('pagestyle')
<style>
	table td{
		padding:10px;
	}
	#tblStudentList tr th{
		border:1px solid #000;
		padding:10px;
	}
	#tblStudentList tr td{
		border:1px solid #000;
		padding:10px;
	}
</style>			
@endsection