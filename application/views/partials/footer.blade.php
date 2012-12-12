
    <hr>
    <footer>
      <p>&copy; Company 2012</p>
    </footer>

  </div>
  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    @section('scripts')
      <!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
      {{ HTML::script('js/jquery.js') }}
      {{ HTML::script('js/bootstrap/bootstrap.min.js') }}
      {{ HTML::script('js/pickadate.min.js') }}
    @yield_section

  </body>
</html>
