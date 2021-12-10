  $(document).ready(function(){

    //hidding some division for documen ready first time
      //$("#menubar").hide();
      //$("#login").hide();
      $("#overlay").hide();
      $("#getup").hide();
      $("#rated").hide();
      
    //for showing creating account for new user ,then hide login,top
      $("#need").click(function(){
      $("#login").hide(500);
      $("#register").show(200);
      $("#top").hide();

    });
      //for hiding login&top div during signup
      $("#register").show(function(){
       $("#login").hide(500);
        $("#top").hide();
        $("#data").hide();
      });
    //for returning to home when user have account already
      $("#already").click(function(){

          $("#login").show(500);
          $("#register").hide(300);
          $("#top").show();

      });

      $("#login").show(function(){
        $("#data").hide();
      });
    
    // for showing recover password 
    $("#for").click(function(){
      $("#overlay").show(500);
    });

    //for select #background to focused and non focused form
    $(".yours").blur(function(){

      $(this).css("background-color","#dce1e2");
    
    });

    //for select #background to focused and non focused select
     $("#depend").blur(function(){

      $(this).css("background-color","#dce1e2");
    
    });

     //for showing menu bar
     $("#welcome").click(function(){
      $("#menubar").slideToggle(500);

     });

     //select choosing menu bag-colr when hover
   $("#choose").hover(function(){

      $(this).css("background-color","grey");
    
    });


     //select choosing menu bg-color when moseleave
   $("#choose").mouseleave(function(){

      $(this).css("background-color","#dce1e2");
    
    });
      //select choosing menu bag-colr when hover
   $("#aboutus").hover(function(){

      $(this).css("background-color","grey");
    
    });


     //select choosing menu bg-color when moseleave
   $("#aboutus").mouseleave(function(){

      $(this).css("background-color","#dce1e2");
    
    });
      //select choosing menu bag-colr when hover
   $("#Contactus").hover(function(){

      $(this).css("background-color","grey");
    
    });


     //select choosing menu bg-color when moseleave
   $("#Contactus").mouseleave(function(){

      $(this).css("background-color","#dce1e2");
    
    });
   

    //for showing div containing downloads
   $("#getdown").click(function(){
    $(this).hide();
    $("#getup").show();
    $("#rated").show(500);
    $("#login").hide();

   });
   //for hiding div containing downloads
   $("#getup").click(function(){
    $(this).hide();
    $("#getdown").show();
    $("#rated").hide();
    $("#login").show();

   });

   //for hiding div login during about us page
   $("#about").show(function(){
    $("#login").hide();
    $("#getdown").hide();
    $("#data").hide();

   });

   //for hiding div login during about us page
   $("#about").show(function(){
    $("#login").hide();
    $("#getdown").hide();
   });
   //for hiding div login during contact us page
   $("#contact").show(function(){
    $("#login").hide();
    $("#getdown").hide();
     $("#data").hide();
   });

   $("#close").click(function(){
    $("#overlay").hide();
   });

});


//ulpoading and downloading center
//realised for s6 final project 2015-2016 by darius mugwaneza
////start time:12/jan/2015 till ?????????
//end time:still in progress
//option:computer and electronics/webdesign
//at ecole technique saint kizito save



