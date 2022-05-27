<?php
/*
Plugin Name: Posts Retrieval from Filson
Description: Retrieves Posts from Filson
Version: 1.0
Author: Yelena Khamidullina
Author URI: https://devotedprogrammer.com/
*/

function scripts_enqueue() {
	global $post;
    if ( is_a($post,'WP_Post') && has_shortcode($post->post_content, 'skiplagged')) {
		wp_enqueue_script('jquery3-5-0', 'https://code.jquery.com/jquery-3.5.0.js');
		wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.13.0/jquery-ui.js');
		wp_enqueue_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.0.min.js');
		wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css');
		wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js');
		wp_enqueue_script('bootstrap-bundle-min', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('myjs',  plugin_dir_url( __FILE__ ) . 'js/myjs.js');

	}
}
add_action('wp_enqueue_scripts','scripts_enqueue');

function skiplagged($atts)
{
	$html = '
	<script>

	var post_url = "'.plugin_dir_url( __FILE__ ).'getdata.php";
	</script>
	<form id="search-form" name="search-form" method="POST" class="needs-validation text-center" novalidate>

			<div class="col-auto">
				<input class="btn btn-primary" type="button" name="search-submit" id="search-submit" value="Get Filson Posts">
			</div>
			<br>

		</form>
   	<div id="response" class="text-center"></div>';

		return $html;
}

add_shortcode('skiplagged', 'skiplagged');
