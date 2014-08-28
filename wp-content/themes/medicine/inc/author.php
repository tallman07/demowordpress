<?php
	if ( !current_user_can('edit_posts') ) return;
	
	
	add_action('admin_init', 'medicine_records_showroom', 1);
	add_action('save_post', 'medicine_records_params_update', 0);
	if ( !is_super_admin() ) add_action('admin_head', 'medicine_author_head');
	

function medicine_records_showroom() {	
	
	$post_types=get_post_types(array());
	foreach( $post_types as $type ) {
		if (!in_array($type, array('attachment', 'revision', 'nav_menu_item', 'slides'))) {
			add_meta_box( 'forshowroom', __( 'Show this record in the showroom', 'lizard' ), 'medicine_forshowroom_func', $type, 'side', 'high'  ); 
			add_meta_box( 'pagetemplate', __( 'Select page template', 'lizard' ), 'medicine_pagetemplate_func', $type, 'side', 'high'  ); 
		}
	}
}

function medicine_author_head() { ?>
		<link rel='stylesheet' href='<?php echo get_template_directory_uri()?>/styles/dashboard.css' type='text/css' media='all' />
		<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/dashboard.js"></script>
<?php }

function medicine_forshowroom_func($post) {
	global $APage;
		$checked = get_post_meta($post->ID, 'forshowroom', true)?' checked="checked"':'';
	?>
	<p class='description'>
		<?php _e( 'To show this item in showroom, select "'.get_post_type($post->post_id).'" for Showroom Source on page General of the theme settings.', 'lizard' ); ?>
	</p>
	<div class='lz-check<?php if (get_post_meta($post->ID, 'forshowroom', true)) echo ' checked'; ?>'><input type='hidden' <?php if (get_post_meta($post->ID, 'forshowroom', true)) echo 'value="1"'; else echo 'alt="1"'; ?> name='forshowroom' /></div>
	<?php
}

function medicine_pagetemplate_func($post) {
	global $APage;
		$current = get_post_meta($post->ID, 'pagetemplate', true);
	?>
	
	<select name="pagetemplate" style="width:255px;">
		<option value="default" <?php if ($current=='default') echo 'selected'; ?>><?php _e( 'Default', 'lizard' ); ?></option>
		<option value="right" <?php if ($current=='right') echo 'selected'; ?>><?php _e( 'Right sidebar', 'lizard' ); ?></option>
		<option value="left" <?php if ($current=='left') echo 'selected'; ?>><?php _e( 'Left sidebar', 'lizard' ); ?></option>
		<option value="both" <?php if ($current=='both') echo 'selected'; ?>><?php _e( 'Both sidebars', 'lizard' ); ?></option>
		<option value="full" <?php if ($current=='full') echo 'selected'; ?>><?php _e( 'Full width', 'lizard' ); ?></option>
	</select>
	<?php
}

function medicine_records_params_update( $post_id ){  
	
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
	
    if ( !current_user_can('edit_post', $post_id) ) return false; 
	
	if (isset( $_POST['forshowroom'] )) {
		$_POST['forshowroom'] = (int)$_POST['forshowroom'];
		update_post_meta($post_id, 'forshowroom', $_POST['forshowroom']);
	}
	if (isset( $_POST['pagetemplate'] )) {
		update_post_meta($post_id, 'pagetemplate', $_POST['pagetemplate']);
	}
    return $post_id;  
}