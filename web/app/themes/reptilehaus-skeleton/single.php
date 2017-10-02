<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
	<header class="article-header entry-header">
		<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
		<p class="byline entry-meta vcard">
			<?php printf( __( 'Posted', 'REPTILEHAUS' ).' %1$s %2$s',
			/* the time the post was published */
			'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
			/* the author of the post */
			'<span class="by">'.__( 'by', 'REPTILEHAUS' ).'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
			); ?>
		</p>
	</header>
	<section class="entry-content clearfix" itemprop="articleBody">
		<?php
			the_content();
			/*
			* Link Pages is used in case you have posts that are set to break into
			* multiple pages. You can remove this if you don't plan on doing that.
			*
			* Also, breaking content up into multiple pages is a horrible experience,
			* so don't do it. While there are SOME edge cases where this is useful, it's
			* mostly used for people to get more ad views. It's up to you but if you want
			* to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
			*
			* http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
			*
			*/
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'REPTILEHAUS' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</section>
	<footer class="article-footer">
		<?php printf( __( 'filed under', 'REPTILEHAUS' ).': %1$s', get_the_category_list(', ') ); ?>
		<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'REPTILEHAUS' ) . '</span> ', ', ', '</p>' ); ?>
	</footer>
	<?php //comments_template(); ?>
</article>
<?php endwhile; else : ?>
<article id="post-not-found" class="clearfix">
	<header class="article-header">
		<h1><?php _e( 'Oops, Post Not Found!', 'REPTILEHAUS' ); ?></h1>
	</header>
	<section class="entry-content">
		<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'REPTILEHAUS' ); ?></p>
	</section>
	<footer class="article-footer">
		<p><?php _e( 'This is the error message in the single.php template.', 'REPTILEHAUS' ); ?></p>
	</footer>
</article>
<?php endif; ?>

<?php if ( is_active_sidebar( 'c-sidebar-main' ) ) : ?>
	<aside id="secondary" class="o-sidebar o-sidebar--generic col-md-4" role="complementary">
		<?php dynamic_sidebar( 'c-sidebar-main' ); ?>
	</aside>
<?php endif; ?>		

<?php get_footer(); ?>