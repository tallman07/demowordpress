<?php
/**
 * The template for displaying the footer.
 *
 *
 * @subpackage Medical Center
 * @since Medical Center
 */
?>
	</div><!-- mdclcntr_main -->
	<div class="clear"></div>
		<div id="mdclcntr_footer">
			<footer>
				<div class="mdclcntr_footer_author">
					<?php printf( __( 'Powered by', 'medical_center' ) . '&nbsp;' ); ?><a href="<?php echo esc_url( wp_get_theme()->get( 'AuthorURI' ) ); ?>">BestWebSoft</a> <?php _e( 'and', 'medical_center' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>"><?php _e( 'WordPress', 'medical_center' ); ?></a>
				</div>
				<div class="mdclcntr_footer_bot">
					<?php printf( '&copy;' ); ?><?php echo date( 'Y' ); ?> <?php echo wp_get_theme()->get( 'Name' ); ?>
				</div>
			</footer>
		</div>	<!-- mdclcntr_footer -->
	</div><!-- mdclcntr_home_page -->
<?php wp_footer(); ?>
</body>
</html>
