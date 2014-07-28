@section('content')
<div class="row row-offcanvas row-offcanvas-left">
      
	<!-- sidebar -->
  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
  @yield('sidebar')
  </div>
	
  <!-- jumbotron -->
  <div class="col-xs-12 col-sm-9">
  	<div class="jumbotron">
    	<div class="container">
      @yield('jumbotron')
      </div>
    </div>
  </div>
</div>
@stop