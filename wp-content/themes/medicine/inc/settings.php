<?php
	$adminsettings=array(
		'general'=>'General',
		'slider'=>'Slider',
		'showroom'=>'Showroom',
		'layout'=>'Layout',
		'menus'=>'Menus',
		'integration'=>'Integration',
		'_contactform'=>'Support',
		'_freshthemes'=>'Themes'
	);
	$settingOptions=array();
	$post_types=get_post_types(array(),'objects');
	$types=array();
	foreach ($post_types as $name=>$type ) {
		if (!in_array($name, array('attachment', 'revision', 'nav_menu_item', 'slides')))
		$types[$name]=$type->label;
	}
	$settingOptions['general'] = array(
		array(
			'name'=>'site_title',
			'type'=>'text',
			'caption'=>'Site Title',
			'callback'=>'sitetitle',
			'description'=>'The site title might be the name of your company or organization, or a brief description of the organization, or a combination of the two. In the field you can specify format for the site title. Allowed codes:<br />&nbsp;&nbsp;%1$s - Page title<br />&nbsp;&nbsp;%2$s - Blog name'
		),
		array(
			'name'=>'logo',
			'type'=>'image',
			'caption'=>'Logo',
			'description'=>'A logo is a graphic mark or emblem commonly used by commercial enterprises, organizations and even individuals to aid and promote instant public recognition. Please specify URL of your logo image or upload it on the server using button "Upload".'
		),
		array(
			'name'=>'favicon',
			'type'=>'image',
			'caption'=>'Favicon',
			'description'=>'A favicon (Web site icon) is a file containing one small icon, most commonly 16x16 pixels, associated with a particular Web site or Web page. Please specify URL of your logo image or upload it on the server using button "Upload".'
		),
		array(
			'name'=>'footer_txt',
			'type'=>'text',
			'caption'=>'Footer text',
			'description'=>'This is the text, which will be displayed in your footer. This is the most suitable place for your copyrights.'
		),
	);
	
	$settingOptions['showroom'] = array(
		array(
			'name'=>'srinnerpages',
			'type'=>'logic',
			'caption'=>'Show Showroom on inner pages?',
			'description'=>'Turn this option ON to show showroom on inner pages. If this option is OFF, Showroom will be displayed only on the Home page.'
		),
		array(
			'name'=>'showroomsrc',
			'type'=>'list',
			'values'=>$types,
			'caption'=>'Showroom Source',
			'description'=>'You can choose different types of records to show in the top of your homepage. It may be a post, a page or some custom record like goods of your market.'
		),
		array(
			'name'=>'length',
			'type'=>'text',
			'caption'=>'Text length',
			'description'=>'Text of each post in showroom will be cut to the length, specified in this field.'
		),
		array(
			'name'=>'onlymarked',
			'type'=>'logic',
			'caption'=>'Show only records marked for Showroom',
			'description'=>'If this option is ON, records will be displayed only if you mark them as "Show this record in the showroom" on add/edit page.'
		),
		array(
			'name'=>'srreadmore',
			'type'=>'text',
			'caption'=>'Showroom link text',
			'description'=>'Text of the link to full page of record in the showroom. It might be "Read More", "Buy", "Details" or something on your choice.'
		),
	);
		
	$settingOptions['slider'] = array(
		array(
			'name'=>'slides',
			'type'=>'slides',
			'caption'=>'Slides',
			'description'=>''
		),
		array(
			'name'=>'innerpages',
			'type'=>'logic',
			'caption'=>'Show Slider on inner pages?',
			'description'=>'Turn this option ON to show slider on inner pages. If this option is OFF, Slider will be displayed only on the Home page.'
		),
		array(
			'name'=>'speed',
			'type'=>'text',
			'caption'=>'Slider speed',
			'description'=>'The slider speed is a time (milliseconds), during which one slide will be replaced by another.'
		),
		array(
			'name'=>'delay',
			'type'=>'text',
			'caption'=>'Slider delay',
			'description'=>'The delay is a time (milliseconds), during which one slide will be displayed before changing. Recommended to specify a sufficient period of time so that your visitors have time to get acquainted with the contents of the slide.'
		),
		array(
			'name'=>'effect',
			'type'=>'list',
			'values'=>array(
				'blindX'=>'Blind X',
				'blindY'=>'Blind Y',
				'blindZ'=>'Blind Z',
				'cover'=>'Cover',
				'curtainX'=>'Curtain X',
				'curtainY'=>'Curtain Y',
				'fade'=>'Fade',
				'fadeZoom'=>'Fade zoom',
				'growX'=>'Grow X',
				'growY'=>'Grow Y',
				'scrollUp'=>'Scroll up',
				'scrollDown'=>'Scroll down',
				'scrollLeft'=>'Scroll left',
				'scrollRight'=>'Scroll right',
				'scrollHorz'=>'Scroll Horizontal',
				'scrollVert'=>'Scroll Vertical',
				'shuffle'=>'Shuffle',
				'slideX'=>'Slide X',
				'slideY'=>'Slide Y',
				'toss'=>'Toss',
				'turnUp'=>'Turn up',
				'turnDown'=>'Turn down',
				'turnLeft'=>'Turn left',
				'turnRight'=>'Turn right',
				'uncover'=>'Uncover',
				'wipe'=>'Wipe',
				'zoom'=>'Zoom'
			),
			'caption'=>'Slider effect',
			'description'=>'Please choose an effect, which will be used to change slides.'
		),
	);
	
	$settingOptions['layout'] = array(
		array(
			'name'=>'fimage_width',
			'type'=>'text',
			'caption'=>'Featured image width',
			'description'=>'This is a width of the featured images. Please note after changing this param, old images will be displayed in old sizes. To change old images you need to re-upload them.'
		),
		array(
			'name'=>'fimage_height',
			'type'=>'text',
			'caption'=>'Featured image height',
			'description'=>'This is a height of the featured images. Please note after changing this param, old images will be displayed in old sizes. To change old images you need to re-upload them.'
		),
		array(
			'name'=>'fimage_position',
			'type'=>'select',
			'values'=>array(
				'alignleft'=>'image_left.png',
				'alignright'=>'image_right.png',
				'aligncenter'=>'image_center.png'
			),
			'caption'=>'Featured image position',
			'description'=>'This option allows you to change featured image position in the post. Just click by suitable image to choose.'
		),
		array(
			'name'=>'cutcontent',
			'type'=>'logic',
			'caption'=>'Cut content in listing',
			'description'=>'Turn this option ON to cut post content in the listing. This option will be ignored when showing a single post. Also if a post has content in the field "Excerpt", this content will be displayed in the listing, instead cut post content. If a post has tag <!--more--> in it, this option also will be ignored and post will be cut before <!--more-->.'
		),
		array(
			'name'=>'contentlength',
			'type'=>'text',
			'caption'=>'Length of the content in the listing',
			'description'=>'Specify length of the content in listing. To use this option turn on "Cut content in listing"'
		),
		array(
			'name'=>'pagination',
			'type'=>'list',
			'values'=>array(
				'wp' => 'Standard WordPress pagination', 
				'numeric' => 'Numeric pagination', 
				'dynamic' => 'Load next pages dynamically'
			),
			'caption'=>'Pagination type',
			'description'=>'You can choose one of three types of pagination. Standard WordPress pagination displays links, which allow you to go to newer posts page or Older posts page. Numeric pagination displays numbers of pages, instead links to the next and to the previous pages. If you choose dynamic pagination, the next pages will be loading dynamically, when user scrolls the browser window to the last post.'
		),
		array(
			'name'=>'relatedposts',
			'type'=>'logic',
			'caption'=>'Show related posts',
			'description'=>'If you want to show related posts to your visitors on each post page, turn on this option.'
		)
		
	);
	$settingOptions['menus'] = array(
		array(
			'name'=>'effect',
			'type'=>'list',
			'values'=>array(
				'standard' => 'Standard (no effect)', 
				'slidedown' => 'Slide Down', 
				'fade' => 'Fade',
				'slideleft' => 'Fade & slide from left',
				'slideright' => 'Fade & slide from right',
			),
			'caption'=>'Drop down menus effect',
			'description'=>'Drop down menus on your website may be displayed using various effects. You can choose effect for drop down menus in this list.'
		),
		array(
			'name'=>'speed',
			'type'=>'text',
			'caption'=>'Speed',
			'description'=>'The Speed is a time (milliseconds), during which the drop-down menu will be opened.'
		),
		array(
			'name'=>'delay',
			'type'=>'text',
			'caption'=>'Delay',
			'description'=>'The Delay is a time (milliseconds), during which the drop-down menu will be displayed.'
		),
		array(
			'name'=>'showarrows',
			'type'=>'logic',
			'caption'=>'Show Arrows',
			'description'=>'If this option is enabled, an arrow will be displayed next to the menu items that contain child elements.'
		)
	);
	$settingOptions['integration'] = array(
		array(
			'name'=>'css',
			'type'=>'textarea',
			'caption'=>'Custom CSS',
			'description'=>'If you need to change something in the CSS of the theme, but you do not have an access to the style.css file, you can add CSS options in this field.'
		),
		array(
			'name'=>'headcode',
			'type'=>'textarea',
			'caption'=>'Custom Head Code',
			'description'=>'This option used to attach additional code to the head of your website. For example you can integrate your website with Google Analitics, by adding GA code to this field.'
		),
	);
	$settingOptions['_contactform'] = array(
		array(
			'name'=>'description',
			'type'=>'paragraph',
			'caption'=>'',
			'description'=>'If there is anything we can do to assist you with this template, please use form below to contact us. We take your privacy seriously and will take all measures to protect your personal information. Any personal information received will only be used to solve your issues. We will not sell or redistribute your information to anyone. <br /><br />You can also read <a href="http://lizardthemes.com/faq/">F.A.Q.</a>, <a href="http://lizardthemes.com/documentation/">documentation</a> and visit our <a href="http://lizardthemes.com/forum/">forum</a> for support.'
		),
		array(
			'name'=>'topic',
			'type'=>'text',
			'caption'=>'Topic',
			'description'=>'You can specify in this field short description of your question.'
		),
		array(
			'name'=>'email',
			'type'=>'text',
			'caption'=>'Email',
			'description'=>'Please specify your email address, which we can use to contact you.'
		),
		array(
			'name'=>'name',
			'type'=>'text',
			'caption'=>'Name',
			'description'=>'Your name.'
		),
		array(
			'name'=>'message',
			'type'=>'systeminfo',
			'caption'=>'Message',
			'description'=>'Please describe your question in details. If you have problem with the theme, for the most rapid solution, we recommend that you enable the option "Attach system details to the message".'
		),
		array(
			'name'=>'submit',
			'type'=>'submit',
			'value'=>'support@lizardthemes.com',
			'caption'=>'Send',
			'description'=>''
		),
	);
	$settingOptions['_freshthemes'] = array(
		array(
			'name'=>'themes',
			'type'=>'frame',
			'value'=>'http://lizardthemes.com/latest/',
			'caption'=>'Latest Themes',
			'description'=>''
		),
	);