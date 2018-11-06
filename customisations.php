<?php
/**
 * Plugin Name: Forge Customisations
 * Plugin URI: https://www.forge.uk
 * Description: Add WordPress customisations including custom post types and taxonomies.
 * Version: 1.0
 * Author: Forge UK
 * Author URI: https://www.forge.uk
 */

namespace forge;

class Customisations
{
    public static function init()
    {
      add_action('init', array(__CLASS__, '_post_types'), 10);
	    add_action('init', array(__CLASS__, '_taxonomies'), 10);

	    
    }

    public static function _post_types()
    {
        /**
         * Custom Post Type Example
         */
        $labels = array(
            'name'               => _x('Portfolio', 'post type general name', 'forge'),
            'singular_name'      => _x('Portfolio', 'post type singular name', 'forge'),
            'menu_name'          => _x('Portfolio', 'admin menu', 'forge'),
            'name_admin_bar'     => _x('Portfolio', 'add new on admin bar', 'forge'),
            'add_new'            => _x('Add New', 'portfolio', 'forge'),
            'add_new_item'       => __('Add New Portfolio Item', 'forge'),
            'new_item'           => __('New Portfolio Item', 'forge'),
            'edit_item'          => __('Edit Portfolio Item', 'forge'),
            'view_item'          => __('View Portfolio Item', 'forge'),
            'all_items'          => __('All Portfolio Items', 'forge'),
            'search_items'       => __('Search Portfolio Items', 'forge'),
            'parent_item_colon'  => __('Parent Portfolio Item:', 'forge'),
            'not_found'          => __('No portfolio items found.', 'forge'),
            'not_found_in_trash' => __('No portfolio items found in bin.', 'forge'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'our-portfolio'),
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-star-filled',
            'menu_order'         => true,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        );

        register_post_type('portfolio', $args);
    }

    public static function _taxonomies()
    {
	    /**
	     * Custom Taxonomy Example
	     * For - Portfolio Post Type
	     */
	    $labels = array(
		    'name'              => _x('Sector', 'taxonomy general name'),
		    'singular_name'     => _x('Sector', 'taxonomy singular name'),
		    'search_items'      => __('Search Sectors'),
		    'all_items'         => __('All Sectors'),
		    'parent_item'       => __('Parent Sector'),
		    'parent_item_colon' => __('Parent Sector:'),
		    'edit_item'         => __('Edit Sector'),
		    'update_item'       => __('Update Sector'),
		    'add_new_item'      => __('Add New Sector'),
		    'new_item_name'     => __('New Sector Name'),
		    'menu_name'         => __('Sectors'),
	    );

	    $args = array(
		    'hierarchical'      => true,
		    'labels'            => $labels,
		    'show_ui'           => true,
		    'show_admin_column' => true,
		    'query_var'         => true,
		    'rewrite'           => false,
	    );

	    register_taxonomy('sector', 'portfolio', $args);
    }
}
Customisations::init();
