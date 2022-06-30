<?php get_header(); ?>
	<main role="main">
		<section>
			<h1><?php _e( 'Archives', 'easondesign_lang' ); ?></h1>
			<?php get_template_part('loop'); ?>
		</section>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
