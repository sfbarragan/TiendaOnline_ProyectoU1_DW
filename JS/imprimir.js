$(document).ready(function(){
    $('.print').click(function(){
        $("button").hide();
        $("pag-menu").hide();
        $("pag-footer").hide();
        window.print();
      $("button").show();
      $("pag-menu").show();
        $("pag-footer").show();
    });
    
  });