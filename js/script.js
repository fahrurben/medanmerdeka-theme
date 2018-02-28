// A $( document ).ready() block.
jQuery(document).ready(function( $ ) {
  console.log( "ready!" );
  $('#home-banner').flickity({
    // options
    cellAlign: 'left',
    contain: true,
    autoPlay: 3000
  });
});