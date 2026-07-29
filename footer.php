<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<footer>
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
	<p>External Transport Management for HGV operators.</p>
	<p>&copy; <span id="year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
