<?php


if ( !is_super_admin() ) return;
 

add_action('admin_head', 'medicine_head');
add_action('admin_menu', 'medicine_themeMenu');

if (isset($_GET['section'])&&isset($_GET['action'])&&$_GET['action']=='reset') {
	include_once ( get_template_directory().'/inc/default.php' );
	$result=get_option( 'medicine-settings' );
	$result[$_GET['section']]=$lz_default[$_GET['section']];
	update_option( 'medicine-settings', $result );
	wp_redirect('?page='.$_GET['page']);
}

if (!isset($_GET['section'])&&isset($_GET['page'])&&$_GET['page']=='LZSettings') {
	$_GET['section']='LZSettings';
}

	
	function medicine_head() { ?>
		<link rel='stylesheet' href='<?php echo get_template_directory_uri()?>/styles/dashboard.css' type='text/css' media='all' />
		<script>
			var admin_mail='<?php echo get_option('admin_email'); ?>';
		</script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/dashboard.js"></script>
		<?php if (isset($_GET['section'])&&in_array($_GET['section'], array('LZSettings', 'general', 'slider', 'showroom', 'layout', 'socialbuttons', 'seo', 'menus', 'integration', '_contactform', '_freshthemes'))) { ?>
			<link rel='stylesheet' href='<?php echo get_template_directory_uri()?>/styles/admin.css' type='text/css' media='all' />
			<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/ajaxupload.js"></script>
		<script>
			jQuery('.lz-reset').live('click', function() {
				if (! confirm(jQuery(this).text()+' to defaults?')) return false;
			});
			jQuery('.lz-item').live('click', function() {

				jQuery('.lz-panel').hide();
				jQuery('.lz-menu ul').show();
				jQuery('.lz-title').html(jQuery(this).text());
				jQuery('.lz-menu-item[alt="'+jQuery(this).attr('alt')+'"]').addClass('active');
				if( jQuery('.lz-menu-item.active').attr('alt')[0]!='_' ) {
					jQuery('.lz-reset').attr('href', '?page=LZSettings&section='+jQuery(this).attr('alt')+'&action=reset');
					jQuery('.lz-reset').html('Reset '+jQuery.trim(jQuery(this).text())+' settings');
					jQuery('.lz-savesettings').show();
					jQuery('.lz-reset').show();
				}
				jQuery('.lz-page.lz-'+jQuery(this).attr('alt')).show().addClass('active').siblings('.lz-page').hide().removeClass('active');
				jQuery('#lz-settings').css('padding-top',jQuery('.lz-menu').height()+'px');
				return false;
			});
			jQuery('.lz-support').live('click', function() {
				jQuery('.lz-panel').hide();
				jQuery('.lz-menu ul').show();
				jQuery('.lz-title').html(jQuery(this).text());
				
				jQuery('.lz-page.lz-support-page').show().addClass('active').siblings('.lz-page').hide().removeClass('active');
				jQuery('#lz-settings').css('padding-top',jQuery('.lz-menu').height()+'px');
				return false;
			});
			jQuery('.lz-menu-item').live('click', function() {
				jQuery('.lz-menu-item').removeClass('active');
				jQuery(this).addClass('active');
				jQuery(this).find('img').attr('src');
				jQuery('.lz-title').html(jQuery(this).text());
				if( jQuery('.lz-menu-item.active').attr('alt')[0]!='_' ) {
					jQuery('.lz-reset').html('Reset '+jQuery(this).text()+' settings');
					jQuery('.lz-reset').attr('href', '?page=LZSettings&section='+jQuery(this).attr('alt')+'&action=reset');
					jQuery('.lz-savesettings').show();
					jQuery('.lz-reset').show();
				} else {
					jQuery('.lz-savesettings').hide();
					jQuery('.lz-reset').hide();
				}
				jQuery('.lz-page.lz-'+jQuery(this).attr('alt')).show().addClass('active').siblings('.lz-page').hide().removeClass('active');
				jQuery('#lz-settings').css('padding-top',jQuery('.lz-menu').height()+'px');
				
				jQuery('#toplevel_page_LZSettings ul li').eq(jQuery(this).parent().index()+2).addClass('current').siblings().removeClass('current');
				return false;
			});
			jQuery('.lz-savesettings').live('click', function() {
				var data=jQuery('.lz-page.active .lz-form').serialize();
				jQuery('.lz-savesettings').hide();
				jQuery('.lz-reset').hide();
				jQuery('.lz-progress').show();
				jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', {
						'action':'save_settings',
						'section':jQuery('.lz-page.active').attr('alt'),
						'data':data
					}, 
					function(response){ 
						jQuery('.lz-status').text(response).show();
						jQuery('.lz-progress').hide();
						setTimeout("jQuery('.lz-status').hide()", 2000);
						setTimeout("jQuery('.lz-status').text('');", 2000);
						setTimeout("jQuery('.lz-savesettings').show()", 2000);
						setTimeout("jQuery('.lz-reset').show();", 2000);
					}
				);
			});
			
			
			jQuery(document).ready(function() {
				jQuery('.lz-imageupload').each(function(){
				
					var button=jQuery(this);
					new AjaxUpload( button, {
						action: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
						data: {
							action : 'upload_image'
						},
						name: 'uploadfile',
						onComplete: function(file, response){
							jQuery(button).prev('input').val(response);
							jQuery(button).parent().find('.img img').attr('src', response);
						}
					});
				});
				if(jQuery('.lz-menu-item.active').size()) {
					jQuery('.menu-hover').css({
						left:jQuery('.lz-menu-item.active').position().left,
						width:jQuery('.lz-menu-item.active').innerWidth(),
						display:'block'
					});
					
					jQuery('#lz-settings').css('padding-top',jQuery('.lz-menu').height()+'px');
					
					if( jQuery('.lz-menu-item.active').attr('alt')[0]!='_' ) {
						jQuery('.lz-savesettings').show();
						jQuery('.lz-reset').show();
					}
				}
			});
			jQuery('.lz-select img').live('click', function() {
				jQuery(this).parent().find('input').val(jQuery(this).attr('alt'));
				jQuery(this).addClass('active').siblings().removeClass('active');
			});
			jQuery('.lz-menu li a').live('mouseover', function() {
				jQuery('.menu-hover').stop().animate({
					left:jQuery(this).position().left,
					width:jQuery(this).innerWidth()
				}, 500, function(){});
			});
			jQuery('.lz-menu-container').live('mouseleave', function() {
				jQuery('.menu-hover').stop().animate({
					left:jQuery('.lz-menu-item.active').position().left,
					width:jQuery('.lz-menu-item.active').innerWidth()
				}, 500, function(){});
			});
		</script>
		<?php if ( isset($_GET['section'])&&$_GET['section']!='LZSettings') { ?>
		<style>
			.lz-panel {display:none;}
			.lz-menu ul {display:block;}
			.lz-page.lz-<?php echo $_GET['section']; ?> {display:block;}
		</style>
		<?php } ?>
		<?php } ?>
	<?php }
	
	





