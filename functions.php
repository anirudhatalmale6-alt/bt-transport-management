<?php
/**
 * BT Transport Management theme functions.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'bttm_setup' ) ) {
	function bttm_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'bt-transport-management' ),
		) );
	}
}
add_action( 'after_setup_theme', 'bttm_setup' );

/**
 * Styles & scripts.
 */
function bttm_assets() {
	wp_enqueue_style(
		'bttm-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'bttm-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_script( 'bttm-script', get_template_directory_uri() . '/assets/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bttm_assets' );

/**
 * Small helper to read theme mods with sensible defaults.
 */
function bttm_opt( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

/**
 * Customizer settings — logo, flyer, YouTube link, contact details, form inbox.
 */
function bttm_customize( $wp_customize ) {
	$wp_customize->add_section( 'bttm_content', array(
		'title'    => __( 'BT Transport — Content & Contact', 'bt-transport-management' ),
		'priority' => 30,
	) );

	// Services flyer image.
	$wp_customize->add_setting( 'bttm_flyer', array(
		'default'           => get_template_directory_uri() . '/assets/services-flyer.jpeg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bttm_flyer', array(
		'label'       => __( 'Services flyer image', 'bt-transport-management' ),
		'description' => __( 'Upload a new flyer any time — it replaces the one on the homepage.', 'bt-transport-management' ),
		'section'     => 'bttm_content',
	) ) );

	// YouTube channel URL.
	$wp_customize->add_setting( 'bttm_youtube', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bttm_youtube', array(
		'label'       => __( 'YouTube training channel URL', 'bt-transport-management' ),
		'description' => __( 'Paste your channel link — a "Training" button links to it. Leave blank to hide.', 'bt-transport-management' ),
		'section'     => 'bttm_content',
		'type'        => 'url',
	) );

	// Phone.
	$wp_customize->add_setting( 'bttm_phone', array(
		'default'           => '07759 725595',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bttm_phone', array(
		'label'   => __( 'Phone number', 'bt-transport-management' ),
		'section' => 'bttm_content',
		'type'    => 'text',
	) );

	// Public contact email.
	$wp_customize->add_setting( 'bttm_email', array(
		'default'           => 'info@bttransportmanagement.co.uk',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'bttm_email', array(
		'label'   => __( 'Contact email (shown on site)', 'bt-transport-management' ),
		'section' => 'bttm_content',
		'type'    => 'email',
	) );

	// Enquiry destination inbox.
	$wp_customize->add_setting( 'bttm_form_to', array(
		'default'           => 'info@bttransportmanagement.co.uk',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'bttm_form_to', array(
		'label'       => __( 'Enquiry form — send submissions to', 'bt-transport-management' ),
		'description' => __( 'Every enquiry from the homepage form is emailed here.', 'bt-transport-management' ),
		'section'     => 'bttm_content',
		'type'        => 'email',
	) );
}
add_action( 'customize_register', 'bttm_customize' );

/**
 * Helper: phone number stripped to digits for tel: links.
 */
function bttm_tel() {
	return preg_replace( '/[^0-9+]/', '', bttm_opt( 'bttm_phone', '07759 725595' ) );
}

/**
 * Enquiry form handler — validates, emails via wp_mail, redirects back with a status flag.
 */
function bttm_handle_enquiry() {
	if ( empty( $_POST['bttm_enquiry'] ) ) {
		return;
	}
	if ( ! isset( $_POST['bttm_nonce'] ) || ! wp_verify_nonce( $_POST['bttm_nonce'], 'bttm_enquiry' ) ) {
		wp_safe_redirect( home_url( '/?enquiry=error#contact' ) );
		exit;
	}
	// Honeypot — bots fill this hidden field.
	if ( ! empty( $_POST['bttm_website'] ) ) {
		wp_safe_redirect( home_url( '/?enquiry=sent#contact' ) );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$company = sanitize_text_field( wp_unslash( $_POST['company'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
	$topic   = sanitize_text_field( wp_unslash( $_POST['topic'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	if ( '' === $name || '' === $email || ! is_email( $email ) ) {
		wp_safe_redirect( home_url( '/?enquiry=error#contact' ) );
		exit;
	}

	$to = bttm_opt( 'bttm_form_to', get_option( 'admin_email' ) );
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}

	$subject = sprintf( 'New website enquiry from %s', $name );
	$body  = "New enquiry from the BT Transport Management website:\n\n";
	$body .= "Name:    {$name}\n";
	$body .= "Company: {$company}\n";
	$body .= "Email:   {$email}\n";
	$body .= "Phone:   {$phone}\n";
	$body .= "Topic:   {$topic}\n\n";
	$body .= "Message:\n{$message}\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( home_url( '/?enquiry=sent#contact' ) );
	exit;
}
add_action( 'template_redirect', 'bttm_handle_enquiry' );
