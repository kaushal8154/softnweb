
@extends('layouts.app')
 
@section('title', 'About Us')

@section('pagecontent')

<div class="row">

	@include('layouts.header') 

	<div id="pagecontent" class="col-sm-12">
		<h1><center> Dashboard </center></h1>

		<p>User Dashboard.</p>		

	</div>

	@include('layouts.footer')
	
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
	
</style>			
@endsection