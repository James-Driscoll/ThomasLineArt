jQuery(document).ready(function($) {


  $(".ranges a").hover(function(){

    console.log($(this).attr("href"));
  }, function(){
    console.log("I'm out!");
  });





});

