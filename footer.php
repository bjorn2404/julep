<?php
/**
 * Theme footer
 *
 * @package julep
 */

?>
</main><!-- #main -->
<footer id="colophon" class="site__footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<div class="site__footer__content">
		&copy; <?php echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) ); ?> All Rights Reserved
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
