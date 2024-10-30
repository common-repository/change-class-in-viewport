=== Change class in viewport: create animations with pure CSS ===
Contributors: giuse
Tags: CSS effects, animations
Requires at least: 4.6
Tested up to: 6.4
Stable tag: 0.0.5
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

When an element of the page enters the viewport, it adds a CSS class to that element.

== Description ==

When a specific element of the page enters the viewport, it adds the CSS class "in-viewport" to that element.

When the same element goes out from the viewport it remove the CSS class "in-viewport" and adds the class "not-in-viewport".

To target the elements, you just need to assign them the CSS class "cciv-el".

It's useful to add your custom animations on scroll just with a few lines of CSS.

This is a plugin for CSS developers who want to add simple but effective animation only with pure CSS.

In case the user disables JavaScript, the body of the page will have the CSS class "cciv-no-script". Use it to don't show strange things when JavaScript is disabled.

The plugin is ultra light. It adds a few lines of pure JavaScript code in the footer and nothing else.

No additional HTTP requests, no additional queries to the database.

If you measure the performance with or without this plugin, you will not notice any difference.


This plugin is useful if:

- You know how to create an animation in pure CSS.
- You have the possibility to assign a CSS class to the element you want to animate.
- You have the possibility to add your custom CSS.


With the following few lines of pure CSS for example you can create a rotation effect.

.cciv-el{transition: 2s transform ease}
.cciv-el.in-viewport{transform:rotateY(0deg)}
.cciv-el.not-in-viewport{transform:rotateY(180deg)}
.cciv-no-script .cciv-el{transform:none !important}


You can read more about CSS animations and transitions on W3Schools:
https://www.w3schools.com/css/css3_animations.asp
https://www.w3schools.com/css/css3_transitions.asp


You can change the selector to target the elements that you want to animate using the filter 'cciv_el_selector'.
If for example instead of the CSS class .cciv-el you want something specific to your case, you can add this code in the functions.php of your child theme if any, or in a functional plugin:


`
add_filter( 'cciv_el_selector','my_cciv_selector' );
function my_cciv_selector( $selector ){
  return '#my-custom-id .my-custom-class'; //The elements will not be target anymore by .cciv-el but by what you specify here
}
`


Don't lose time any more with heavy jQuery effects, you need just a few lines of CSS, the rest is given by this plugin using few lines of 100% pure JavaScript inlined in the footer.

No performance loss, and no time loss if you have CSS skills.



== Changelog ==

= 0.0.5 =
* Checked: WordPress 6.4

= 0.0.4 =
* Added: Filter hook to execute animation only once.

= 0.0.3 =
* Added: Link in the page of plugins to a post that explains how it works

= 0.0.2 =
* Improved: Minified JavaScript

= 0.0.1 =
* First release
