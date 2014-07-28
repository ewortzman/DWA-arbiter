@section('content')
<div class="row row-offcanvas row-offcanvas-left">
      
	<!-- sidebar -->
  <div class="col-xs-4 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
  @yield('sidebar')
  </div>
	
  <!-- jumbotron -->
  <div class="col-xs-12 col-sm-10">
  	<div class="jumbotron">
    	<div class="container">
      @yield('jumbotron')
      </div>
    </div>
  </div>
</div>
@stop