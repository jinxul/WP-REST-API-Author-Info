<?php
/*
Plugin Name: WP REST API - Author Info
Description: Getting Author's Display Name for each Post in REST API.
Version:     1.0
Author:      Ahmad Givekesh
Author URI:  baboon.ir
License:     Apache v2.0
License URI: http://www.apache.org/licenses/LICENSE-2.0
*/


add_action( 'init', 'author_info_init', 12);

function author_info_init() {

	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	foreach ( $post_types as $post_type ) {

		$post_type_name     = $post_type->name;
		$show_in_rest       = ( isset( $post_type->show_in_rest ) && $post_type->show_in_rest ) ? true : false;

	
		if ( $show_in_rest ) {

			if ( function_exists( 'register_rest_field' ) ) {
				register_rest_field( $post_type_name,
					'author_info',
					array(
						'get_callback' => 'author_info_get_field',
						'schema'       => null,
					)
				);
			} elseif ( function_exists( 'register_api_field' ) ) {
				register_api_field( $post_type_name,
					'author_info',
					array(
						'get_callback' => 'author_info_get_field',
						'schema'       => null,
					)
				);
			}
		}
	}
}

function author_info_get_field( $object, $field_name ) {

	if ( ! empty( $object['author'] ) ) {
		$author_id = (int)$object['author'];
	} else {
		return null;
	}

	$author['id']           	= $author_id;
	$author['display_name']		= get_the_author_meta('display_name', $author_id);
	$author['avatar_url']       = get_avatar_url($author_id);
	
	
	return apply_filters( 'author_info', $author);
}