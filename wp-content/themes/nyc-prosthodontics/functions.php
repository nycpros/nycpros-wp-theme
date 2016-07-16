<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN
require_once( 'library/admin.php' );

// LET'S REQUIRE SOME PLUGINS
require_once( 'library/required_plugins.php' );

// LET'S BUILD A BOOTSTRAP-BASED NAV
require_once( 'library/nav-includes/wp_bootstrap_navwalker.php' );

function nav_search_form() {
  $wrap  = '<ul id="%1$s" class="%2$s">';
  $wrap .= '%3$s';
  $wrap .= '<li class="search">';
  $wrap .= '<form action="/search" id="cse-search-box" class="cf">';
  $wrap .= '<input type="text" class="q" name="q" id="q" value="' . $_GET["q"] . '" />';
  $wrap .= '<button class="btn-search" type="submit"><i class="fa fa-search fa-fw"></i></button>';
  $wrap .= '</form>';
  $wrap .= '</li>';
  $wrap .= '</ul>';
  return $wrap;
}

// ADDING SOME OPTIONS FOR PARTING OUT AN APPEARANCE MENU
//require_once( 'library/nav-includes/limit_offset.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
    add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  // load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* FILTERING IMAGE SIZES ********************/

function bones_filter_image_sizes( $sizes) {

//unset( $sizes['thumbnail']);
//unset( $sizes['medium']);
unset( $sizes['large']);

return $sizes;
}
// DISABLED FOR NOW
// add_filter('intermediate_image_sizes_advanced', 'bones_filter_image_sizes');

/*
The function above disables some of the WP auto created images.
We have these turned off because we rely on creating/caching specific
image sizes (using the WP Thumb Plugin)
https://wordpress.org/support/plugin/wp-thumb
DOCS: http://hmn.md/2011/10/19/introducing-wp-thumb/
FILTERS: http://phpthumb.sourceforge.net/
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

/************* PHONE NUMBER FORMATTING **************/

function get_trimmed_phone($num) {
  $trimmed_num = preg_replace('/\D+/', '', $num);
  return $trimmed_num;
}

function get_formatted_phone($num) {
  $trimmed_num = preg_replace('/\D+/', '', $num);
  return "(".substr($trimmed_num, 0, 3).") ".substr($trimmed_num, 3, 3)."-".substr($trimmed_num,6);
}

/************* ACF 5 OPTIONS PAGE ********************/

if(function_exists('acf_add_options_page')) {
  acf_add_options_page('Options');
}

/************* YOAST TWEAKS *****************/

// Filter out Yoast SEO columns
add_filter( 'wpseo_use_page_analysis', '__return_false' );

// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


/************* EMBED MGMT FUNCTIONS *****************/

function get_youtube_image($postid) {
  
    $youtube_id = youtube_id_from_url(get_field('post_youtube_url', $postid));
    
    if ($youtube_id) {
      // high res option, returns nothing for videos without this image...no fallback
      ///$image = "http://img.youtube.com/vi/".$youtube_id."/maxresdefault.jpg";
      $image = "http://img.youtube.com/vi/".$youtube_id."/hqdefault.jpg";
      return $image;

    }
    return false;
  
}

function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}


function youtube_embed_from_url($youtube_url) {

    $youtube_id = youtube_id_from_url($youtube_url);
    
    if ($youtube_id) {

      return '<div class="embed-container embed-youtube">
                <iframe src="//www.youtube.com/embed/'.$youtube_id.'?rel=0" frameborder="0" allowfullscreen></iframe>
              </div>';
    }
    return false;
}


function vimeo_embed_from_url($vimeo_url) {
    
	if (preg_match("/(?:https?:\/\/)?(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $vimeo_url, $id_arr)) {
	    $vimeo_id = $id_arr[3];
	} 	    

    if ($vimeo_id) {
    return '<div class="embed-container embed-vimeo">
                <iframe src="//player.vimeo.com/video/'.$vimeo_id.'?title=0&byline=0&portrait=0&wmode=transparent" frameborder="0" allowFullScreen></iframe>
            </div>';
    } else {
    	return false;
    }
}

function get_instagram_image($instagram_url) {
      $instagram_url = get_field('post_instagram_url');
      $instagram_url_wo_embed = str_replace("?modal=true", "", $instagram_url);
      $instagram_id = basename($instagram_url_wo_embed, '/');
      $image = "http://instagram.com/p/".$instagram_id."/media/?size=l";
      $image = get_headers($image, 1);
      $image = $image['Location'];
      
      return $image;
      
}

// This needs modification to clear the '?embed' bit that Instagram is now adding
function instagram_embed_from_url($instagram_url) {
  // passed in is a full INSTAGRAM URL
  
  // first check for the modal param nonsense, if there...strip it
  $instagram_url_wo_embed = str_replace("?modal=true", "", $instagram_url);
  // instagram keeps changing shit...now their modal's are https://, but their API hiccups unless it is http://
  $http_instagram_url_wo_embed = str_replace("https://", "http://", $instagram_url_wo_embed);
  
  // don't need just the ID anymore
  $instagram_id = basename($instagram_url_wo_embed, '/'); //getting Instagram ID from something like "http://instagram.com/p/dnQi4EGuZx/"

  if ($instagram_id) {

  $url = 'http://api.instagram.com/oembed?url='.$http_instagram_url_wo_embed;
  $content = file_get_contents($url);
  $json = json_decode($content, true);
  
  return '<div class="embed-instagram">'.$json['html'].'</div>';

  }
}


/************* CUSTOM SHORTCODES *****************/

// BUTTON
function my_button_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'url' => 'http://huhot.com',
  ), $atts );
  return '<a href="' . esc_attr($a['url']) . '" class="btn btn-lg btn-green">' . $content . '</a>';
}
add_shortcode( 'my_button', 'my_button_shortcode' );

