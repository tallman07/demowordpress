/**
 *
 * Script for dashboard Medicine
 * Author: LizardThemes.com
 * 
 * Licensed under the GPL license
 * 
 */
jQuery('#page_template').live('change', function() {
	if (jQuery(this).val()=='feedback.php') {
		jQuery('#feedback_options').show()
		location.href='#feedback_options';
	} else {
		jQuery('#feedback_options').hide()
	}
});

jQuery('.lz-check').live('click', function() {
	jQuery(this).toggleClass('checked');
	if ( jQuery(this).hasClass('checked') ) {
		jQuery(this).find('input').val(jQuery(this).find('input').attr('alt'));
	} else {
		jQuery(this).find('input').attr('alt',jQuery(this).find('input').val());
		jQuery(this).find('input').val('');
	}
});
jQuery('.feedback-departments li').live('click', function() {//department-details-container
	if (jQuery(this).hasClass('newdepartment')) {
		
		var number=jQuery('.department-details').length+1;
		jQuery('.department-details-container').append(
			jQuery('<div>',{
				'class':'department-details',
				'alt':number
			}).append(
				jQuery('<span>', {
					'class':'department-remove button'
				}).text('Remove this department')
			).append(
				jQuery('<table>').append(
					jQuery('<tr>').append(
						jQuery('<td>', {
							'width':'200px'
						}).text('Title')
					).append(
						jQuery('<td>').append(
							jQuery('<input>', {
								'type':'text',
								'name':'feedback-options[department]['+number+'][title][value]',
								'value':'Office name',
								'class':'department-ttl'
							})
						).append(
							jQuery('<input>', {
								'type':'hidden',
								'name':'feedback-options[department]['+number+'][title][name]',
								'value':'title'
							})
						)
					)
				).append(
					jQuery('<tr>').append(
						jQuery('<td>').html('Email (show on contact page <input type="checkbox" name="feedback-options[department]['+number+'][email][show]" value="1" />)')
					).append(
						jQuery('<td>').append(
							jQuery('<input>', {
								'type':'text',
								'name':'feedback-options[department]['+number+'][email][value]',
								'value':admin_mail
							})
						).append(
							jQuery('<input>', {
								'type':'hidden',
								'name':'feedback-options[department]['+number+'][email][name]',
								'value':'Email'
							})
						)
					)
				).append(
					jQuery('<tr>').append(
						jQuery('<td>', {
							'colspan':'3'
						}).append(
							jQuery('<div>', {
								'class':'button more_details'
							}).text('Add contact...')
						)
					)
				)
			)
		);
		jQuery(this).removeClass('newdepartment').text('Office Name');
		jQuery('.feedback-departments ul').append(jQuery('<li>', { 'class':'newdepartment' }).text('Add new...'));
	}
	jQuery(this).addClass('active').siblings().removeClass('active');
	jQuery('.department-details').eq(jQuery(this).index()).show().siblings().hide();
});

jQuery('.more_details').live('click', function() {
	var number=jQuery(this).parents('.department-details').attr('alt');
	var option=jQuery(this).parents('table').find('tr').length;
	jQuery(this).parents('tr').before(
		jQuery('<tr>').append(
			jQuery('<td>').append(
				jQuery('<input>', {
					'type':'text',
					'name':'feedback-options[department]['+number+']['+option+'][name]',
					'value':''
				})
			)
		).append(
			jQuery('<td>').append(
				jQuery('<input>', {
					'type':'text',
					'name':'feedback-options[department]['+number+']['+option+'][value]',
					'value':''
				})
			)
		).append(
			jQuery('<td>', {
				'width':'80px'
			}).append(
				jQuery('<span>', {
					'class':'detail-remove button'
				}).text('Remove this')
			)
		)
	);
});

jQuery('.detail-remove').live('click', function() {
	jQuery(this).parents('tr').remove();
});

jQuery('.department-remove').live('click', function() {
	jQuery('.feedback-departments ul li').eq(jQuery(this).parents('.department-details').index()).remove();
	jQuery(this).parents('.department-details').remove();
	if (!jQuery('.feedback-departments ul li:first').hasClass('newdepartment')) jQuery('.feedback-departments ul li:first').click();
});

jQuery('.department-details .department-ttl').live('change', function() {
	var index=jQuery(this).parents('.department-details').index();
	jQuery('.feedback-departments li').eq(index).text(jQuery(this).val());
});