function medicine_themeMenu() {
	global $adminsettings, $settingOptions;
	include_once (get_template_directory()."/inc/settings.php");
	$theme = wp_get_theme( );
	add_theme_page( $theme['Name'], $theme['Name'].' Settings', 'manage_options', 'LZSettings', 'medicine_thememanage');
}

function medicine_thememanage() {
	global $adminsettings, $settingOptions, $settings; 
	include_once (get_template_directory()."/inc/settings.php");
	$theme = wp_get_theme( );
	
	?>
	<div id='lz-settings'>
		<div class='lz-menu'>
		<div class='lz-top'>
		<img alt="WordPress Lizard" src="<?php echo get_template_directory_uri()?>/inc/images/logo.png" class='lz-logo' />
		<div class='theme'><?php echo $theme['Name'].' '.$theme['Version']; ?></div>
		<div class='lz-links'>
			<a href="#" class="lz-support"><?php _e( 'How to start', 'lizard' ); ?></a><br>
			<a href="http://lizardthemes.com/<?php echo strtolower( $theme['Name'] ); ?>/"><?php _e( 'Theme Homepage', 'lizard' ); ?></a><br>
			<a href="http://lizardthemes.com/support/forum/<?php echo strtolower( $theme['Name'] ); ?>-free-wordpress-theme/"><?php _e( 'Support Forums', 'lizard' ); ?></a>
		</div>
		</div>
		<div class='clear'></div>
		<div class='lz-menu-container'>
		<div class='menu-hover'></div>
		<ul>
			<?php foreach( $adminsettings as $name=>$title ) { ?>
				<li><a class='lz-menu-item <?php echo ( $_GET['section']==$name)?'active':''; ?>' alt='<?php echo $name; ?>'1 href='?page=LZSettings&section=<?php echo $name; ?>'><span class='icon' style="background-image:url(<?php echo get_template_directory_uri()?>/inc/images/lz_<?php echo $name; ?>_sml.png)"></span><?php echo (preg_match('/\s/', $title))?'<span class="menu-txt">'.preg_replace('/\s/', '<br />', $title).'</span>':$title; ?></a></li>
			<?php } ?>
		</ul>
		</div>
		<div class='clear'></div>
		<div class='lz-status'></div>
		<div class='lz-progress'><img src="<?php echo get_template_directory_uri()?>/inc/images/ajax-loader.gif" alt="Saving" /></div>
		<div class="button lz-savesettings"><span class='lz-led'></span><?php _e( 'Save Changes', 'lizard' ); ?></div>
		<a href='?page=LZSettings&section=<?php echo $_GET['section']; ?>&action=reset' class='lz-reset'><?php _e( 'Reset', 'lizard' ); ?> <?php echo (isset($adminsettings[$_GET['section']]))?$adminsettings[$_GET['section']]:$theme['Name']; ?> <?php _e( 'settings', 'lizard' ); ?></a>
		<h1 class='lz-title'><?php echo (isset($adminsettings[$_GET['section']]))?$adminsettings[$_GET['section']]:$theme['Name'].' Settings'; ?></h1>
		</div>
		<div class='lz-content'>
		<a class="wp-color-result wp-picker-open" tabindex="0" style="background-color: rgb(245, 245, 245);" title="Select Color" data-current="Current Color"></a>
		<div class='lz-panel'>
			<div class='lz-support btn'><?php _e( 'How to start?', 'lizard' ); ?></div>
			<?php foreach( $adminsettings as $name=>$title ) { ?>
				<a href='?page=LZSettings&section=<?php echo $name; ?>' class='lz-item button-<?php echo $name; ?>' alt='<?php echo $name; ?>'>
					<img alt="<?php echo $title; ?>" src="<?php echo get_template_directory_uri()?>/inc/images/lz_<?php echo $name; ?>.png" class='normal' />
					<img alt="<?php echo $title; ?>" src="<?php echo get_template_directory_uri()?>/inc/images/lz_<?php echo $name; ?>_hover.png" class='hovered' />
					<br />
					<?php echo $title; ?>
				</a>
			<?php } ?>
			<div style='clear:both'></div>
			
		</div>
		
		<div style='clear:both'></div>
		<?php foreach( $adminsettings as $name=>$title ) { ?>
			<div class='lz-page lz-<?php echo $name; ?> <?php echo ( $_GET['section']==$name)?'active':''; ?>' alt='<?php echo $name; ?>'>
			<form action='' class='lz-form' method='POST'>
				<?php foreach( $settingOptions[$name] as $option ) { ?>
				<div class='lz-option'>
					<?php medicine_show_option($name,$option); ?>
				<div class="clear"></div></div>
				<?php } ?>
			</form>
			</div>		
		<?php } ?>
		<div class='lz-page lz-support-page'>
			<dl class='lz-support-menu'>
				<dt><a href='#'>Managing website elements</a></dt>
				<dd><p>Our framework provides easy solution for customizing your website pages. Just authorize on your website as Administrator (you already done this step, if you are reading this text), visit your site, and you will see button "Customize" in the admin bar in the top of your screen. Click by this button. As you can see all elements on your website, such as logo, menus, sidebars, etc. have three buttons on it:</p> 
				<ul>
					<li>&mdash; Red button is for removing element from your pages. ( You can restore it using item "Elements" in admin bar ).</li>
					<li>&mdash; Blue button is for getting information about this element.</li>
					<li>&mdash; Gray button is for customizing this element.</li>
				</ul>
				<p>After you did all necessary customization do not forget to click by "Save Changes" button on admin bar, which is green while customization is not saved.</p>
				</dd>
				<dt><a href='#'>Using showroom</a></dt>
				<dd>
					<p>Showroom box is a tool for displaying appropriate pages of your website on the main page. It might be pages, posts or custom records, such as e-shop items or portfolios. There are two ways for managing showroom on your website:
					<ul>
						<li>&mdash; you can select Showroom source on page General of the theme settings and disable option "Show only records marked for Showroom". In this case your last records will be displayed.</li>
						<li>&mdash; or you can turn on option "Show only records marked for Showroom", and select needed records manually, by turning on option "Show this record in the showroom" on add/edit page.</li>
					</ul>
					</p>
				</dd>
			</dl>
		</div>
		<div class='lz-contacts'>
			<?php _e( 'Theme Author', 'lizard' ); ?>:   <a href="http://lizardthemes.com">LizardThemes</a><br>
		</div>
		</div>
	</div>
	<div class="clear"></div>
	<?php
	
}
function medicine_show_option($section, $option) {
	global $settings;
	
	
	

	switch( $option['type'] ) {
		
		case 'text': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<input autocomplete="off" type="text" name="<?php echo $option['name']; ?>" value="<?php if (isset($settings[$section][$option['name']])) echo htmlspecialchars( $settings[$section][$option['name']] ); ?>" />
		<?php break;
		
		case 'image': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description">
				
				<?php echo $option['description']; ?></p>
				<input type="text" name="<?php echo $option['name']; ?>" value="<?php echo $settings[$section][$option['name']]; ?>" /><span class="lz-imageupload button"><?php _e( 'Upload', 'lizard' ); ?></span>
				<span class="img"><img alt="WordPress Lizard" src="<?php echo $settings[$section][$option['name']]; ?>" /></span>
				<div class="clear"></div>
				
				
		<?php break;
		
		case 'list': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<select name="<?php echo $option['name']; ?>">
					<?php foreach( $option['values'] as $val=>$ttl ) { 
					if ( $val == $settings[$section][$option['name']] ) { $selected=' selected="selected"'; } else $selected='';?>
						<option value="<?php echo $val; ?>"<?php echo $selected; ?>><?php echo $ttl; ?></option>
					<?php } ?>
				</select>
				<div class="clear"></div>
				
		<?php break;
		
		case 'select': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<div class='lz-select'><input type="hidden" name="<?php echo $option['name']; ?>" value="<?php echo $settings[$section][$option['name']]; ?>">
					<?php foreach( $option['values'] as $val=>$src ) { 
					if ( $val == $settings[$section][$option['name']] ) { $selected=' active'; } else $selected='';?>
						<img src="<?php echo get_template_directory_uri()?>/inc/images/<?php echo $src; ?>" class="<?php echo $selected; ?>" alt="<?php echo $val; ?>" />
					<?php } ?>
				</div>
				<div class="clear"></div>
				
		<?php break;
		
		case 'social': 
			$settings[$option['values']]=medicine_loadsettings( $option['values'] );?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<div class='lz-multiselect'>
					<?php foreach( $settings[$option['values']] as $val=>$code ) { 
					if ( in_array($val, $settings[$section][$option['name']]) ) {$selected=' checked="checked"';} else $selected=''; ?>
					<div class='lz-check<?php if (in_array($val, $settings[$section][$option['name']])) echo ' checked'; ?> label'>
						<input type='hidden' <?php if (in_array($val, $settings[$section][$option['name']])) echo 'value="'.$val.'"'; else echo 'alt="'.$val.'"'; ?>  name='<?php echo $option['name']; ?>[]' />
						<?php echo $code['title'];?>
					</div>
						
					<?php } ?>
				</div>
				<div class="clear"></div>
				
		<?php break;
		
		case 'logic': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<div class='lz-check<?php if ($settings[$section][$option['name']]) echo ' checked'; ?>'>
					<input type='hidden' <?php if ($settings[$section][$option['name']]) echo 'value="1"'; else echo 'alt="1"'; ?>  name='<?php echo $option['name']; ?>' />
				</div>
		<?php break;
		
		case 'textarea': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<textarea rows="5" autocomplete="off" name="<?php echo $option['name']; ?>"><?php echo htmlspecialchars( $settings[$section][$option['name']] ); ?></textarea>
		<?php break;
		
		case 'systeminfo': ?>
				<h3><?php echo $option['caption']; ?></h3>
				<p class="description"><?php echo $option['description']; ?></p>
				<input autocomplete="off" type="checkbox" name="allowdetails" value="1" checked="checked" id="allowdetails" /><label for="allowdetails"><?php _e( 'Attach system details to the message', 'lizard' ); ?></label><br />
				<textarea rows="15" autocomplete="off" name="<?php echo $option['name']; ?>"><?php _e( 'Type your message here...', 'lizard' ); ?>
				</textarea>
				<div id='details' style='display:none'>
***
<?php echo $_SERVER['SERVER_NAME']."\r\n"; ?>
<?php echo $_SERVER['SERVER_SOFTWARE']."\r\n"; ?>
<?php echo 'PHP '.phpversion()."\r\n"; ?>
<?php echo $_SERVER["HTTP_USER_AGENT"]."\r\n"; ?>
				</div>
				<script>
					jQuery('input[name="allowdetails"]').live('change', function() {
						if( jQuery(this).is(':checked') ) {
							jQuery('textarea[name="<?php echo $option['name']; ?>"]').val(jQuery('textarea[name="<?php echo $option['name']; ?>"]').val()+jQuery('#details').html());
						} else {
							var message=jQuery('textarea[name="<?php echo $option['name']; ?>"]').val();
							message=message.split('***');
							jQuery('textarea[name="<?php echo $option['name']; ?>"]').val(message[0]);
						}
					});
					jQuery('textarea[name="<?php echo $option['name']; ?>"]').html(jQuery('textarea[name="<?php echo $option['name']; ?>"]').html()+jQuery('#details').html());
				</script>
		<?php break;
		
		case 'submit' : ?>
			<input type="submit" class="button" name="<?php echo $option['name']; ?>" value="<?php echo $option['caption']; ?>" />
			<script>
				jQuery('input[name="<?php echo $option['name']; ?>"]').live('click', function() {
					var data=jQuery('.lz-page.active .lz-form').serialize();
					jQuery('.lz-progress').show();
					jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', {
							'action':'medicine_sendmail',
							'section':jQuery('.lz-page.active').attr('alt'),
							'data':data
						}, 
						function(response){ 
							jQuery('.lz-status').text(response).show();
							jQuery('.lz-progress').hide();
							setTimeout("jQuery('.lz-status').hide()", 2000);
							setTimeout("jQuery('.lz-status').text('');", 2000);
						}
					);
					return false;
				});
			</script>
		<?php break;
		
		case 'paragraph': ?>
			<p><?php echo $option['description']; ?></p>
		<?php break;
		
		case 'frame': ?>
			<h3><?php echo $option['caption']; ?></h3>
			<iframe style="width:100%;height:500px" src="http://lizardthemes.com/latest/"></iframe>
		<?php break;
		
		case 'slides': ?>
			<h3><?php echo $option['caption']; ?></h3>
			<dl class="lz-slides">
			<?php
				if ( isset( $settings[$section][$option['name']] ) ) {
					$i=0;
					foreach( $settings[$section][$option['name']] as $slide) { $i++;?>
						<dt><?php echo $slide['title']; ?><span class="remove"><?php _e( 'Remove', 'lizard' ); ?></span></dt>
						<dd>
							<table>
							<tr><td><?php _e( 'Title', 'lizard' ); ?>:</td><td><input type="text" class="slide-name" name="slides[<?php echo $i; ?>][title]" value="<?php echo $slide['title']; ?>" /></td></tr>
							<tr><td><?php _e( 'Image', 'lizard' ); ?>(1000px x 378px):</td><td><input type="text" name="slides[<?php echo $i; ?>][image]" value="<?php echo $slide['image']; ?>" /><span class="lz-imageupload button"><?php _e( 'Upload', 'lizard' ); ?></span></td></tr>
							<tr><td><?php _e( 'Description', 'lizard' ); ?>:</td><td><input type="text" name="slides[<?php echo $i; ?>][description]" value="<?php echo $slide['description']; ?>" /></td></tr>
							<tr><td><?php _e( 'Link', 'lizard' ); ?>:</td><td><input type="text" name="slides[<?php echo $i; ?>][link]" value="<?php echo $slide['link']; ?>" /></td></tr>
							</table>
						</dd>
					<?php }
				}
			?>
				<dt class="add-new"><?php _e( 'Add new slide...', 'lizard' ); ?></dt>
			</dl>
			<script>
					jQuery('.lz-slides .add-new').live('click', function() {
						var number=jQuery('.lz-slides dt').length+1;
						jQuery(this).removeClass('add-new').text('<?php _e( 'New slide', 'lizard' ); ?>').append(
							jQuery('<span>', {
								'class':'remove'
							}).text('<?php _e( 'Remove', 'lizard' ); ?>')
						);
						jQuery('.lz-slides').append(
							'<dd>'+
							'<table>'+
							'<tr><td><?php _e( 'Title', 'lizard' ); ?>:</td><td><input type="text" class="slide-name" name="slides['+number+'][title]" value="<?php _e( 'New slide', 'lizard' ); ?>" /></td></tr>'+
							'<tr><td><?php _e( 'Image', 'lizard' ); ?>(1000px x 422px):</td><td><input type="text" name="slides['+number+'][image]" value="" /><span class="lz-imageupload button"><?php _e( 'Upload', 'lizard' ); ?></span></td></tr>'+
							'<tr><td><?php _e( 'Description', 'lizard' ); ?>:</td><td><input type="text" name="slides['+number+'][description]" value="<?php _e( 'Description', 'lizard' ); ?>" /></td></tr>'+
							'<tr><td><?php _e( 'Link', 'lizard' ); ?>:</td><td><input type="text" name="slides['+number+'][link]" value="<?php _e( 'Link', 'lizard' ); ?>" /></td></tr>'+
							'</table>'+
							'</dd>'
						).append(
							jQuery('<dt>', {
								'class':'add-new'
							}).text('<?php _e( 'Add new slide...', 'lizard' ); ?>')
						);
						var button=jQuery('.lz-slides dd:last .lz-imageupload');
						new AjaxUpload( button, {
							action: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
							data: {
								action : 'upload_image'
							},
							name: 'uploadfile',
							onComplete: function(file, response){
								jQuery(button).prev('input').val(response);
								jQuery(button).parent().find('.img img').attr('src', response);
							}
						});
					});
					jQuery('.lz-slides .remove').live('click', function() {
						jQuery(this).parents('dt').next('dd').remove();
						jQuery(this).parents('dt').remove();
					});
					jQuery('.lz-slides dt').live('click', function() {
						if (jQuery(this).hasClass('add-new')) return;
						jQuery(this).next('dd').toggleClass('active');
					});
					jQuery('.slide-name').live('change', function() {
						jQuery(this).parents('dd').prev('dt').text(jQuery(this).val());
					});
				</script>
			
		<?php break;
		
	}
}