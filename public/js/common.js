
$(document).ready(function(){
    $("#notification-btn").click(function(){
      console.log("here");
      $(".notification-menu").toggle();
    });

    $("#cart-btn").click(function(){

      console.log("here");
      $(".cart-menu").toggle();
      $.ajax({
        url: "/ajaxmethod/showcartitems/",
        method: 'GET',
        success:function(data)
        {
           $('.cart-menu').html(data);
           setTimeout(bindDeleteEvent(), 1000);
           setTimeout(bindCheckoutEvent(),1000);
        },
        error:function(data)
        {
           $('.cart-menu').html(data);
        }

      });

    });

    $('.cart-btn').click(function(){
        //console.log();
        $.ajax({
          url: "/ajaxmethod/cart/"+this.id,
          method: 'GET',
          success:function(data)
          {
             $('.cart-btn').html(data);
          },
          error:function(data)
          {
             $('.cart-btn').html(data);
          }

        });
    });

    
  });

  function bindDeleteEvent(){
    $('#removeallbtn').click(function(){
      console.log("here");
      $.ajax({
        url: "/ajaxmethod/updatecart/1",
        method: 'GET',
        success:function(data)
        {
           $('.cart-btn').html(data);
        },
        error:function(data)
        {
           $('.cart-btn').html(data);
        }

      });

    });

   

  }

  function bindCheckoutEvent()
  {
    $('#checkoutbtn').click(function(){
      console.log("here");
      $.ajax({
        url: "/ajaxmethod/updatecart/0",
        method: 'GET',
        success:function(data)
        {
           $('.cart-btn').html(data);
        },
        error:function(data)
        {
           $('.cart-btn').html(data);
        }

      });

    });


  }