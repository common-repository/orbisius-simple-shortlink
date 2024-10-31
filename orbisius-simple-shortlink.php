<?php
/*
  Plugin Name: Orbisius Simple Shortlink
  Plugin URI:  http://orbisius.com/products/wordpress-plugins/orbisius-simple-shortlink/
  Description: Simple redirect to a post, page or a custom post type. Just link it as site.com/goto/123
  Version:     1.0.5
  Author:      Slavi Marinov | Orbisius
  Author URI:  http://orbisius.com
  Text Domain: orbisius-simple-shortlink
  Domain Path: /lang
 */
define('ORBISIUS_SIMPLE_SHORTLINK_MAIN_PLUGIN_FILE', __FILE__);
add_action('init', 'orb_club_short_link');

if (is_admin()) {
    include_once dirname(__FILE__) . '/orbisius-simple-shortlink-admin.php';
}

/**
 * This is supposed to set page not found page in case the ID is not valid or post doesn't exist or is not published.
 * @global type $wp_query
 * @see http://wordpress.stackexchange.com/questions/73738/how-do-i-programmatically-generate-a-404
 */
function orb_club_short_link_set_404()
{
    global $wp_query;

    if (!empty($wp_query)) {
        $wp_query->set_404();
        $wp_query->max_num_pages = 0;
    }
}

/**
 * Parses the REQUEST URL for a known variable.
 * The site must be using permalinks.
 */
function orb_club_short_link()
{
    if (preg_match('#/(?:goto|link|post|page|id2post|id2page)/[a-z]*(\d+)#si', $_SERVER['REQUEST_URI'], $m)) {
        $id = $m[1];
        $r = get_permalink($id);

        if (empty($r)) {
            add_action('wp', 'orb_club_short_link_set_404');
        } else {
            $params = $_GET;
            unset($params['apache_path']);

            if ( ! empty( $params ) ) {
                $r = add_query_arg( $params, $r ); // append any params e.g. utm ones
            }

            wp_safe_redirect($r);
            exit;
        }
    }
}
