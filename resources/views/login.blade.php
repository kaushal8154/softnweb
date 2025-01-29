
@extends('layouts.app')

@section('title', 'Sign Up')

@section('pagecontent')

<div class="row">	

	<div id="pagecontent" class="col-sm-12">

		@php
			
		@endphp
		
		
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

		<h1><center> Log In </center></h1>	
		<div class="row" >
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form name="frmLogin" action="{{ url('signin') }}" method="post" id="frmLogin" >
					@csrf
					<table>						
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
		$("#frmLogin").validate({
			rules: {
				email: {
					required: true,
					email: true,
					/* email: {
						depends: function(element) {
							return $("#contactform_email").is(":checked");
						}
					} */
				},
				password: {
					required: true
				}
			}
		});
	});
</script>			
@endsection


@section('pagestyle')
<style>
	
</style>			
@endsection