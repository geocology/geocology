<?php

// http://codex.wordpress.org/Post_Thumbnails
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

//http://wordpress.org/support/topic/360029
add_image_size( 'project-thumbnail', '375', '332', true );
add_image_size( 'project-medium', '720', '720', false );
add_image_size( 'project-big', '646', '9999', false );

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'geo_project',
		array(
			'labels' => array(
				'name' => __('Projects'),
				'singular_name' => __('Project'),
				'add_new' => __('Add New', 'project'),
				'add_new_item' => __('Add New Project'),
				'edit_item' => __('Edit Project'),
				'new_item' => __('New Project'),
				'all_items' => __('All Projects'),
				'view_item' => __('View Project'),
				'search_items' => __('Search Projects'),
				'not_found' =>  __('No projects found'),
				'not_found_in_trash' => __('No projects found in Trash'),
				'menu_name' => 'Projects'
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'projects'),
		'supports' => array('title','editor','thumbnail','excerpt','custom-fields')
		)
	);
}

register_taxonomy ( 'display', 
					'geo_project', 
					array(
						'hierarchical' => false, 
						'label' => 'display option', 
						'singular_label' => 'display option',
						'rewrite' => true,
						'query_var' => true)
				);
				
register_taxonomy ( 'status', 
					'geo_project', 
					array(
						'hierarchical' => false, 
						'label' => 'project status', 
						'singular_label' => 'project status', 
						'rewrite' => true,
						'query_var' => true)
				);

?>