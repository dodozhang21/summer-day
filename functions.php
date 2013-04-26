<?php
/**
 * summerDay functions and definitions
 *
 * @package summerDay
 * @since summerDay 1.0.0
 */

if ( ! function_exists( 'summerDay_setup' ) ):
function summerDay_setup() {
	$defaults = array(
		'default-image'          => get_stylesheet_directory_uri().'/images/default-logo.png',
		'random-default'         => false,
		'width'                  => 150,
		'height'                 => 100,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => false,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => 'summerDay_admin_header_style',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add post thumbnails
	 */
	set_post_thumbnail_size( 730, 150, true ); // default Post Thumbnail dimensions (cropped)
	
	/**
	 * Remove oriental post thumbnail filter
	 */
	remove_filter( 'post_thumbnail_html', 'oriental_post_image_html' );

	/**
	 * Remove oriental infinite scroll credit
	 */
	remove_filter( 'infinite_scroll_credit', 'oriental_footer_credits' );

}
endif;
add_action( 'after_setup_theme', 'summerDay_setup', 11);


/* Filter to add author credit to Infinite Scroll footer */
function summerDay_footer_credits( $credit ) {
	$credit = sprintf( __( '%3$s | Theme: %1$s by %2$s.', 'summerDay' ), 'Summer Day', '<a href="http://regretless.com/" rel="designer">Ying Zhang</a>', '<a href="http://wordpress.org/" title="' . esc_attr( __( 'A Semantic Personal Publishing Platform', 'summerDay' ) ) . '" rel="generator">Proudly powered by WordPress</a>' );
	return $credit;
}
add_filter( 'infinite_scroll_credit', 'summerDay_footer_credits' );


/**
 * Custom header style
 */
if ( ! function_exists( 'summerDay_admin_header_style' ) ) :
function summerDay_admin_header_style() {
?>
	<style type="text/css">
	#headimg {
		background-repeat: no-repeat;
		background-position: center center;
	}
	</style>
<?php
}
endif;


/**
 * Enqueue scripts and styles
 */
function summerDay_scripts() {
	wp_enqueue_style( 'googleFonts', '//fonts.googleapis.com/css?family=PT Sans Caption|Six Caps|Philosopher' );

}
add_action( 'wp_enqueue_scripts', 'summerDay_scripts' );


?>
