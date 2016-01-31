<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test technique Codepi</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/concerts.css')}}" media="all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/dataTables.bootstrap.css')}}" media="all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/dataTables.responsive.css')}}" media="all" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD0HX0kSeMKR_QWBYx-HE-6Wui9zL66ePU"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}" ></script>
        <script src="{{asset('assets/js/dataTables.bootstrap.min.js')}}" ></script>
        <script src="{{asset('assets/js/jquery.twbsPagination.min.js')}}" ></script>
    </head>

    <body style="margin:0;padding:0">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="container">
            <nav class="navbar navbar-default">
              <img src="{{asset('assets/images/logo_codepi.png')}}">
            </nav>
            <hr>
            @yield('content')
        </div>
      </div>
      <div class="col-md-1"></div>

    </body>
</html>
