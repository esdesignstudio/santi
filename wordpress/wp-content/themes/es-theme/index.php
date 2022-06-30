<?php get_header(); ?>
	<main role="main">
		<section>
			<h1><?php _e( 'Latest Posts', 'easondesign_lang' ); ?></h1>
			<?php get_template_part('loop'); ?>
		</section>
	</main>
<?php get_footer(); ?>
