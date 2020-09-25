
$(document).ready(function(){

    $("#notification-btn").click(function(){
      $(".notification-menu").toggle();
    });

    $('#back').click(function(){

      window.location.href = "/library";
    });

    $('#searchStore').keyup(function()
    {
      console.log($('#searchStore').val());
       // console.log("/ajaxmethod/"+$('#searchStore').val());
        $.ajax({
          url: "/ajaxmethod/all/"+$('#searchStore').val(),
          method: 'GET',
          success:function(data)
          {
             $('#game-list-id').html(data);
          }

        });
    });

    $('#searchLibrary').keyup(function()
    {
      console.log($('#searchLibrary').val());
       // console.log("/ajaxmethod/"+$('#searchStore').val());
        $.ajax({
          url: "/ajaxmethod/lib/"+$('#searchLibrary').val(),
          method: 'GET',
          success:function(data)
          {
             $('#game-list-id').html(data);
          }

        });
    });
    


  });
