<?php

add_action( 'login_enqueue_scripts', function () {
	wp_enqueue_style( 'kazan-login-style', get_stylesheet_directory_uri() . '/css/login.css' );
} );

add_action( 'init', function () {
	$page = get_post_type_object( 'page' );
	foreach ( $page->labels as $key => $value ) {
		$value                = str_replace( 'Page', 'Museum', $value );
		$value                = str_replace( 'page', 'museum', $value );
		$page->labels->{$key} = $value;
	}
} );

remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'admin_menu', function () {
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
} );

add_filter( 'excerpt_length', function ( $length ) {
	return 80;
} );

add_action( 'init', function () {
	register_sidebar( [
		'name'          => 'Social Icons',
		'id'            => 'social-icons',
		'before_widget' => '',
		'after_widget'  => '',
	] );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script( 'async-page', get_stylesheet_directory_uri() . '/js/script.js', 'jquery' );
} );