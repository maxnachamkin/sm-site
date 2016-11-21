<?php
/**
 * Use this file (functions.php) to copy, paste, and write your own custom
 * functionality to your website. From here you can use hooks, filters,
 * and activate powerful MD drop-ins (mini-plugins).
 *
 * Use the links below to make the most of this file, or if you already
 * know what you're doing, delete this comment block and get to work.
 *
 * Code snippets: https://marketersdelight.net/snippets/
 * Style guide:   https://marketersdelight.net/styles/
 * MDTV videos:   https://marketersdelight.net/tv/
 * MD blog:       https://marketersdelight.net/blog/
 */

// include MD library (only needed if using Drop-ins or custom MD API class)

require_once( get_template_directory() . '/lib/marketers-delight.php' );

// make [shortcodes] work in text widgets

add_filter( 'widget_text', 'do_shortcode' );


/**
*
* Loads home-lead to main page to utilize custom code and structure.
* @since 1.0
*
*/

function sm_home_lead() { ?>

  <?php if(! is_front_page())
    return;
  ?>

  <?php get_template_part('/templates/home', 'lead'); ?>

<?php }

add_action('md_hook_after_header', 'sm_home_lead');

/**
 * Loads main MD stylesheet + custom stylesheet.
 *
 * @since 1.0
 */

function sm_child_theme_enqueue() {

	// load CSS stylesheets
    wp_enqueue_style( 'marketers-delight', MD_URL . 'style.css' );
    wp_enqueue_style( 'sm-child-theme', get_stylesheet_uri() );

    // load Google font-stack
    wp_enqueue_style( 'sm-child-theme-google-fonts', 'https://fonts.googleapis.com/css?family=Dosis:300,400,700' );

}

add_action( 'wp_enqueue_scripts', 'sm_child_theme_enqueue' );


/**
 * Add MD meta options to any Custom Post Type.
 * Uncomment add_filter() and set proper IDs for your post type(s).
 * Read more: https://marketersdelight.net/snippets/meta-boxes-custom-post-types/
 *
 * @since 1.1
 */

function md_add_post_type_meta() {
	return array( 'download' );
}

//add_filter( 'md_post_type_meta', 'md_add_post_type_meta' );


/**
 * Add MD meta options to any Custom Taxonomy.
 * Uncomment add_filter() and set proper IDs for your taxonomies.
 * Read more: https://marketersdelight.net/snippets/meta-boxes-custom-post-types/
 *
 * @since 1.1
 */

function md_add_taxonomy_meta() {
	return array( 'download_category', 'product_cat' );
}

//add_filter( 'md_taxonomy_meta', 'md_add_taxonomy_meta' );
