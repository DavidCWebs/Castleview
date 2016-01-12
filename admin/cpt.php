<?php
/**
 * The file that defines the custom post types and custom taxonomies for this plugin
 *
 * @link       http://carawebs.com/plugins/carawebs-cpt
 * @since      1.0.0
 *
 * @package    Staff_Area
 * @subpackage Staff_Area/includes
 */
namespace Castleview\Admin;

if( !defined('WPINC') ) exit( 'No direct access permitted' );

/**
 * Register Custom Post Types
 *
 */
class CPT {

  /**
  * Register 'project' custom post type
  *
  *
  * @return void
  */
  public function project_init() {

    $labels = [
      'name'                => _x( 'Projects', 'Post Type General Name', 'carawebs-cpt' ),
      'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'carawebs-cpt' ),
      'menu_name'           => __( 'Projects', 'carawebs-cpt' ),
      'name_admin_bar'      => __( 'Project', 'carawebs-cpt' ),
      'parent_item_colon'   => __( 'Parent Project:', 'carawebs-cpt' ),
      'all_items'           => __( 'All Projects', 'carawebs-cpt' ),
      'add_new_item'        => __( 'Add New Project', 'carawebs-cpt' ),
      'add_new'             => __( 'Add New', 'carawebs-cpt' ),
      'new_item'            => __( 'New Project', 'carawebs-cpt' ),
      'edit_item'           => __( 'Edit Project', 'carawebs-cpt' ),
      'update_item'         => __( 'Update Project', 'carawebs-cpt' ),
      'view_item'           => __( 'View Project', 'carawebs-cpt' ),
      'search_items'        => __( 'Search Projects', 'carawebs-cpt' ),
      'not_found'           => __( 'Not found', 'carawebs-cpt' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'carawebs-cpt' ),

    ];

    register_post_type( 'project', array(
      'label'               => __( 'Project', 'carawebs-cpt' ),
      'description'         => __( 'Project posts', 'carawebs-cpt' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_icon'					 => 'dashicons-media-document',
      'menu_position'       => 5,
      'show_in_admin_bar'   => true,
      'show_in_nav_menus'   => true,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      )
    );

  }

  /**
  * Custom messages for the Project Custom Post Type
  *
  * @param  array $messages [description]
  * @return array $messages [description]
  */
  public function project_updated_messages( $messages ) {

    global $post;

    $permalink = get_permalink( $post );

    $messages['staff_resource'] = array(
      0 => '', // Unused. Messages start at index 1.
      1 => sprintf( __('Project updated. <a target="_blank" href="%s">View staff resource</a>', 'carawebs-cpt'), esc_url( $permalink ) ),
      2 => __('Custom field updated.', 'carawebs-cpt'),
      3 => __('Custom field deleted.', 'carawebs-cpt'),
      4 => __('Project updated.', 'carawebs-cpt'),
      /* translators: %s: date and time of the revision */
      5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s', 'carawebs-cpt'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Project published. <a href="%s">View staff resource</a>', 'carawebs-cpt'), esc_url( $permalink ) ),
      7 => __('Project saved.', 'carawebs-cpt'),
      8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview staff resource</a>', 'carawebs-cpt'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
      9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview staff resource</a>', 'carawebs-cpt'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
      10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview staff resource</a>', 'carawebs-cpt'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;

  }

  public function project_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'carawebs-cpt' ),
      'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'carawebs-cpt' ),
      'menu_name'                  => __( 'Project Category', 'carawebs-cpt' ),
      'all_items'                  => __( 'All Project Categories', 'carawebs-cpt' ),
      'parent_item'                => __( 'Parent Project Category', 'carawebs-cpt' ),
      'parent_item_colon'          => __( 'Parent Project Category:', 'carawebs-cpt' ),
      'new_item_name'              => __( 'New Project Category', 'carawebs-cpt' ),
      'add_new_item'               => __( 'Add New Project Category', 'carawebs-cpt' ),
      'edit_item'                  => __( 'Edit Project Category', 'carawebs-cpt' ),
      'update_item'                => __( 'Update Project Category', 'carawebs-cpt' ),
      'view_item'                  => __( 'View Project Category', 'carawebs-cpt' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'carawebs-cpt' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'carawebs-cpt' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'carawebs-cpt' ),
      'popular_items'              => __( 'Popular Project Categories', 'carawebs-cpt' ),
      'search_items'               => __( 'Search Project Categories', 'carawebs-cpt' ),
      'not_found'                  => __( 'Not Found', 'carawebs-cpt' ),
    );

    $rewrite = array(
  		'slug'                       => 'project-category',
  		'with_front'                 => true,
  		'hierarchical'               => false,
  	);

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
      'rewrite'                    => $rewrite,
    );

    register_taxonomy( 'project-category', array( 'project' ), $args );

  }

  public function service_init() {

    $labels = [
      'name'                => _x( 'Services', 'Post Type General Name', 'carawebs-cpt' ),
      'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'carawebs-cpt' ),
      'menu_name'           => __( 'Services', 'carawebs-cpt' ),
      'name_admin_bar'      => __( 'Service', 'carawebs-cpt' ),
      'parent_item_colon'   => __( 'Parent Service:', 'carawebs-cpt' ),
      'all_items'           => __( 'All Services', 'carawebs-cpt' ),
      'add_new_item'        => __( 'Add New Service', 'carawebs-cpt' ),
      'add_new'             => __( 'Add New', 'carawebs-cpt' ),
      'new_item'            => __( 'New Service', 'carawebs-cpt' ),
      'edit_item'           => __( 'Edit Service', 'carawebs-cpt' ),
      'update_item'         => __( 'Update Service', 'carawebs-cpt' ),
      'view_item'           => __( 'View Service', 'carawebs-cpt' ),
      'search_items'        => __( 'Search Services', 'carawebs-cpt' ),
      'not_found'           => __( 'Not found', 'carawebs-cpt' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'carawebs-cpt' ),

    ];

    register_post_type( 'service', array(
      'label'               => __( 'Service', 'carawebs-cpt' ),
      'description'         => __( 'Service posts', 'carawebs-cpt' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_icon'					 => 'dashicons-hammer',
      'menu_position'       => 5,
      'show_in_admin_bar'   => true,
      'show_in_nav_menus'   => true,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      )
    );

  }

  /**
  * Custom messages for the Service Custom Post Type
  *
  * @param  array $messages [description]
  * @return array $messages [description]
  */
  public function service_updated_messages( $messages ) {

    global $post;

    $permalink = get_permalink( $post );

    $messages['staff_resource'] = array(
      0 => '', // Unused. Messages start at index 1.
      1 => sprintf( __('Service updated. <a target="_blank" href="%s">View Service</a>', 'carawebs-cpt'), esc_url( $permalink ) ),
      2 => __('Custom field updated.', 'carawebs-cpt'),
      3 => __('Custom field deleted.', 'carawebs-cpt'),
      4 => __('Service updated.', 'carawebs-cpt'),
      /* translators: %s: date and time of the revision */
      5 => isset($_GET['revision']) ? sprintf( __('Service restored to revision from %s', 'carawebs-cpt'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Service published. <a href="%s">View Service</a>', 'carawebs-cpt'), esc_url( $permalink ) ),
      7 => __('Service saved.', 'carawebs-cpt'),
      8 => sprintf( __('Service submitted. <a target="_blank" href="%s">Preview Service</a>', 'carawebs-cpt'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
      9 => sprintf( __('Service scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Service</a>', 'carawebs-cpt'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
      10 => sprintf( __('Service draft updated. <a target="_blank" href="%s">Preview Service</a>', 'carawebs-cpt'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;

  }

}
