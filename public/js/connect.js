
$(document).ready(function(){

    $('.addfriendbtn').click(function(){
        console.log("Add Friend! " + this.id);
        $.ajax({
            url: "/ajaxmethod/addfriend/"+this.id,
            method: 'GET',
            success:function(data)
            {
               $("#addjs").html(data);
               
            },
            error:function(data)
            {
               $("#addjs").html(data);
            }
    
          });
    });

    $('.unfriendbtn').click(function(){
        console.log("Unfriend !"+ this.id);
        $.ajax({
         url: "/ajaxmethod/removefriend/"+this.id,
         method: 'GET',
         success:function(data)
         {
            $("#addjs").html(data);
            
         },
         error:function(data)
         {
            $("#addjs").html(data);
         }
 
       });
    });

    $('.messagefriendbtn').click(function(){
        console.log("Message Friend !"+ this.id);
      
    });

   
    $('.cancelrequestbtn').click(function(){
        console.log("Cancel Friend Request !"+ this.id);
        $.ajax({
         url: "/ajaxmethod/removefriend/"+this.id,
         method: 'GET',
         success:function(data)
         {
            $("#addjs").html(data);
            
         },
         error:function(data)
         {
            $("#addjs").html(data);
         }
 
       });
    });


    $('.acceptrequestbtn').click(function(){
      console.log("Accept Friend Request !"+ this.id);
      $.ajax({
       url: "/ajaxmethod/acceptfriend/"+this.id,
       method: 'GET',
       success:function(data)
       {
          $("#addjs").html(data);
          
       },
       error:function(data)
       {
          $("#addjs").html(data);
       }

     });
  });
});