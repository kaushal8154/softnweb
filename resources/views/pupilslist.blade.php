
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

		$('#tblStudentList').DataTable({
			processing: true,
			serverSide: true,
			//ajax: site_url+"studentlist3",
			ajax: site_url+"/students/data",
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'fullname', name: 'fullname'},
				{ data: 'email', name: 'email' },
				{ data: 'gender', name: 'gender' },
				/* { data: 'created_at', name: 'created_at' }, */
			],
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