// YOUTUBE
function my_youtube_shortcode( $atts, $content = null ) {
  return youtube_embed_from_url($content);
}
add_shortcode( 'my_youtube', 'my_youtube_shortcode' );

// INSTAGRAM
function my_instagram_shortcode( $atts, $content = null ) {
  return instagram_embed_from_url($content);
}
add_shortcode( 'my_instagram', 'my_instagram_shortcode' );


/************* WYSIWYG SHORTCODE SELECTOR INJECTOR *****************/

add_action('media_buttons','add_sc_select',99);

function add_sc_select(){
    global $shortcode_tags;
     /* ------------------------------------- */
     /* enter names of shortcode to exclude below */
     /* ------------------------------------- */
    $exclude = array("wp_caption", "caption", "embed", "gallery", "playlist", "audio", "video", "acf", "wpseo_sitemap", "wpseo_breadcrumb", "gravityform", "gravityforms", "wpthumb");
    echo '&nbsp;<select class="sc-select" onchange="window.send_to_editor(jQuery(this).val());"><option value="">Add Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
            if(!in_array($key,$exclude)){ // if we're working with a shortcode that IS NOT in the excluded list above
              if($key == 'my_button') { // if we're working with the 'button' shortcode.  This situation requrires a shortcode attribute AND content, unlike a simpler embed.
                $shortcodes_list .= '<option value="['.$key.' url=&quot;http://WEBSITE_URL_HERE&quot;]BUTTON_TEXT_HERE[/'.$key.']">'.substr($key, 3).'</option>';
              } else { // otherwise, we're working with an embed style shortcode
                $shortcodes_list .= '<option value="['.$key.']REPLACE_THIS_WITH_FULL_EMBED_URL[/'.$key.']">'.substr($key, 3).'</option>';
              }
            }
        }
     echo $shortcodes_list;
    //print_r ($shortcode_tags);
     echo '</select>';
}


/************* TINY MCE FUNCTIONS *********************/

// enabling 'formats' selector in the 2nd row of icons NOTE: All custom styling will happen here..but specifics are below)
// Original buttons: array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' )
function fb_mce_buttons_2($buttons) {
  // UNCOMMENT BELOW TO ENABLE CUSTOM STYLES
  //$buttons = array( 'formatselect', 'styleselect', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );
  $buttons = array( 'formatselect', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );
  return $buttons;
}

// DOING THIS TO HIDE THE UNDERLINE BUTTON
add_filter('mce_buttons_2', 'fb_mce_buttons_2');

// customizes the 'formats' options instigated above
function fb_mce_custom_styles( $init_array ) {

  $init_array['style_formats'] = "[
    {title: 'Beacon Red Text', inline: 'span', styles: {color: '#ba1319'}},
    {title: 'Drop Cap Text', inline: 'span', classes: 'dropcap'}
  ]";

/* FOR REFERENCE - TinyMCE 4.x */
/* http://www.tinymce.com/wiki.php/Configuration:style_formats */
/* style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ] */

  return $init_array;

  // debuggin'
  // echo "<pre>";
  // print_r($init_array);
  // echo "</pre>";
}

// CUSTOM STYLES ARE NOT CURRENTLY USED
//add_filter( 'tiny_mce_before_init', 'fb_mce_custom_styles' );


/************* EXTERNAL FONTS *****************/

function bones_fonts() {
  wp_register_style('googleFontsRaleway', '//fonts.googleapis.com/css?family=Raleway:600,800');
  wp_enqueue_style( 'googleFontsRaleway');

  wp_register_style('googleFontsDroidSerif', '//fonts.googleapis.com/css?family=Droid+Serif:400italic');
  wp_enqueue_style( 'googleFontsDroidSerif');

  wp_register_style('fontAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
  wp_enqueue_style( 'fontAwesome');
}

add_action('wp_print_styles', 'bones_fonts');


/************* SOCIAL SHARRE BUTTONS *****************/

/*
LET'S ADD SOCIAL SHARRRE BUTTONS MODIFIED BY DANIEL SETZERMANN THEN TWEAKED BY BRIAN
http://danielsetzermann.com/wordpress/custom-social-media-buttons-for-wordpress-share-count/

  In order to get the google plus button working on c9 you need to add php5-curl:

  first install...
  sudo apt-get install php5-curl

  then restart apache...
  sudo service apache2 restart

*/
function ds_social_media_buttons() {
  ob_start(); // turn on output buffering
  include(get_stylesheet_directory() . '/partials/share.php');
  $share_hook = ob_get_contents(); // get the contents of the output buffer
  ob_end_clean(); //  clean (erase) the output buffer and turn off output buffering
  echo $share_hook;
}

/* DON'T DELETE THIS CLOSING TAG */ ?>
