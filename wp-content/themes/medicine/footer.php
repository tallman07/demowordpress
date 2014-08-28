<?php global $settings; ?><div class="clear"></div>
</div>

<div id="footer">
	<div class="container">
	<?php if ( $settings['elements']['footer']['show'] || is_super_admin() ) { ?>
	<div class="lzblock" data-block="footer">
		<div class="widgets">
			<div class="widgets-block">
				<?php dynamic_sidebar( 'Footer left' ); ?>
			</div>
			<div class="widgets-block">
				<?php dynamic_sidebar( 'Footer middle' ); ?>
			</div>
			<div class="widgets-block">
				<?php dynamic_sidebar( 'Footer right' ); ?>
			</div>
			<div class="clear"></div>
		</div>
		</div>
		<?php } ?>
	</div>
	</div>
		<div class="copyright">
		<div class="container">
			<span style='float:right;'><?php printf( __( 'Theme medicine by %s', 'lizard' ), '<a href="http://lizardthemes.com/">LizardThemes.com</a>' ); ?> </span>
			<p><?php echo $settings['general']['footer_txt']; ?></p>
		</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>