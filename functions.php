<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if ( ! function_exists( 'red_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function red_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // red_starter_setup
add_action( 'after_setup_theme', 'red_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'red_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'red_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'red_starter_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'red_starter_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts() {
	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'red_starter_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

// Custom Post Types

 add_action('init', 'new_cpt_section');



 function init_custom_post_types($key){

   $labels = array(
          'name'          => _x('CPT', 'Post Type General Name', 'text_domain'),
          'singular_name'     => _x('CPT', 'Post Type Singular Name', 'text_domain'),
          'parent_item_colon'   => '',
        'menu_name'             => __( "$key"),
        'name_admin_bar'        => __( "$key"),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( "All Items"),
        'add_new_item'          => __( "Add New Item $key"),
        'add_new'               => __( "Add New $key"),
        'new_item'              => __( 'New Item $key'),
        'edit_item'             => __( "Edit Item $key"),
        'update_item'           => __( "Update Item $key"),
        'view_item'             => __( "View Item $key"),
        'view_items'            => __( "View Items $key"),
        'search_items'          => __( "Search Item $key"),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
      );

   $args = array(
          'labels'        => $labels,
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
       'exclude_from_search'   => false,
        'publicly_queryable'    => true,
    );
    return $args;
  }

// Add Custom Taxonomy for Custom Post Types

 function init_custom_taxonomies($term){
    $labels = array (
        'name'        => $term,
          'singular_name'   => $term,
          'search_items'    => "Search $term",
          'all_items'       => "All $term",
          'parent_item'     => "Parent $term",
          'parent_item_colon' => "Parent $term:",
          'edit_item'         => "Edit $term",
        'update_item'       => "Update $term",
        'add_new _item'     => "Add New $term",
        'new_item_name'     => "New Type $term",
        'menu_name'         => "$term",
    );
    $args = array (
        'labels'        => $labels,
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_admin_column'   => true,
        'query_var'       => true,
        'rewrite'       => array('slug' => $term)
    );
    return $args;
  }



function new_cpt_section(){
    $customTaxonomy = array(
      "Adventures" => "",
      "Products" => array("Activity"));

     foreach ($customTaxonomy as $key => $value){ // $key : Products & Movies ; $value : $Color & $Movies
        $args1 = init_custom_post_types($key); // creating a new variable args1 and calling the function with its arguments
        register_post_type(strtolower($key), $args1, 0); // Dashboard displays Products and Movies as Custom Post types

       if($value==""){

       }
        elseif(is_array($value)){ // checking if my $value is an array
          foreach ($value as $array => $x) { // if my $value is an array then create an instance $array and assign it's value with an instance variable $x
            //echo $x;
            $tax_args = init_custom_taxonomies($x); // creating a new variable $tax_args and call the function init_custom_taxonomies and retrieve the value of an array.
            register_taxonomy(strtolower($x), array(strtolower($key)), $tax_args ); // register_taxonomy $x : taxonomy, array($key): No. Custom of Custom Post types, $tax_args is getting the args from the function.
          }
        }
        else{
          //echo $key;
          $tax_args = init_custom_taxonomies($value);
          register_taxonomy(strtolower($value), array(strtolower($key)), $tax_args );
        }
      }
    } // end new_cpt_section

// Declare global $more (before the loop).
global $more;
 
// Set (inside the loop) to display all content, including text below more.
$more = 1;
 
the_content();

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
$items .= '<li>' . get_search_form( false ) . '</li>';
return $items;
}

function get_banner(){
  
  //if a banner custom field exists
  //populate the banner
  //If to check if your on the homepage then get logo, if on about get the_title.
  //what is the banner?
  //div with a background image
  // and title or the logo displayed over top
  //return a string which contains all our html
  //<div class="banner">
  // <h2>ABOUT</h2> or an <img> with the logo
  

  $img = get_field("banner");
  if ($img) {

  }
  return $img;
  

  if ( is_front_page() ) {
    echo $logo1;
    return;
  }
};
 