<?php
/*
Plugin Name: Change class in viewport
Description: It helps you to add your custom animations on scroll just with a few lines of CSS.
Author: Jose Mortellaro
Author URI: https://josemortellaro.com
Domain Path: /languages/
Text Domain: cciw
Version: 0.0.5
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

add_filter( 'body_class','eos_cciv_body_class' );
//Add body class.
function eos_cciv_body_class( $classes ){
  $classes[] = 'cciv-no-script';
  return $classes;
}
add_action( 'wp_footer','eos_cciv_js' );
function eos_cciv_js(){
  ?><script> function eos_cciv_inViewport(e){var b = e.getBoundingClientRect();return !(b.top > innerHeight || b.bottom < 0);} function eos_cciv_init(){ document.body.className = document.body.className.replace(' cciv-no-script','').replace('cciv-no-script','');
  var lastScrollTop = 0;
  document.addEventListener( 'scroll',function(){
    var st =  window.pageYOffset || document.documentElement.scrollTop,scrollDir = st > lastScrollTop ? 'down' : 'up',els = document.querySelectorAll("<?php echo esc_js( esc_attr( apply_filters( 'cciv_el_selector','.cciv-el') ) ); ?>"),n = 0; for(n;n<els.length;++n){
       lastScrollTop = st <= 0 ? 0 : st;
      if(eos_cciv_inViewport(els[n])){ els[n].className = els[n].className.replace(' not-in-viewport','').replace(' in-viewport','') + ' in-viewport'; } else { els[n].className = els[n].className.replace(' not-in-viewport','').replace(' in-viewport','') + ' not-in-viewport'; } } }); } eos_cciv_init(); </script><?php
}

add_filter( 'plugin_action_links_'.untrailingslashit( plugin_basename( __FILE__ ) ),function( $links ){
  $docu_link = '<a class="eos-dp-setts" href="https://josemortellaro.com/change-class-in-viewport-animations-with-pure-css/" target="_blank" rel="noopener">'.esc_html__( 'How it works','cciw' ).'</a>';
  array_push( $links, $docu_link );
  return $links;
} );
