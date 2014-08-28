<?php


 
function medicine_admin_bar_render() {
    global $wp_admin_bar, $settings;
	$wp_admin_bar->add_node( array('id'=>'lzfont', 'title'=>'<span class="ab-icon"></span><span class="ab-label">Font</span>', 'parent'=>0, 'href'=>false,'meta'=>array('class'=>'lzfontbtn')) );
    $wp_admin_bar->add_node( array('id'=>'lzcustomize', 'title'=>'<span class="ab-icon"></span><span class="ab-label">Customize</span>', 'parent'=>0, 'href'=>false,'meta'=>array('class'=>'lzcustomizebtn')) );
	$wp_admin_bar->add_menu( array('id'=>'lzelements', 'title'=>'Elements', 'parent'=>false, 'href'=>false ) );
	foreach( $settings['elements'] as $key=>$element ) {
		$class=($element['show'])?'lz-elem-add enable':'lz-elem-add';
		$wp_admin_bar->add_node( array('id'=>'lz-'.$key, 'title'=>'<span class="ab-icon2"></span><span class="ab-label">'.$element['title'].'</span>', 'parent'=>'lzelements', 'href'=>false, 'meta'=>array('class'=>$class) ) );
	}
}

function medicine_frontend_footer() {
	global $settings;
	?>
	<datalist id="fontslist">
		<option value="ABeeZee" /><option value="Abel" /><option value="Abril Fatface" /><option value="Aclonica" /><option value="Acme" /><option value="Actor" /><option value="Adamina" /><option value="Advent Pro" /><option value="Aguafina Script" /><option value="Akronim" /><option value="Aladin" /><option value="Aldrich" /><option value="Alef" /><option value="Alegreya" /><option value="Alegreya SC" /><option value="Alex Brush" /><option value="Alfa Slab One" /><option value="Alice" /><option value="Alike" /><option value="Alike Angular" /><option value="Allan" /><option value="Allerta" /><option value="Allerta Stencil" /><option value="Allura" /><option value="Almendra" /><option value="Almendra Display" /><option value="Almendra SC" /><option value="Amarante" /><option value="Amaranth" /><option value="Amatic SC" /><option value="Amethysta" /><option value="Anaheim" /><option value="Andada" /><option value="Andika" /><option value="Angkor" /><option value="Annie Use Your Telescope" /><option value="Anonymous Pro" /><option value="Antic" /><option value="Antic Didone" /><option value="Antic Slab" /><option value="Anton" /><option value="Arapey" /><option value="Arbutus" /><option value="Arbutus Slab" /><option value="Architects Daughter" /><option value="Archivo Black" /><option value="Archivo Narrow" /><option value="Arimo" /><option value="Arizonia" /><option value="Armata" /><option value="Artifika" /><option value="Arvo" /><option value="Asap" /><option value="Asset" /><option value="Astloch" /><option value="Asul" /><option value="Atomic Age" /><option value="Aubrey" /><option value="Audiowide" /><option value="Autour One" /><option value="Average" /><option value="Average Sans" /><option value="Averia Gruesa Libre" /><option value="Averia Libre" /><option value="Averia Sans Libre" /><option value="Averia Serif Libre" /><option value="Bad Script" /><option value="Balthazar" /><option value="Bangers" /><option value="Basic" /><option value="Battambang" /><option value="Baumans" /><option value="Bayon" /><option value="Belgrano" /><option value="Belleza" /><option value="BenchNine" /><option value="Bentham" /><option value="Berkshire Swash" /><option value="Bevan" /><option value="Bigelow Rules" /><option value="Bigshot One" /><option value="Bilbo" /><option value="Bilbo Swash Caps" /><option value="Bitter" /><option value="Black Ops One" /><option value="Bokor" /><option value="Bonbon" /><option value="Boogaloo" /><option value="Bowlby One" /><option value="Bowlby One SC" /><option value="Brawler" /><option value="Bree Serif" /><option value="Bubblegum Sans" /><option value="Bubbler One" /><option value="Buda" /><option value="Buenard" /><option value="Butcherman" /><option value="Butterfly Kids" /><option value="Cabin" /><option value="Cabin Condensed" /><option value="Cabin Sketch" /><option value="Caesar Dressing" /><option value="Cagliostro" /><option value="Calligraffitti" /><option value="Cambo" /><option value="Candal" /><option value="Cantarell" /><option value="Cantata One" /><option value="Cantora One" /><option value="Capriola" /><option value="Cardo" /><option value="Carme" /><option value="Carrois Gothic" /><option value="Carrois Gothic SC" /><option value="Carter One" /><option value="Caudex" /><option value="Cedarville Cursive" /><option value="Ceviche One" /><option value="Changa One" /><option value="Chango" /><option value="Chau Philomene One" /><option value="Chela One" /><option value="Chelsea Market" /><option value="Chenla" /><option value="Cherry Cream Soda" /><option value="Cherry Swash" /><option value="Chewy" /><option value="Chicle" /><option value="Chivo" /><option value="Cinzel" /><option value="Cinzel Decorative" /><option value="Clicker Script" /><option value="Coda" /><option value="Coda Caption" /><option value="Codystar" /><option value="Combo" /><option value="Comfortaa" /><option value="Coming Soon" /><option value="Concert One" /><option value="Condiment" /><option value="Content" /><option value="Contrail One" /><option value="Convergence" /><option value="Cookie" /><option value="Copse" /><option value="Corben" /><option value="Courgette" /><option value="Cousine" /><option value="Coustard" /><option value="Covered By Your Grace" /><option value="Crafty Girls" /><option value="Creepster" /><option value="Crete Round" /><option value="Crimson Text" /><option value="Croissant One" /><option value="Crushed" /><option value="Cuprum" /><option value="Cutive" /><option value="Cutive Mono" /><option value="Damion" /><option value="Dancing Script" /><option value="Dangrek" /><option value="Dawning of a New Day" /><option value="Days One" /><option value="Delius" /><option value="Delius Swash Caps" /><option value="Delius Unicase" /><option value="Della Respira" /><option value="Denk One" /><option value="Devonshire" /><option value="Didact Gothic" /><option value="Diplomata" /><option value="Diplomata SC" /><option value="Domine" /><option value="Donegal One" /><option value="Doppio One" /><option value="Dorsa" /><option value="Dosis" /><option value="Dr Sugiyama" /><option value="Droid Sans" /><option value="Droid Sans Mono" /><option value="Droid Serif" /><option value="Duru Sans" /><option value="Dynalight" /><option value="EB Garamond" /><option value="Eagle Lake" /><option value="Eater" /><option value="Economica" /><option value="Electrolize" /><option value="Elsie" /><option value="Elsie Swash Caps" /><option value="Emblema One" /><option value="Emilys Candy" /><option value="Engagement" /><option value="Englebert" /><option value="Enriqueta" /><option value="Erica One" /><option value="Esteban" /><option value="Euphoria Script" /><option value="Ewert" /><option value="Exo" /><option value="Expletus Sans" /><option value="Fanwood Text" /><option value="Fascinate" /><option value="Fascinate Inline" /><option value="Faster One" /><option value="Fasthand" /><option value="Fauna One" /><option value="Federant" /><option value="Federo" /><option value="Felipa" /><option value="Fenix" /><option value="Finger Paint" /><option value="Fjalla One" /><option value="Fjord One" /><option value="Flamenco" /><option value="Flavors" /><option value="Fondamento" /><option value="Fontdiner Swanky" /><option value="Forum" /><option value="Francois One" /><option value="Freckle Face" /><option value="Fredericka the Great" /><option value="Fredoka One" /><option value="Freehand" /><option value="Fresca" /><option value="Frijole" /><option value="Fruktur" /><option value="Fugaz One" /><option value="GFS Didot" /><option value="GFS Neohellenic" /><option value="Gabriela" /><option value="Gafata" /><option value="Galdeano" /><option value="Galindo" /><option value="Gentium Basic" /><option value="Gentium Book Basic" /><option value="Geo" /><option value="Geostar" /><option value="Geostar Fill" /><option value="Germania One" /><option value="Gilda Display" /><option value="Give You Glory" /><option value="Glass Antiqua" /><option value="Glegoo" /><option value="Gloria Hallelujah" /><option value="Goblin One" /><option value="Gochi Hand" /><option value="Gorditas" /><option value="Goudy Bookletter 1911" /><option value="Graduate" /><option value="Grand Hotel" /><option value="Gravitas One" /><option value="Great Vibes" /><option value="Griffy" /><option value="Gruppo" /><option value="Gudea" /><option value="Habibi" /><option value="Hammersmith One" /><option value="Hanalei" /><option value="Hanalei Fill" /><option value="Handlee" /><option value="Hanuman" /><option value="Happy Monkey" /><option value="Headland One" /><option value="Henny Penny" /><option value="Herr Von Muellerhoff" /><option value="Holtwood One SC" /><option value="Homemade Apple" /><option value="Homenaje" /><option value="IM Fell DW Pica" /><option value="IM Fell DW Pica SC" /><option value="IM Fell Double Pica" /><option value="IM Fell Double Pica SC" /><option value="IM Fell English" /><option value="IM Fell English SC" /><option value="IM Fell French Canon" /><option value="IM Fell French Canon SC" /><option value="IM Fell Great Primer" /><option value="IM Fell Great Primer SC" /><option value="Iceberg" /><option value="Iceland" /><option value="Imprima" /><option value="Inconsolata" /><option value="Inder" /><option value="Indie Flower" /><option value="Inika" /><option value="Irish Grover" /><option value="Istok Web" /><option value="Italiana" /><option value="Italianno" /><option value="Jacques Francois" /><option value="Jacques Francois Shadow" /><option value="Jim Nightshade" /><option value="Jockey One" /><option value="Jolly Lodger" /><option value="Josefin Sans" /><option value="Josefin Slab" /><option value="Joti One" /><option value="Judson" /><option value="Julee" /><option value="Julius Sans One" /><option value="Junge" /><option value="Jura" /><option value="Just Another Hand" /><option value="Just Me Again Down Here" /><option value="Kameron" /><option value="Karla" /><option value="Kaushan Script" /><option value="Kavoon" /><option value="Keania One" /><option value="Kelly Slab" /><option value="Kenia" /><option value="Khmer" /><option value="Kite One" /><option value="Knewave" /><option value="Kotta One" /><option value="Koulen" /><option value="Kranky" /><option value="Kreon" /><option value="Kristi" /><option value="Krona One" /><option value="La Belle Aurore" /><option value="Lancelot" /><option value="Lato" /><option value="League Script" /><option value="Leckerli One" /><option value="Ledger" /><option value="Lekton" /><option value="Lemon" /><option value="Libre Baskerville" /><option value="Life Savers" /><option value="Lilita One" /><option value="Lily Script One" /><option value="Limelight" /><option value="Linden Hill" /><option value="Lobster" /><option value="Lobster Two" /><option value="Londrina Outline" /><option value="Londrina Shadow" /><option value="Londrina Sketch" /><option value="Londrina Solid" /><option value="Lora" /><option value="Love Ya Like A Sister" /><option value="Loved by the King" /><option value="Lovers Quarrel" /><option value="Luckiest Guy" /><option value="Lusitana" /><option value="Lustria" /><option value="Macondo" /><option value="Macondo Swash Caps" /><option value="Magra" /><option value="Maiden Orange" /><option value="Mako" /><option value="Marcellus" /><option value="Marcellus SC" /><option value="Marck Script" /><option value="Margarine" /><option value="Marko One" /><option value="Marmelad" /><option value="Marvel" /><option value="Mate" /><option value="Mate SC" /><option value="Maven Pro" /><option value="McLaren" /><option value="Meddon" /><option value="MedievalSharp" /><option value="Medula One" /><option value="Megrim" /><option value="Meie Script" /><option value="Merienda" /><option value="Merienda One" /><option value="Merriweather" /><option value="Merriweather Sans" /><option value="Metal" /><option value="Metal Mania" /><option value="Metamorphous" /><option value="Metrophobic" /><option value="Michroma" /><option value="Milonga" /><option value="Miltonian" /><option value="Miltonian Tattoo" /><option value="Miniver" /><option value="Miss Fajardose" /><option value="Modern Antiqua" /><option value="Molengo" /><option value="Molle" /><option value="Monda" /><option value="Monofett" /><option value="Monoton" /><option value="Monsieur La Doulaise" /><option value="Montaga" /><option value="Montez" /><option value="Montserrat" /><option value="Montserrat Alternates" /><option value="Montserrat Subrayada" /><option value="Moul" /><option value="Moulpali" /><option value="Mountains of Christmas" /><option value="Mouse Memoirs" /><option value="Mr Bedfort" /><option value="Mr Dafoe" /><option value="Mr De Haviland" /><option value="Mrs Saint Delafield" /><option value="Mrs Sheppards" /><option value="Muli" /><option value="Mystery Quest" /><option value="Neucha" /><option value="Neuton" /><option value="New Rocker" /><option value="News Cycle" /><option value="Niconne" /><option value="Nixie One" /><option value="Nobile" /><option value="Nokora" /><option value="Norican" /><option value="Nosifer" /><option value="Nothing You Could Do" /><option value="Noticia Text" /><option value="Noto Sans" /><option value="Noto Serif" /><option value="Nova Cut" /><option value="Nova Flat" /><option value="Nova Mono" /><option value="Nova Oval" /><option value="Nova Round" /><option value="Nova Script" /><option value="Nova Slim" /><option value="Nova Square" /><option value="Numans" /><option value="Nunito" /><option value="Odor Mean Chey" /><option value="Offside" /><option value="Old Standard TT" /><option value="Oldenburg" /><option value="Oleo Script" /><option value="Oleo Script Swash Caps" /><option value="Open Sans" /><option value="Open Sans Condensed" /><option value="Oranienbaum" /><option value="Orbitron" /><option value="Oregano" /><option value="Orienta" /><option value="Original Surfer" /><option value="Oswald" /><option value="Over the Rainbow" /><option value="Overlock" /><option value="Overlock SC" /><option value="Ovo" /><option value="Oxygen" /><option value="Oxygen Mono" /><option value="PT Mono" /><option value="PT Sans" /><option value="PT Sans Caption" /><option value="PT Sans Narrow" /><option value="PT Serif" /><option value="PT Serif Caption" /><option value="Pacifico" /><option value="Paprika" /><option value="Parisienne" /><option value="Passero One" /><option value="Passion One" /><option value="Pathway Gothic One" /><option value="Patrick Hand" /><option value="Patrick Hand SC" /><option value="Patua One" /><option value="Paytone One" /><option value="Peralta" /><option value="Permanent Marker" /><option value="Petit Formal Script" /><option value="Petrona" /><option value="Philosopher" /><option value="Piedra" /><option value="Pinyon Script" /><option value="Pirata One" /><option value="Plaster" /><option value="Play" /><option value="Playball" /><option value="Playfair Display" /><option value="Playfair Display SC" /><option value="Podkova" /><option value="Poiret One" /><option value="Poller One" /><option value="Poly" /><option value="Pompiere" /><option value="Pontano Sans" /><option value="Port Lligat Sans" /><option value="Port Lligat Slab" /><option value="Prata" /><option value="Preahvihear" /><option value="Press Start 2P" /><option value="Princess Sofia" /><option value="Prociono" /><option value="Prosto One" /><option value="Puritan" /><option value="Purple Purse" /><option value="Quando" /><option value="Quantico" /><option value="Quattrocento" /><option value="Quattrocento Sans" /><option value="Questrial" /><option value="Quicksand" /><option value="Quintessential" /><option value="Qwigley" /><option value="Racing Sans One" /><option value="Radley" /><option value="Raleway" /><option value="Raleway Dots" /><option value="Rambla" /><option value="Rammetto One" /><option value="Ranchers" /><option value="Rancho" /><option value="Rationale" /><option value="Redressed" /><option value="Reenie Beanie" /><option value="Revalia" /><option value="Ribeye" /><option value="Ribeye Marrow" /><option value="Righteous" /><option value="Risque" /><option value="Roboto" /><option value="Roboto Condensed" /><option value="Roboto Slab" /><option value="Rochester" /><option value="Rock Salt" /><option value="Rokkitt" /><option value="Romanesco" /><option value="Ropa Sans" /><option value="Rosario" /><option value="Rosarivo" /><option value="Rouge Script" /><option value="Ruda" /><option value="Rufina" /><option value="Ruge Boogie" /><option value="Ruluko" /><option value="Rum Raisin" /><option value="Ruslan Display" /><option value="Russo One" /><option value="Ruthie" /><option value="Rye" /><option value="Sacramento" /><option value="Sail" /><option value="Salsa" /><option value="Sanchez" /><option value="Sancreek" /><option value="Sansita One" /><option value="Sarina" /><option value="Satisfy" /><option value="Scada" /><option value="Schoolbell" /><option value="Seaweed Script" /><option value="Sevillana" /><option value="Seymour One" /><option value="Shadows Into Light" /><option value="Shadows Into Light Two" /><option value="Shanti" /><option value="Share" /><option value="Share Tech" /><option value="Share Tech Mono" /><option value="Shojumaru" /><option value="Short Stack" /><option value="Siemreap" /><option value="Sigmar One" /><option value="Signika" /><option value="Signika Negative" /><option value="Simonetta" /><option value="Sintony" /><option value="Sirin Stencil" /><option value="Six Caps" /><option value="Skranji" /><option value="Slackey" /><option value="Smokum" /><option value="Smythe" /><option value="Sniglet" /><option value="Snippet" /><option value="Snowburst One" /><option value="Sofadi One" /><option value="Sofia" /><option value="Sonsie One" /><option value="Sorts Mill Goudy" /><option value="Source Code Pro" /><option value="Source Sans Pro" /><option value="Special Elite" /><option value="Spicy Rice" /><option value="Spinnaker" /><option value="Spirax" /><option value="Squada One" /><option value="Stalemate" /><option value="Stalinist One" /><option value="Stardos Stencil" /><option value="Stint Ultra Condensed" /><option value="Stint Ultra Expanded" /><option value="Stoke" /><option value="Strait" /><option value="Sue Ellen Francisco" /><option value="Sunshiney" /><option value="Supermercado One" /><option value="Suwannaphum" /><option value="Swanky and Moo Moo" /><option value="Syncopate" /><option value="Tangerine" /><option value="Taprom" /><option value="Tauri" /><option value="Telex" /><option value="Tenor Sans" /><option value="Text Me One" /><option value="The Girl Next Door" /><option value="Tienne" /><option value="Tinos" /><option value="Titan One" /><option value="Titillium Web" /><option value="Trade Winds" /><option value="Trocchi" /><option value="Trochut" /><option value="Trykker" /><option value="Tulpen One" /><option value="Ubuntu" /><option value="Ubuntu Condensed" /><option value="Ubuntu Mono" /><option value="Ultra" /><option value="Uncial Antiqua" /><option value="Underdog" /><option value="Unica One" /><option value="UnifrakturCook" /><option value="UnifrakturMaguntia" /><option value="Unkempt" /><option value="Unlock" /><option value="Unna" /><option value="VT323" /><option value="Vampiro One" /><option value="Varela" /><option value="Varela Round" /><option value="Vast Shadow" /><option value="Vibur" /><option value="Vidaloka" /><option value="Viga" /><option value="Voces" /><option value="Volkhov" /><option value="Vollkorn" /><option value="Voltaire" /><option value="Waiting for the Sunrise" /><option value="Wallpoet" /><option value="Walter Turncoat" /><option value="Warnes" /><option value="Wellfleet" /><option value="Wendy One" /><option value="Wire One" /><option value="Yanone Kaffeesatz" /><option value="Yellowtail" /><option value="Yeseva One" /><option value="Yesteryear" /><option value="Zeyada" />
	</datalist>
		<div class="lzfont-customize">
			<p><?php _e( 'Heading font', 'lizard' ); ?><br /><input type="text" name="heading" value="<?php echo $settings['fonts']['heading']; ?>" list="fontslist" class="fontselector" data-font="h1, h2, h3, h4, h5, h6" /><img src="<?php echo get_template_directory_uri().'/images/lz/gglfontapply.png'; ?>" alt="Apply" /></p>
			<p><?php _e( 'Text font', 'lizard' ); ?><br /><input type="text" name="body" value="<?php echo $settings['fonts']['body']; ?>" list="fontslist" class="fontselector" data-font="body, input, textarea, select, code" /><img src="<?php echo get_template_directory_uri().'/images/lz/gglfontapply.png'; ?>" alt="Apply" /></p>
			<p><?php _e( 'Menus and buttons font', 'lizard' ); ?><br /><input type="text" name="menu" value="<?php echo $settings['fonts']['menu']; ?>" list="fontslist" class="fontselector" data-font=".menu, .readmore, #submit, .post-password-required form input[type='submit'], .button" /><img src="<?php echo get_template_directory_uri().'/images/lz/gglfontapply.png'; ?>" alt="Apply" /></p>
			<p><a href='#' style='color:#fff' class="load_default_fonts"><?php _e( 'Default', 'lizard' ); ?></a></p>
		</div>
<?php }

