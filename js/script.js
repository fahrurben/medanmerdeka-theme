// A $( document ).ready() block.
jQuery(document).ready(function( $ ) {
  console.log( "ready!" );
  $('#home-banner').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    autoPlay: 3000
  });

  // When the user scrolls the page, execute myFunction 
  window.onscroll = function() {menuSticky()};

  // Get the header
  var header = document.getElementById("site-navigation");

  // Get the offset position of the navbar
  var sticky = header.offsetTop;

  /**
   *  Add the sticky class to the header when you reach its scroll position. 
   *  Remove "sticky" when you leave the scroll position
  */
   function menuSticky() {
    if (window.pageYOffset >= sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }

});
