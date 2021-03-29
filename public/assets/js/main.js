(function($) {
  "use strict";
 
  jQuery(document).ready(function(){
    /*-------------------------------------------
    js DataTable Active
    --------------------------------------------- */
    $('.DataTable').DataTable();

    // mobile menu active code 
    $('.menu-bar').on('click', function(e) {
      e.preventDefault();
      $('.main-sidebar').toggleClass('show');
      $('.body-overlay').toggleClass('active');
    });
    $('.body-overlay').on('click', function() {
      $('.main-sidebar').removeClass('show');
      $(this).removeClass('active');
    });
    
    /*-------------------------------------------
    metismenu Active
    --------------------------------------------- */
    $("#metismenu").metisMenu();
    /*-------------------------------------------
    datepicker Active
    --------------------------------------------- */
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    /*-------------------------------------------
    toggle-password Active
    --------------------------------------------- */
    $(".toggle-password").on('click',function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $(this).parent().find("input");
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    
    /*-------------------------------------------
    js counterUp
    --------------------------------------------- */
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });

  });



})(jQuery);