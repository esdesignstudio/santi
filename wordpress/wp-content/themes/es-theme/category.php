<?php get_header(); ?>
	<main role="main">
		<section>
			<h1><?php _e( 'Categories for ', 'easondesign_lang' ); single_cat_title(); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
