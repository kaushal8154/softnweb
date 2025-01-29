
@extends('layouts.app')
 
@section('title', 'Students List')

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

		<h1><center> Student List </center></h1>

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

	//var site_url = '{{ env("APP_URL") }}';  
			
	$(document).ready(function(){		

		
		var mydttable = $('#tblStudentList').DataTable({
		/* ajax: site_url+'/liststudents', */
			processing: true,
			serverSide: true,
			//paging: true,
			serverMethod: 'post',
			destroy: true,
			cache: false,
			//ajaxSource: site_url+'/liststudents',
			columns: [
				{ data: 'sid',name: 'sid',defaultContent: ' ' },
				{ data: 'student_name',name: 'student_name',defaultContent: ' ' },
				{ data: 'email',name: 'email',defaultContent: ' ' },
				{ data: 'gender',name: 'gender',defaultContent: ' ' },
			],
			ajax: {
				//headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: site_url+'/liststudents',
				cache: false,
				type: "POST",
				data: function (d) {
					d._token = $('meta[name="csrf-token"]').attr('content'); // Add CSRF token to data
				},
				/* columns: [
						{ data: 'sid',name: 'sid',defaultContent: ' ' },
						{ data: 'student_name',name: 'student_name',defaultContent: ' ' },
						{ data: 'email',name: 'email',defaultContent: ' ' },
						{ data: 'gender',name: 'gender',defaultContent: ' ' },
				] */
			},
			"dataSrc": function ( json ) {
				var data = {};
				data.draw = json.draw;
				data.recordsTotal = json.recordsTotal;
				data.recordsFiltered = json.recordsFiltered;
				data.data = json.data;
				return data.data; //note this
			}			
		});

		mydttable.clear();

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