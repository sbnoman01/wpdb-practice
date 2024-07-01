<?php
/*
  Plugin Name: WPDB Practice
  Version: 1.0
  Requires at least: 5.0
  Requires PHP: 5.2
  Tested up to: 6.5
  Author: sbnoman01
  Text Domain: wpdb-practice
*/

// include only file
if (!defined('ABSPATH')) {
    die('Do not open this file directly.');
}


// function debug_($arr)
// {
//     echo '<pre>';

//     print_r($arr);

//     echo '</pre>';
// }

add_action('wp_body_open', function () {

    global $wpdb;

    // get_post
    $sql = "SELECT post_title FROM `wp_posts` WHERE post_type = 'post' AND post_status = 'publish'";
    
    // get post category
    $sql = "SELECT wp_terms.name, wp_terms.slug, wp_terms.term_id FROM wp_term_taxonomy JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id WHERE wp_term_taxonomy.taxonomy = 'category'";

    // get post by term id
    $term_id = 5;
    $sql = "SELECT * FROM wp_posts p RIGHT JOIN wp_term_relationships t ON p.id = t.object_id WHERE t.term_taxonomy_id = $term_id AND p.post_type = 'post' AND p.post_status = 'publish'";

    $res = $wpdb->get_results($sql);

    debug($res);

});