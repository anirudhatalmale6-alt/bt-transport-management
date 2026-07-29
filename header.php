<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<a class="brand brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> home">
		<?php
		if ( has_custom_logo() ) {
			$logo_id  = get_theme_mod( 'custom_logo' );
			$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );
			if ( $logo_src ) {
				printf( '<img src="%s" alt="%s" />', esc_url( $logo_src[0] ), esc_attr( get_bloginfo( 'name' ) ) );
			} else {
				the_custom_logo();
			}
		} else {
			printf( '<img src="%s/assets/logo.jpeg" alt="BT Transport Management" />', esc_url( get_template_directory_uri() ) );
		}
		?>
	</a>
	<button class="nav-toggle" aria-label="Open navigation" aria-expanded="false">&#9776;</button>
	<nav class="nav" aria-label="Main navigation">
		<a href="#services">Services</a>
		<a href="#approach">How it works</a>
		<a href="#about">About</a>
		<?php $yt = bttm_opt( 'bttm_youtube' ); if ( $yt ) : ?>
			<a href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener">Training</a>
		<?php endif; ?>
		<a class="nav-cta" href="tel:<?php echo esc_attr( bttm_tel() ); ?>">Book a call <span>&#8599;</span></a>
	</nav>
</header>
