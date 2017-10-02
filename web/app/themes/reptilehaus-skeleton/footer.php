<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * @by LM Digital - 1.0
 */
?>
		</main>
	</div>
</section>

<footer <?php post_class( 'global-footer clearfix' ); ?> role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

	<div class="inner-footer" class="container">

	
		<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		</nav>


		<?php if ( is_active_sidebar( 'c-footer-widget' ) ) : ?>
			<section class="o-footer-widget o-widget--generic" role="complementary">
				<?php dynamic_sidebar( 'c-footer-widget' ); ?>
			</section>
		<?php endif; ?>			

		<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
	</div>

</footer>

<?php if( 'RH_ENVIRONMENT' != "DEV"): ?>
	<?php // RUN SCRIPTS FOR LIVE SITE HERE - MARKETO, HUBSPOT, FACEBOOK API, TWITTER API etc ?>
<?php endif; ?>

<?php wp_footer(); ?>



<div class="c-ratio"></div>



	</body>
</html>