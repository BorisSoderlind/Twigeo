<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post_example() { 
	// creating (registering) the custom type 
	register_post_type( 'case_posts', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Cases', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Case', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Cases', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add a new case', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is used to create cases', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-slides', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'case_posts', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'case_posts', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'case_cat' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'case_tag' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_example');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	// register_taxonomy( 'case_cat', 
	// 	array('case_posts'), /* if you change the name of register_post_type( 'case_posts', then you have to change this */
	// 	array('hierarchical' => true,     /* if this is true, it acts like categories */
	// 		'labels' => array(
	// 			'name' => __( 'Case Categories', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Case Category', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Case Categories', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Case Categories', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Case Category', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Case Category:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Case Category', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Case Category', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Case Category', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Case Category Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true, 
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		'rewrite' => array( 'slug' => 'custom-slug' ),
	// 	)
	// );
	
	// now let's add custom tags (these act like categories)
	// register_taxonomy( 'case_tag', 
	// 	array('case_posts'), /* if you change the name of register_post_type( 'case_posts', then you have to change this */
	// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
	// 		'labels' => array(
	// 			'name' => __( 'Case Tags', 'bonestheme' ), /* name of the custom taxonomy */
	// 			'singular_name' => __( 'Case Tag', 'bonestheme' ), /* single taxonomy name */
	// 			'search_items' =>  __( 'Search Case Tags', 'bonestheme' ), /* search title for taxomony */
	// 			'all_items' => __( 'All Case Tags', 'bonestheme' ), /* all title for taxonomies */
	// 			'parent_item' => __( 'Parent Case Tag', 'bonestheme' ), /* parent title for taxonomy */
	// 			'parent_item_colon' => __( 'Parent Case Tag:', 'bonestheme' ), /* parent taxonomy title */
	// 			'edit_item' => __( 'Edit Case Tag', 'bonestheme' ), /* edit custom taxonomy title */
	// 			'update_item' => __( 'Update Case Tag', 'bonestheme' ), /* update title for taxonomy */
	// 			'add_new_item' => __( 'Add New Case Tag', 'bonestheme' ), /* add new title for taxonomy */
	// 			'new_item_name' => __( 'New Case Tag Name', 'bonestheme' ) /* name title for taxonomy */
	// 		),
	// 		'show_admin_column' => true,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 	)
	// );
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	


// Testimonial post type


// let's create the function for the custom type
function testimonial_post() { 
	// creating (registering) the custom type 
	register_post_type( 'testimonial_posts', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Testimonials', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Testimonial', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Testimonials', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add a new Testimonial', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is used to create Testimonials', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-quote', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'Testimonial_posts', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Testimonial_posts', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'testimonial_post');


// Team post type

// let's create the function for the custom type
function team_post() { 
	// creating (registering) the custom type 
	register_post_type( 'team_posts', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Team', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Team', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Teams', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add a new Team', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is used to create Teams', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-groups', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'team_posts', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'team_posts', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'team_post');
	

// News post type


// let's create the function for the custom type
function news_post() { 
	// creating (registering) the custom type 
	register_post_type( 'news_posts', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'News', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'News', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All News', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add a new News', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is used to create News', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-format-aside', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'news_posts', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'News_posts', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'news_post');

	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'news_cat', 
		array('news_posts'), /* if you change the name of register_post_type( 'news_posts', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'news Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'news Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search news Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All news Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent news Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent news Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit news Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update news Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New news Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New news Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'news_tag', 
		array('news_posts'), /* if you change the name of register_post_type( 'news_posts', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'news Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'news Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search news Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All news Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent news Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent news Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit news Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update news Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New news Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New news Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
?>
