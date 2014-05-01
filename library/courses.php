<?php
/**
 * Add courses taxonomie
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

// Register Courses Taxonomy
function courses()
{

    $labels = array(
        'name' => _x('Courses', 'Courses', 'text_domain'),
        'singular_name' => _x('Course', 'Course', 'text_domain'),
        'menu_name' => __('Courses', 'text_domain'),
        'all_items' => __('All Courses', 'text_domain'),
        'parent_item' => __('Previous Course', 'text_domain'),
        'parent_item_colon' => __('Parent Course:', 'text_domain'),
        'new_item_name' => __('New Course', 'text_domain'),
        'add_new_item' => __('Add Course', 'text_domain'),
        'edit_item' => __('Edit Course', 'text_domain'),
        'update_item' => __('Update Course', 'text_domain'),
        'separate_items_with_commas' => __('Separate Course with commas', 'text_domain'),
        'search_items' => __('Search Course', 'text_domain'),
        'add_or_remove_items' => __('Add or remove Course', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used Course', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain'),
    );
    $rewrite = array(
        'slug' => 'courses',
        'with_front' => true,
        'hierarchical' => true,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => $rewrite,
    );

    register_taxonomy('courses', 'course_list', $args);

}
// Hook into the 'init' action
add_action('init', 'courses', 0);


// Register Courses list Post Type
function course_list()
{

	$labels = array(
		'name' => _x('Course Version', 'Post Type General Name', 'text_domain'),
		'singular_name' => _x('Course Version', 'Post Type Singular Name', 'text_domain'),
		'menu_name' => __('Courses', 'text_domain'),
		'parent_item_colon' => __('Previous Course Version:', 'text_domain'),
		'all_items' => __('All Course Version', 'text_domain'),
		'view_item' => __('View Course Version', 'text_domain'),
		'add_new_item' => __('Add New Course Version', 'text_domain'),
		'add_new' => __('Add a Course Version', 'text_domain'),
		'edit_item' => __('Edit Course Version', 'text_domain'),
		'update_item' => __('Update Course Version', 'text_domain'),
		'search_items' => __('Search Course Version', 'text_domain'),
		'not_found' => __('Not found', 'text_domain'),
		'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
	);
	$rewrite = array(
		'slug' => 'course_list',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __('course_list', 'text_domain'),
		'description' => __('Course List', 'text_domain'),
		'labels' => $labels,
		'supports' => array('title', 'editor',),
		'taxonomies' => array('courses'),
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-media-text',
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'rewrite' => $rewrite,
		'capability_type' => 'page',
	);
	register_post_type('course_list', $args);

}

// Hook into the 'init' action
add_action('init', 'course_list', 0);

function remove_unecessary_courses_admin_menus() {
	remove_submenu_page( 'edit.php?post_type=course_list', 'post-new.php?post_type=course_list' );
}

// Hook into the 'init' action
add_action( 'admin_menu', 'remove_unecessary_courses_admin_menus', 999 );

// make extra taxonomy fields
require_once(dirname( __FILE__ ) . "/../Tax-meta-class/Tax-meta-class.php");
if (is_admin()){

	$prefix = 'course_';

	$config = array(
		'id' => 'courses_taxonomies',
		'title' => 'Courses',
		'pages' => array('courses'),
		'context' => 'normal',
		'fields' => array(),
		'local_images' => false,
		'use_with_theme' => true
	);

	$my_meta =  new Tax_Meta_Class($config);
	$args = array( 'post_type' => 'course_list' );
	$courses = get_posts($args, array('orderby' => 'title'));
	$course_list = array();
	$course_list_start = '---------';
	foreach( $courses as $course){
		$course_list[$course->post_name] = $course->post_title;
		if ($course === reset($courses))
			$course_list_start = $course->post_name;
	}

	$my_meta->addText($prefix.'url',array('name'=> __('Course URL ','tax-meta')));
	$my_meta->addSelect($prefix.'version',$course_list,array('name'=> __('Course Version','tax-meta'), 'std'=> array($course_list_start)));
	$my_meta->addRadio($prefix.'status',array('open'=>'Signup open','closed'=>'Signup closed'),array('name'=> __('Course status','tax-meta'), 'std'=> array('open')));
	$my_meta->addImage($prefix.'image',array('name'=> __('Course Image','tax-meta')));


	$my_meta->Finish();
}

function course_columns() {
	$new_columns = array(
		'cb' => '<input type="checkbox" />',
		'name' => __('Course title'),
		'version' => __('Version'),
		'status' => __('Status')
	);
	return $new_columns;
}
// Add to admin_init function
add_filter("manage_edit-courses_columns", 'course_columns');
//add_filter('manage_edit-courses_sortable_columns', 'course_columns');


function manage_courses_columns($out, $column_name, $course_id) {
	$course = get_term($course_id, 'courses');

	switch ($column_name) {
		case 'status':
			$signup_option = get_tax_meta($course->term_id,'course_status');
			$out .= '<div style="text-transform: capitalize;">' . $signup_option .'</div>';
			break;
		case 'posts':
			$out .= $course->term_id;
			break;
		case 'version':
			$version = get_tax_meta($course->term_id,'course_version');
			$out .= '<div style="text-transform: capitalize;">' . $version .'</div>';
			break;
		default:
			null;
	}
	return $out;
}
// Add to admin_init function
add_filter("manage_courses_custom_column", 'manage_courses_columns', 10, 3);


if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}