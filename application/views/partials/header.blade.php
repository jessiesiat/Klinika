<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    @section('styles')
      {{ HTML::style('css/bootstrap.css') }}
      {{ HTML::style('css/bootstrap-responsive.css') }}
      {{ HTML::style('css/app.css') }}
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
      <style type="text/css">
      body{ 
        margin-top: 35px;
      }
      </style>
    @yield_section

    <script type="text/javascript">
        var BASE = "<?php echo URL::base(); ?>";
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


  </head>
  
<body>
  
  <!-- Navbar
    ================================================== -->
  
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="{{ URL::to('/') }}" title="Happy Clinic">HC</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              @if(Auth::check())
                   Today is {{ date('Y') }}, logged in as {{ Auth::user()->username }} | {{ HTML::link('logout', 'Logout') }}
              @endif
            </p>
            <ul class="nav">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  <li>{{ HTML::link_to_action('patient', 'Patients') }}</li>
                  <li>{{ HTML::link_to_action('appointment', 'Appointments') }}</li>
                  <li>{{ HTML::link_to_action('inventory', 'Inventory') }}</li>
                  <li>{{ HTML::link_to_action('medicine', 'Medicines') }}</li>
                  <li>{{ HTML::link_to_action('supplier', 'Supplier') }}</li>
                  <li>{{ HTML::link_to_action('company', 'Company') }}</li>
                  <li>{{ HTML::link_to_action('service', 'Services') }}</li>
                </ul>
              </li>
              <li>{{ HTML::link_to_action('billing', 'Billing') }}</li>
              <li><a href="{{ action('user') }}">Users</a></li>
              <li><a href="{{ URL::to('userguide/home') }}">Docs</a></li>
            </ul>
          </div><!--/.nav-collapse -->
      </div>
    </div>
  </div> 
