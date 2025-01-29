
@extends('layouts.app')

@section('title', 'Sign Up')

@section('pagecontent')

<div class="row">	

	<div id="pagecontent" class="col-sm-12">

		@foreach ($errors->all() as $error)
			<!-- <p class="message error" > {{ $error }} </p> -->
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> {{ $error }} 
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endforeach


		@if(session('message') != null && session('message') != '')
		<div class="row" >
			<div class="col-sm-12">
				<!-- <span class="message {{ session('msgType') }} " > {{ session('message') }} </span> -->
				<div class="alert {{ session('msgClass') }} alert-dismissible fade show" role="alert">
					<strong>Alert!</strong> {{ session('message') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
		</div>
		@endif

		@php			
			session(['msgType' => '','message' => '']);
		@endphp

		<h1><center> Sign Up </center></h1>	
		<div class="row" >
			<div class="col-sm-4">
				<!-- <img src="{{ asset('storage/avatars/FljEhvGpHcdhZYL.png') }}"  width="100" /> -->
			</div>
			<div class="col-sm-4">
				<form name="frmRegister" action="{{ route('signup') }}" method="POST" id="frmRegister" enctype="multipart/form-data" >
					@csrf
					<table>
						<tr>
							<td>First Name</td>
							<td>
								<input type="text"  class="form-control" name="firstname" id="firstname" />
							</td>
						</tr>

						<tr>
							<td>Last Name</td>
							<td>
								<input type="text"  class="form-control" name="lastname" id="lastname" />
							</td>
						</tr>

						<tr>
							<td>Photo</td>
							<td>
								<input type="file"  class="" name="profilephoto" id="profilephoto" />
							</td>
						</tr>

						<tr>
							<td>Email</td>
							<td>
								<input type="email"  class="form-control" name="email" id="email" />
							</td>
						</tr>

						<tr>
							<td>Password</td>
							<td>
								<input type="text"  class="form-control" name="password" id="password" />
							</td>
						</tr>

						<tr>
							<td>Confirm Password &nbsp;&nbsp;</td>
							<td>
								<input type="text"  class="form-control" name="confirm_password" id="confirm_password" />
							</td>
						</tr>

						<tr>
							<td></td>
							<td>
								<input type="submit"  class="btn btn-secondary" name="submit" id="submit" />
							</td>
						</tr>

					</table>				
				</form>
			</div>		
			<div class="col-sm-2"></div>

		</div>			

	</div>	
	
</div>

@endsection

@section('pagescript')
<script>
	$(document).ready(function(){
		
	});
</script>			
@endsection


@section('pagestyle')
<style>
	table td{
		padding:5px 0;
	}
</style>			
@endsection