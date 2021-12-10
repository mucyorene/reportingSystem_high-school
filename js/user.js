
    $(document).ready(function(){
        $("#sett,#overlay,#hide,#hide2,#hide3,#hide4,#aft,#aft1,#aft2,#aft3,#overla").hide();
        $("#home").show(function(){
            $("#hover").css("background","#0771a8");

        });
        $("#uploads").show(function(){
            $("#hover2").css("background","#0771a8");
            $("#hover").css("background","#40b4fe");
            $("#home").hide();  
        });

         $("#user-profile").show(function(){
            $("#hover2").css("background","#40b4fe");
             $("#hover").css("background","#40b4fe");
              $("#hover3").css("background","#0771a8");
              $("#home").hide();  
        });
           $("#manage").show(function(){
            $("#hover2").css("background","#40b4fe");
             $("#hover").css("background","#40b4fe");
              $("#hover4").css("background","#0771a8");
              $("#home").hide();  
        });

            $("#space").show(function(){
            $("#hover2").css("background","#40b4fe");
             $("#hover").css("background","#40b4fe");
              $("#hover5").css("background","#0771a8");
              $("#home").hide();  
        });          
    
        $("#welcome").click(function(){
        $("#navigation").show("slow");
        });
        $("#setting").click(function(){
        $("#sett").slideToggle(function(){

            $("#focus").css("background","#e7eaeb");
        });
        });
       
        $("#changeit,.link").click(function(){
        $("#overlay").show(function(){
            $("#sett").hide();
            $("#gif").hide(4000);
        });
    });
        $("#upload").show(function(){

            $(this).css("background-color","#dce1e2");
        });

        $(".no").click(function(){

            $("#aft").slideToggle();
        });

          $(".no1").click(function(){

            $("#aft1").slideToggle();
        });

           $(".no2").click(function(){

            $("#aft2").slideToggle();
        });
             $(".no3").click(function(){

            $("#aft3").slideToggle();
        });

             $("#cp").click(function(){
                $("#overla").show(900);
             });

             $("#container #body #uploads table:odd")
    });
  