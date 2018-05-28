<?php
/*
Plugin Name: Custom Image_Src
Description: Allows the upload of a custom sharing image per post
Version: 0.31
Author: Jeremy Sher
Author URI: http://twitter.com/Overlapping
License: GPLv3
*/

/* Copyright 2011 Jeremy Sher (email: OverlappingElvis@gmail.com)
	
	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. */

require_once( plugin_dir_path(__FILE__) . 'includes/MediaAccess.php' );
require_once( plugin_dir_path(__FILE__) . 'includes/MetaBox.php' );
$custom_image_src_media_access = new WPAlchemy_MediaAccess();
$custom_image_src_metabox = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_image_src_meta',
	'title' => 'Sharing Image (image_src)',
	'template' => plugin_dir_path(__FILE__) . 'includes/template.php',
	'priority' => 'high',
	'context' => 'side'
));

function image_src_scripts($hook) {
	wp_register_script('image_src_admin', plugins_url('/js/metabox.js', __FILE__), array('jquery'));
	wp_enqueue_script('image_src_admin');
}
add_action('admin_enqueue_scripts', 'image_src_scripts');

function add_custom_image_src() {
	global $custom_image_src_metabox;
	if ( is_single() ) {
		global $post;
		if ( $custom_image_src_metabox->get_the_value('post_thumbnail') ) {
			$share_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
			$share_image = $share_image_url[0];
			echo "<link rel=\"image_src\" href=\"$share_image\" />";
		} elseif ( $custom_image_src_metabox->get_the_value('image_from_post') ) {
			$content = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			$share_image = $matches[1][0];
			echo "<link rel=\"image_src\" href=\"$share_image\" />";
		} elseif ( $custom_image_src_metabox->get_the_value('image') ) {
			$share_image = $custom_image_src_metabox->get_the_value('image');
			echo "<link rel=\"image_src\" href=\"$share_image\" />";
		} else { return false; }
	}
}
add_action('wp_head', 'add_custom_image_src');

?>