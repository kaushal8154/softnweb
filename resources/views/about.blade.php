
@extends('layouts.app')
 
@section('title', 'About Us')

@section('pagecontent')

<div class="row">

	@include('layouts.header') 

	<div id="pagecontent" class="col-sm-12">
		<h1><center> {{ $pageData['pageTitle'] }} </center></h1>

		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

		<p>
			<button id="btnGetData" class="btn btn-primary" >API Data</button>
		</p>

	</div>

	@include('layouts.footer')
	
</div>

@endsection

@section('pagescript')
<script>	
	//console.log(site_url);
	$(document).ready(function(){
		$("#btnGetData").click(function(){
			$.ajax({
				url: site_url+"api/dummyData", 
				type:'GET',
				success: function(result){
					//console.log(result); 
					// var resultObj = JSON.parse(result); // No need for this step if returned by laravel response->json() 
					//console.log(result.status);
					//console.log(result.data[0].page_content);
					result.data.forEach(function(value, index, array) {
						//console.log(value.page_content);
					});
				},
			});
		});
	});
</script>			
@endsection


@section('pagestyle')
<style>
	/**  Custom CSS for this page  */


</style>			
@endsection