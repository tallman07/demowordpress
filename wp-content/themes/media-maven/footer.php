	<footer id="colophon" role="contentinfo">
		<div id="site-generator">
			<?php echo __('&copy; ', 'media-maven') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'media-maven'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'media-maven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'media-maven' ); ?>"><?php _e('Wordpress' ,'media-maven'); ?></a>
			<?php _e(' and ', 'media-maven'); ?><a href="<?php echo esc_url( __( get_site_url(), 'media-maven' ) ); ?>"><?php _e('WPThemes.co.nz', 'media-maven'); ?></a>
            <?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>