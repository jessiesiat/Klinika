$(function(){
      
      //$("#psearch input").suggestion({
      //  url:"patient/search"
      //});

      $('#load-content').click(function(e){
          e.preventDefault();
          $.get(BASE + '/content', function(data){
            $('#content').html(data);
          });
      });

      $("a.select").click(function(e)
      {
      	e.preventDefault();
      	id = $(this).attr('id');
      	idname = '#diagnose'+id;
      	$("#"+id).hide();
      	$(idname).show('slow');
      });
      
});
