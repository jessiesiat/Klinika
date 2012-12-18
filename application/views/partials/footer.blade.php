
    <footer>
      <hr />
      <span>&copy; 2012 PSRI</span>
    </footer>

  </div> <!-- End of ID container-fluid -->
  
</div> <!-- End of ID Holder -->

  @include('partials.notify')
  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    @section('scripts')
      <!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
      {{ HTML::script('js/jquery.js') }}
      {{ HTML::script('js/bootstrap/bootstrap.min.js') }}
      {{ HTML::script('js/pickadate.min.js') }}
      {{ HTML::script('js/custom.js') }}
    @yield_section

  </body>
</html>
