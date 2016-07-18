function initDocJs(faIcon, title){
  $(".moduleLabel").html(
        "<i class='fa fa-binoculars'></i> La doc :"+
        " <span class='text-red'><i class='fa fa-"+faIcon+"'></i> "+title+"</span>");

  $(".carousel-control").click(function(){
    var top = $("#docCarousel").position().top-30;
    $(".my-main-container").animate({ scrollTop: top, }, 100 );
  });

  $(".btn-carousel-previous").click(function(){ //toastr.success('success!'); console.log("CAROUSEL CLICK");
      var top = $("#docCarousel").position().top-30;
      $(".my-main-container").animate({ scrollTop: top, }, 100 );
      setTimeout(function(){ $(".carousel-control.left").click(); }, 500);
    });
   $(".btn-carousel-next").click(function(){ //toastr.success('success!'); console.log("CAROUSEL CLICK");
      var top = $("#docCarousel").position().top-30;
      $(".my-main-container").animate({ scrollTop: top, }, 100 );
      setTimeout(function(){ $(".carousel-control.right").click(); }, 500);
    });
}