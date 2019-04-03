<?php
/**
 * @package Hello_Karli
 * @version 1.0
 */
/*
Plugin Name: Hello Karli
Plugin URI: http://wordpress.org/extend/plugins/hello-karli/
Description: This is just a 'clone' of the Hello Dolly plugin that normally comes with WP sites. I decided to set this up as a general layout for what plugins with WP will look like. 
Author: Karli Sensibello
Version: 1.0
Author URI: http://www.sensibello
*/
function hello_karli_get_words() {
	/** These aren't lyrics, this is just a dummy */
	$words = "Hello, Karli
Karli likes to drink coffee
Karli wears a lot of black
Karli listened to the Jonas Brothers growing up
Karli likes to eat pasta
Karli likes to watch scary movies
Karli Karli Karli
Boop Boop Beep ";
	// Split code into lines 
	$lyrics = explode( "\n", $words );
	// And then randomly choose a line of words
	return wptexturize( $words[ mt_rand( 0, count( $words ) - 1 ) ] );
}
// This just echoes the chosen line, position it later
function hello_karli() {
	$chosen = hello_karli_get_words();
	echo "<p id='karli'>$chosen</p>";
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_karli' );
// We need some CSS to position the paragraph
function karli_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#karli {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'karli_css' );
?>
