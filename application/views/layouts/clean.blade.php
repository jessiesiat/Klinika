@include('partials.header')


<div id="holder">

  <div class="container-fluid body">

    <div class="row-fluid" id="my-header">
      <div class="span7">
        <h3 class="prod_name"><a href="/laravel">Klinika</a>  <small>A Clinic Management Software</small></h3>

      </div>
      <div class="span5">
        <form action="{{ action('patient.search') }}" method="post" class="pull-right top-search">
          <input type="text" name="searchquery" value="{{ Input::old('searchquery') }}" class="search-query" placeholder="Search Patient">
          <button type="submit" class="btn my-btn-round"><i class="icon-search"></i></button>
        </form>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span3">
        <div class="sidebar-nav">
        <ul class="my-left-nav">
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('patient', 'Patients') }}</li>
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('appointment', 'Appointments') }}</li>
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('billing', 'Patient Billing') }}</li>
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('inventory', 'Inventory') }}</li>
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('medicine', 'Medicines') }}</li>
          <li><i class="icon-chevron-right"></i>{{ HTML::link_to_action('supplier', 'Suppliers') }}</li>
        </ul>
        </div>
      </div>
      
      @yield('content') 
      
    </div>

@include('partials.footer')