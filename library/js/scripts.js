  document.querySelector('#triangle').addEventListener('click', function() {
    this.classList.toggle('rotated');
  });

// jQuery functions
jQuery(document).ready(function($) {

// Header text animation
  $(".fade").animate({
    "opacity": "1"
  }, "slow");

// Give class to navlinks when they are clicked
  $(".menu-item").click(function() {  //use a class, since your ID gets mangled
    $(this).addClass("active");      //add the class to the clicked element
  });


// Scroll to top function
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 400,
    //grab the "back to top" link
    $back_to_top = $('.scrolltotop');

  //smooth scroll to top
  $back_to_top.on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0 ,
      }, scroll_top_duration
    );
  });


// Smooth scroll for navbar links
  $('.menu-item a[href*="#"]:not([href="#"])').click(function() {
        $('#bs-example-navbar-collapse-1').toggleClass('in');
    $('#triangle').toggleClass('rotated');
    $('.navbar-toggle').toggleClass('collapsed');
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });


// Mobile animation
  $(".menu-item").click(function(){
    $('#bs-example-navbar-collapse-1').toggleClass('in');
    $('#triangle').toggleClass('rotated');
    $('.navbar-toggle').toggleClass('collapsed');}
  );

// Add swipe function to carousel
$(".carousel").swiperight(function() {
    $(this).carousel('prev');
});
$(".carousel").swipeleft(function() {  
    $(this).carousel('next');
});

}); /* end of jQuery */


// Javascript

  // Shirnk logo
  function init() {
    window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
          shrinkOn = 20,
          header = document.querySelector("header");
      if (distanceY > shrinkOn) {
        header.setAttribute("class","smaller");
      } else {
          header.removeAttribute("class");
      }
    });
  }
  window.onload = init();
