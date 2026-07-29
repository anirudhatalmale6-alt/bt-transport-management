<?php
/**
 * Fallback template for any non-front-page view.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();
?>
<main class="section" style="min-height:50vh">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article>
				<h1 class="section" style="padding:0"><?php the_title(); ?></h1>
				<div><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
	else :
		?>
		<h1>Nothing here yet</h1>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return to the homepage</a></p>
		<?php
	endif;
	?>
</main>
<?php
get_footer();
