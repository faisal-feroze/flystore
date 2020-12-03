(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  // faisal code //////////

  // $(document).ready(function() {
  //   $('#dataTable').dataTable({
  //     "pageLength": 20
  //   });
  // });



////////////relational ajax callll/ ///////////



$(document).on('change', '.division_change' ,function (e){
     var division_id =$(this.options[this.selectedIndex]).attr('data-division-id')
     var district_option_block = $(this).parent().next( ".col" ).find(".district_change");
     var optional = "<option value =' '>Select Division First</option>";
     $.ajax({
          url: '/fetch/district/'+division_id,
          type: 'get',
          dataType: 'json',
          success: function(response){
              if(response){
                district_option_block.html(response);
              }
              else{
                district_option_block.html(optional);
              }
            }
        });
})







})(jQuery); // End of use strict
