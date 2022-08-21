$(function(){
    $("#lol").click(function(){
      $(".cover").fadeIn("300");
    })
    $(".cover,.close").click(function(){
      $(".cover").fadeOut("300");
    })
    $(".contents").click(function(e){
      e.stopPropagation();
    })
  })

//   dropdown menu
$(document).ready(function(){
    $("db").click(function(){
      $("dropdown-content").toggleClass("show");
    });
  });

  // Add active class to the current button (highlight it)
  $(document).ready(function() {
    $(".srch").click(function () {
        $(".srch-d").removeClass("active");
        $(this).addClass("active");   
    });
    });