add_action( 'wp_before_admin_bar_render', 'medicine_admin_bar_render' );
add_action( 'wp_footer', 'medicine_frontend_footer'); 

function medicine_customization() {  
	global $settings; ?>
	<style>
		#wp-admin-bar-lzelements {
			display:none;
		}
	</style>
	<script>
		jQuery('.load_default_fonts').live('click', function() {
			<?php 
				include_once ( get_template_directory().'/inc/default.php' );
				$fonts=$lz_default['fonts']; 
				foreach ($fonts as $name=>$font) { ?>
					jQuery('.lzfont-customize input[name="<?php echo $name; ?>"]').val('<?php echo $font; ?>');
				<?php }
			?>
			jQuery('.fontselector').change();
		});
		jQuery('.fontselector').live('change', function() {
			jQuery("#gglFont"+jQuery(this).attr('name')).remove();
			jQuery('head').append( '<link href="http://fonts.googleapis.com/css?family='+jQuery(this).val()+'&subset=latin,cyrillic" rel="stylesheet" type="text/css" />' );
			jQuery('head').append( '<style id="gglFont'+jQuery(this).attr('name')+'"> '+jQuery(this).attr('data-font')+' { font-family: "'+jQuery(this).val()+'"} input[name="'+jQuery(this).attr('name')+'"] { font-family: "'+jQuery(this).val()+'"}</style>' );
		});
		jQuery('.lzfontbtn div').live('click', function() {
			jQuery(this).text('Save Changes').parents('.lzfontbtn').addClass('lzsave').removeClass('lzfontbtn');
			jQuery('.lzfont-customize').css('left', jQuery(this).offset().left).slideDown(100);
		});
		jQuery('#wp-admin-bar-lzfont.lzsave div').live('click', function() {
			var data = {};
			jQuery('.lzfont-customize input').each(function() {
				data[jQuery(this).attr('name')]=jQuery(this).val();
			});

			jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', {
				  'action':'save_fonts',
				  'data':data
			   }, 
			   function(response){ ; }
			);
			jQuery(this).html('<span class="ab-icon"></span><span class="ab-label">Font</span>').parents('.lzsave').addClass('lzfontbtn').removeClass('lzsave');
			jQuery('.lzfont-customize').slideUp(100);
		});
		
		
		var elements;
		jQuery(document).ready(function(){
			jQuery('.lzblock').each(function() {
				jQuery(this).addClass('lz-'+jQuery(this).attr('data-block'));
			});
			<?php
				$s=array();
				foreach ($settings['elements'] as $name=>$params) {
					$s[]='\''.$name.'\':{\'help\':\''.$params['help'].'\',\'edit\':\''.admin_url($params['edit']).'\'}';
				}
				$s=implode(',', $s);
					
			?>
			elements = { <?php echo $s; ?> }
			
		});
		jQuery('#wp-admin-bar-lzcustomize.lzcustomizebtn div').live('click', function() {
			jQuery('body').addClass('lzcustomize');
			//jQuery('html').css('padding-top','50px');
			jQuery('.lzblock .remove').live('click', function() {
				jQuery(this).parents('.lzblock').hide(500);
				jQuery('#wp-admin-bar-lz-'+jQuery(this).parents('.lzblock').attr('data-block')).removeClass('enable');
				if (jQuery(this).parents('.lzblock').attr('data-block')=='leftsidebar') {
					jQuery('#container').css({
						'margin-left':'0',
						'width':'+=<?php echo $settings['theme']['sidebar-width']; ?>px'
					});
				}
				if (jQuery(this).parents('.lzblock').attr('data-block')=='rightsidebar') {
					jQuery('#container').css({
						'margin-right':'0',
						'width':'+=<?php echo $settings['theme']['sidebar-width']; ?>px'
					});
				}
			});
			
			jQuery('.lzblock').each(function() {
				
				var lzremove=jQuery('<div>', {
				'class':'remove'
				});
				var lzedit=jQuery('<a>', {
					'class':'edit',
					'href':elements[jQuery(this).attr('data-block')]['edit']
				});
				var lzhelp=jQuery('<a>', {
					'class':'help',
					'href':'http://lizardthemes.com/documentation/'+elements[jQuery(this).attr('data-block')]['help']
				});
				jQuery(this).append(lzremove).append(lzedit).append(lzhelp);
			});
			
			
			
			jQuery('#wp-admin-bar-lzelements').show();
			jQuery(this).text('Save Changes').parents('.lzcustomizebtn').addClass('lzsave').removeClass('lzcustomizebtn');
		});
		jQuery('#wp-admin-bar-lzcustomize.lzsave div').live('click', function() {
			jQuery('.lzblock .remove').remove();
			jQuery('.lzblock .edit').remove();
			jQuery('.lzblock .help').remove();
			jQuery('body').removeClass('lzcustomize');
			jQuery(this).html('<span class="ab-icon"></span><span class="ab-label">Customize</span>').parents('.lzsave').addClass('lzcustomizebtn').removeClass('lzsave');
			jQuery('#wp-admin-bar-lzelements').hide();
			var data={
			<?php
				$data=array();
				foreach( $settings['elements'] as $key=>$element ) {
					$data[]='\''.$key.'\':\''.$element['show'].'\'';
				}
				echo implode(',', $data);
			?>
			};
			jQuery('.lzblock').each(function(){
				data[jQuery(this).attr('data-block')]=jQuery(this).css('display');
			});
			jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', {
				  'action':'save_customize',
				  'data':data
			   }, 
			   function(response){ ; }
			);
		});
		jQuery('.lz-elem-add div').live('click', function() {
			jQuery(this).parents('.lz-elem-add').addClass('enable');
			var elem=jQuery(this).parents('.lz-elem-add').attr('id');
			elem=elem.replace('wp-admin-bar-', '');
			jQuery('.'+elem).show(500);
			if (elem=='lz-leftsidebar') {
				jQuery('#container').css({
					'margin-left':'<?php echo $settings['theme']['sidebar-width']; ?>px',
					'width':'-=<?php echo $settings['theme']['sidebar-width']; ?>px'
				});
			}
			if (elem=='lz-rightsidebar') {
				jQuery('#container').css({
					'margin-right':'<?php echo $settings['theme']['sidebar-width']; ?>px',
					'width':'-=<?php echo $settings['theme']['sidebar-width']; ?>px'
				});
			}
		});
	</script>
<?php }

add_action('wp_head', 'medicine_customization');

