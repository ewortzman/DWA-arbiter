<div class="container-fluid">
  <div class="row row-offcanvas row-offcanvas-left">
        
  	<!-- sidebar -->
    <div class="col-xs-4 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
    @yield(isset($role) ? 'sidebar-'.$role : 'sidebar')
    </div>
  	
    <!-- jumbotron -->
    <div class="col-xs-12 col-sm-10">
      @yield(isset($role) ? 'jumbotron-'.$role : 'jumbotron')
    </div>
  </div>
</div>