$(document).ready(function(){
  $(".item img").hover(function(){    
  	var id = this.id;
  	if(id =="colour")
  		$(this).attr("id","");
  	else
  		$(this).attr("id","colour");
    $(".item img").toggleClass("grey");
  });
});
