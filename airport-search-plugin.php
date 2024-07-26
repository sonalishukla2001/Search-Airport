<?php
/**
 * Plugin Name: Airport Search Plugin
 * Description: A plugin to search for airports using an autocomplete feature without AJAX.
 * Version: 1.0
 * Author: Your Name
 */

// Enqueue scripts and styles
function airport_search_enqueue_scripts() {
    wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'), null, true);
    wp_enqueue_script('airport-search-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery', 'jquery-ui'), null, true);
    
    // Pass the path of the JSON file to JavaScript
    wp_localize_script('airport-search-script', 'airportSearch', array(
        'jsonFile' => plugin_dir_url(__FILE__) . 'airports.json'
    ));
}
add_action('wp_enqueue_scripts', 'airport_search_enqueue_scripts');

// Create shortcode for the search form
function airport_search_shortcode() {
    ob_start(); ?>
    <label for="airport-search">Search for an airport: </label>
    <input id="airport-search" type="text">
    <input id="airport-search-hidden" type="hidden">
    <?php return ob_get_clean();
}
add_shortcode('airport_search', 'airport_search_shortcode');
