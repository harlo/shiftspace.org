<?php

//
//  Custom Child Theme Functions for ShiftSpace.org
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

function add_blueprint() {

 // Include main screen styles css
 $content = "\t";
 $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
 $content .= get_bloginfo('stylesheet_directory');
 $content .= '/css/blueprint/screen.css';
 $content .= "\" media=\"screen, projection\" />";
 $content .= "\n";

 // Include print css
 $content .= "\t";
 $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
 $content .= get_bloginfo('stylesheet_directory');
 $content .= '/css/blueprint/print.css';
 $content .= "\" media=\"print\" />";
 $content .= "\n";
 
 // Include IE-specific CSS fix
 $content .= "\t";
 $content .= "<!--[if lt IE 8]><link rel=\"stylesheet\" type=\"text/css\" href=\"";
 $content .= get_bloginfo('stylesheet_directory');
 $content .= '/css/blueprint/ie.css';
 $content .= "\" /><![endif]-->";
 $content .= "\n";
 
 // Include the original style.cc again so it overides the blueprint code
 // ideally we would've also found a way to remove the first reference to styles.css, but I couldn't find how
 $content .= "\t";
 $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
 $content .= get_bloginfo('stylesheet_url');
 $content .= "'\" media=\"screen, projection\" />";
 $content .= "\n";
 
 // Echo the whole thing
 echo $content;
}

add_action ('wp_head', 'add_blueprint');

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'Home',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
	return $args;
}

add_filter('wp_page_menu_args','childtheme_menu_args');

?>