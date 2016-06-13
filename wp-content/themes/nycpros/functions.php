<?php
if ( function_exists('register_sidebar') ) {
   register_sidebar(array(
		'name'=>'sidebar',
       'before_widget' => '',
       'after_widget' => '',
       'before_title' => '<h2>',
       'after_title' => '</h2>',
   ));
}

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
		'global' => __( 'Global Navigation', 'Global Navigation' )
	) );

// Get jQuery from Google
if (!is_admin()) {
wp_deregister_script('jquery');
wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2');
wp_enqueue_script('jquery');
}

//iframe shortcode (helps WP behave when switching between visual and code views

function fixIframe($atts) {
    extract(shortcode_atts(array(
	"url" => 'http://',
    "width" => '1',
	"height" => '1'
    ), $atts));

    return '<iframe width="'. $width .'" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $url . '"></iframe>';
}

add_shortcode('fixiframe', 'fixIframe');

// Exclude Custom Post Types from Search

function excludeCPT($query) {
 
if ($query->is_search) {
 
	//$query->set('post_type', 'post');
	$query->set('post_type', array('post', 'page'));
 
}
	return $query;
 
}
 
add_filter('pre_get_posts','excludeCPT');


// Registers the GALLERYITEM post type
 
function galleryitem_posttype() {
	register_post_type( 'galleryitem',
		array(
			'labels' => array(
				'name' => __( 'Gallery Items' ),
				'singular_name' => __( 'Gallery Item' ),
				'add_new' => __( 'Add New Gallery Item' ),
				'add_new_item' => __( 'Add New Gallery Item' ),
				'edit_item' => __( 'Edit Gallery Item' ),
				'new_item' => __( 'Add New Gallery Item' ),
				'view_item' => __( 'View Gallery Item' ),
				'search_items' => __( 'Search Gallery Items' ),
				'not_found' => __( 'No Gallery Items found' ),
				'not_found_in_trash' => __( 'No Gallery Items found in trash' )
			),
			'public' => true,
			'supports' => array( 'title' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "galleryitem"), 
			'menu_position' => '7'
		)
	);
}		
			  
add_action( 'init', 'galleryitem_posttype' );

// Registers the SUBGALLERY post type and taxonomy
 
function subgallery_posttype() {
	register_post_type( 'subgallery',
		array(
			'labels' => array(
				'name' => __( 'Subgalleries' ),
				'singular_name' => __( 'Subgallery' ),
				'add_new' => __( 'Add New Subgallery' ),
				'add_new_item' => __( 'Add New Subgallery' ),
				'edit_item' => __( 'Edit Subgallery' ),
				'new_item' => __( 'Add New Subgallery' ),
				'view_item' => __( 'View Subgallery' ),
				'search_items' => __( 'Search Subgalleries' ),
				'not_found' => __( 'No Subgalleries found' ),
				'not_found_in_trash' => __( 'No Subgalleries found in trash' )
			),
			'public' => true,
			'supports' => array( 'title' ),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "subgallery"), 
			'menu_position' => '7'
		)
	);
}		
			  $subgallery_labels = array(
				'name' => _x( 'Subgallery Categories', 'taxonomy general name' ),
				'singular_name' => _x( 'Subgallery Category', 'taxonomy singular name' ),
				'search_items' =>  __( 'Search Subgallery Categories' ),
				'popular_items' => __( 'Popular Subgallery Categories' ),
				'all_items' => __( 'All Subgallery Categories' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Subgallery Category' ), 
				'update_item' => __( 'Update Subgallery Category' ),
				'add_new_item' => __( 'Add New Subgallery Category' ),
				'new_item_name' => __( 'New Subgallery Category Name' )
			  ); 
			
			  register_taxonomy('subgallery_category','subgallery',array(
				'hierarchical' => true,
				'labels' => $subgallery_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'subgallery-category' ),
			  ));
			  
			  
add_action( 'init', 'subgallery_posttype' );

// Excerpt MORE becomes link
function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">MORE</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Get Custom Field Template Values
function getCustomField($theField) {
	global $post;
	$block = get_post_meta($post->ID, $theField);
	if($block){
		foreach(($block) as $blocks) {
			return $blocks;
		}
	}
}

//change default image link to "LARGE" instead of original
function replace_uploaded_image($image_data) {
    // if there is no large image : return
    if (!isset($image_data['sizes']['large'])) return $image_data;

    // paths to the uploaded image and the large image
    $upload_dir = wp_upload_dir();
    $uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
    $large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file'];

    // delete the uploaded image
    unlink($uploaded_image_location);

    // rename the large image
    rename($large_image_location,$uploaded_image_location);

    // update image metadata and return them
    $image_data['width'] = $image_data['sizes']['large']['width'];
    $image_data['height'] = $image_data['sizes']['large']['height'];
    unset($image_data['sizes']['large']);

    return $image_data;
}
add_filter('wp_generate_attachment_metadata','replace_uploaded_image');

// Limit Post/Page Revisions to 5
define('WP_POST_REVISIONS', 10);


// Remove WP Generator for security reasons
remove_action('wp_head', 'wp_generator');

// Remove Windows Live Writer tag
remove_action('wp_head', 'wlwmanifest_link');

// Remove Really Simple Discovery link
remove_action('wp_head', 'rsd_link');

// Check if page is a direct subpage

function is_subpage($the_id){
global $post;
if ($post->post_parent == $the_id) {
return true;
} else {
return false;
}
}

// Check if a page is in a family tree

function is_tree($pid) {
// $pid = The ID of the ancestor page
global $post; // load details about this page
$anc = get_post_ancestors( $post->ID );
foreach($anc as $ancestor) {
if(is_page() && $ancestor == $pid) {
return true;
}
}
if(is_page()&&(is_page($pid)))
return true; // we're at the page or at a sub page
else
return false; // we're elsewhere
};

// Check if a page is a descendant, but not the original page ID

function is_child($pid) {
// $pid = The ID of the ancestor page
global $post; // load details about this page
$anc = get_post_ancestors( $post->ID );
foreach($anc as $ancestor) {
if(is_page() && $ancestor == $pid) {
return true;
}
}
return false; // we're elsewhere
};

?>