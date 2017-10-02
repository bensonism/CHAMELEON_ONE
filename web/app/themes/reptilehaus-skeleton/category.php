<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
		<h1><?php printf( __( 'Category Archives: %s' ), '' . single_cat_title( '', false ) . '' );	?></h1>
		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
			echo '' . $category_description . '';
		?>
	</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
