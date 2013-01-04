$(function(){
      
  if($('.global-notice').html().length > 0){
    $('.global-notice').fadeIn();

    setTimeout(function(){
      $('.global-notice').fadeOut('slow');
    }, 8000);

    $('.global-notice').live('click', function(){
      $('.global-notice').slideUp();
    });

  }

  var saving = false;

  function saving_toggle(){
    if(saving){
      $('.global-saving').hide();
      saving = false;
    }else{
      $('.global-saving').show();
      saving = true;
    }
  }

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
