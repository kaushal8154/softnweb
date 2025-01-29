<div id="siteheader" class="col-sm-12">	

	<img src="{{ asset('images/laravellogo.png') }}" height="80"  />

	<span class="float-end" >
		@if (Auth::check())
			<a href="{{ route('logout') }}" >Log Out</a>				
		@endif
	</span>
</div>