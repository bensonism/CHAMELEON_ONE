<?php get_header(); ?>

<article id="post-not-found" <?php post_class( 'clearfix' ); ?>>
	<header class="article-header">
		<h1><?php _e( 'Epic 404 - Article Not Found', 'REPTILEHAUS' ); ?></h1>
	</header>
	<section class="entry-content">
		<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'REPTILEHAUS' ); ?></p>
	</section>
	<section class="search">
		<p><?php get_search_form(); ?></p>
	</section>
	<footer class="article-footer">
		<p><?php _e( 'This is the 404.php template.', 'REPTILEHAUS' ); ?></p>
	</footer>
</article>

<?php get_footer(); ?>