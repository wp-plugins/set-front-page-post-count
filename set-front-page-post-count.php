<?php
/*
Plugin Name: Set Front Page Post Count
Description: Allows the front page to have a different number of posts than other pages.
Author: Kawauso
Version: 0.1
*/

function sfppc_posts_settings_add() {
	add_settings_field( 'sfppc', __('Front page shows at most', 'sfppc'), 'sfppc_posts_settings_form', 'reading' );
	register_setting( 'reading', 'front_page_post_count', 'sfppc_posts_settings_sanitize' );
}


function sfppc_posts_settings_form() {
?>

<input name="front_page_post_count" type="text" id="front_page_post_count" value="<?php echo esc_attr( get_option( 'front_page_post_count', get_option('posts_per_page') ) ) ?>" class="small-text" /> <?php _e( 'posts', 'sfppc' ) ?>

<?php
}


function sfppc_posts_settings_sanitize( $value ) {
	return is_numeric( $value ) ? $value : get_option( 'front_page_post_count', get_option('posts_per_page') );
}


function sfppc_posts_filter( &$query ) {
	if ( $query != $GLOBALS['wp_the_query'] || !$query->is_home )
		return;

	if ( $query->is_paged ) {
		$posts_per_page = $query->get('posts_per_page') ? $query->get('posts_per_page') : get_option('posts_per_page');
		$offset = ($query->get('paged') - 2) * $posts_per_page + get_option( 'front_page_post_count', $posts_per_page );
		$query->set( 'offset', $offset );
	}
	else
		$query->set( 'posts_per_page', get_option( 'front_page_post_count', $posts_per_page ) );
}


add_action( 'admin_init', 'sfppc_posts_settings_add' );
add_action( 'pre_get_posts', 'sfppc_posts_filter' );