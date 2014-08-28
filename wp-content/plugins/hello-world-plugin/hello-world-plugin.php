<?php  
/*  
  Plugin Name: Hello world plugin By tinkesh  
  Plugin URI: http://localhost/wordpress/  
  Description: Add HTML snippets to posts and/or page footer.  
  Version: 0.1  
  Author: By Tinkesh
  Disclaimer: No warranty, use this in your own risk.  
*/  

add_action('wp_footer', 'hello_world_plugin_wp_footer'); 
	
function hello_world_plugin_wp_footer() {  
    echo '<div>Hello world! '. get_option('blogname') .'</div>';  
} 