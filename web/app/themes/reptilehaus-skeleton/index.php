<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
	<header class="article-header">
		<h1 class="h2 entry-title" itemprop="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<p class="byline entry-meta vcard">
			<?php 
			printf( __( 'Posted', 'REPTILEHAUS' ).' %1$s %2$s',
			/* the time the post was published */
			'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
			/* the author of the post */
			'<span class="by">'.__( 'by', 'REPTILEHAUS').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
			); ?>
		</p>
	</header>
	<section class="content" itemprop="description">
		<?php the_content(); ?>
	</section>
</article>

<?php endwhile; else : ?>

<article id="post-not-found" class="hentry cf">
	<header class="article-header">
		<h1><?php _e( 'Oops, Post Not Found!', 'REPTILEHAUS' ); ?></h1>
	</header>
	<section class="entry-content">
		<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'REPTILEHAUS' ); ?></p>
	</section>
	<footer class="article-footer">
		<p><?php _e( 'This is the error message in the index.php template.', 'REPTILEHAUS' ); ?></p>
	</footer>
</article>

<?php endif; ?>

<?php get_footer(); ?>