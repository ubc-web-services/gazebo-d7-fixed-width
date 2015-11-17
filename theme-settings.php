<?php
/**
* Implementation of THEMEHOOK_settings_alter() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/

function gazebo_form_system_theme_settings_alter(&$form, $form_state) {

// add colourpicker js
drupal_add_js(path_to_theme() . '/farbtastic/farbtastic.js');
drupal_add_css(path_to_theme() . '/farbtastic/farbtastic.css');

drupal_add_js(path_to_theme() . '/custom.js');

// Theme help and documentation
$form['markup'] = array(
    '#title' => 'View theme documentation',
    '#value' => '<div id="view-documentation-button"><a href="http://google.com">View documentation</a></div>',
    '#weight' => -10,
);

$form['clf_form_description'] = array('#type' => 'markup', '#value' => '<h2>' . t('UBC Common Look and Feel Theme Settings') . '</h2><p>See <a href="http://www.publicaffairs.ubc.ca/ccwp/"  target="_blank">UBC Visual Identity</a> site for details.</p>');
  
// Layout options
$form['layout'] = array(
    '#type' => 'fieldset',
    '#weight' => -7,
    '#title' => 'Layout options',
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
);
  
$form['layout']['layout_columns'] = array(
    '#prefix' => '<div id="layout-form">',
    '#suffix' => '</div>',
    '#type' => 'radios',
    '#title' => t('Interior Page Layout'),
    '#default_value' => theme_get_setting('layout_columns'),
    '#options' => array(
      'three_column' => t('3 Column'),
      'two_column_rs' => t('2 Columns with right sidebar</h1>'),
      'two_column_ls' => t('2 Columns with left sidebar'),
      'fullwidth' => t('Full Width'),
    ),
);

$form['layout']['layout_columns_home'] = array(
    '#prefix' => '<div id="layout-form-home">',
    '#suffix' => '</div>',
    '#type' => 'radios',
    '#title' => t('Home Page Layout'),
    '#default_value' => theme_get_setting('layout_columns_home'),
    '#options' => array(
      'three_column' => t('3 Column'),
      'two_column_rs' => t('2 Columns with right sidebar</h1>'),
      'two_column_ls' => t('2 Columns with left sidebar'),
      'fullwidth' => t('Full Width'),
    ),
);


// CLF General Unit Information
$form['clf_general'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF General Unit Information'), 
  '#prefix' => '<div class="clf_general">', 
  '#suffix' => '</div>',
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
);

$form['clf_general']['clf_unitinfohelp'] = array('#type' => 'markup', '#value' => '<p>Fill in your unit\'s information here.  Only the unit name field is required.  The field values are used to generate a <a href="http://microformats.org/wiki/hcard" target="_blank">microformats hCard</a> in the CLF footer.</p>');

$form['clf_general']['clf_unitname'] = array(
  '#type' => 'textfield', 
  '#title' => t('Unit Name'), 
  '#default_value' => theme_get_setting('clf_unitname'), 
  '#size' => 60, 
  '#maxlength' => 128,
  '#required' => true,
);

$form['clf_general']['clf_website'] = array(
  '#type' => 'textfield', 
  '#title' => t('Unit Website'), 
  '#default_value' => theme_get_setting('clf_website'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_streetaddr'] = array(
  '#type' => 'textfield', 
  '#title' => t('Street Address'), 
  '#default_value' => theme_get_setting('clf_streetaddr'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_locality'] = array(
  '#type' => 'textfield', 
  '#title' => t('City'), 
  '#default_value' => theme_get_setting('clf_locality'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_region'] = array(
  '#type' => 'textfield', 
  '#title' => t('Province / Region'), 
  '#default_value' => theme_get_setting('clf_region'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_country'] = array(
  '#type' => 'textfield', 
  '#title' => t('Country Name'), 
  '#default_value' => theme_get_setting('clf_country'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_postal'] = array(
  '#type' => 'textfield', 
  '#title' => t('Postal Code'), 
  '#default_value' => theme_get_setting('clf_postal'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_telephone'] = array(
  '#type' => 'textfield', 
  '#title' => t('Telephone Number'), 
  '#default_value' => theme_get_setting('clf_telephone'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_fax'] = array(
  '#type' => 'textfield', 
  '#title' => t('Fax Number'), 
  '#default_value' => theme_get_setting('clf_fax'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_general']['clf_email'] = array(
  '#type' => 'textfield', 
  '#title' => t('Email'), 
  '#default_value' => theme_get_setting('clf_email'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

// CLF Umbrella Unit Information
$form['clf_umbrella'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF Umbrella Unit Information'), 
  '#prefix' => '<div class="clf_general">', 
  '#suffix' => '</div>',
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,

);

$form['clf_umbrella']['clf_u_unitinfohelp'] = array('#type' => 'markup', '#value' => '<p><strong>Applicable to academic subunits only.</strong></p><p>If applicable, fill in your umbrella unit\'s information here. (e.g. Faculty of Arts for the History Department.) Leave blank to use the default UBC umbrella identification. The field values are used to generate a <a href="http://microformats.org/wiki/hcard">microformats hCard</a> in the CLF footer.</p>');

$form['clf_umbrella']['clf_u_unitname'] = array(
  '#type' => 'textfield', 
  '#title' => t('Unit Name'), 
  '#default_value' => theme_get_setting('clf_u_unitname'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_website'] = array(
  '#type' => 'textfield', 
  '#title' => t('Website'), 
  '#default_value' => theme_get_setting('clf_u_website'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_streetaddr'] = array(
  '#type' => 'textfield', 
  '#title' => t('Street Address'), 
  '#default_value' => theme_get_setting('clf_u_streetaddr'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_locality'] = array(
  '#type' => 'textfield', 
  '#title' => t('Locality'), 
  '#default_value' => theme_get_setting('clf_u_locality'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_region'] = array(
  '#type' => 'textfield', 
  '#title' => t('Province / Region'), 
  '#default_value' => theme_get_setting('clf_u_region'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_country'] = array(
  '#type' => 'textfield', 
  '#title' => t('Country Name'), 
  '#default_value' => theme_get_setting('clf_u_country'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_postal'] = array(
  '#type' => 'textfield', 
  '#title' => t('Postal Code'), 
  '#default_value' => theme_get_setting('clf_u_postal'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_telephone'] = array(
  '#type' => 'textfield', 
  '#title' => t('Telephone Number'), 
  '#default_value' => theme_get_setting('clf_u_telephone'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_fax'] = array(
  '#type' => 'textfield', 
  '#title' => t('Fax Number'), 
  '#default_value' => theme_get_setting('clf_u_fax'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_umbrella']['clf_u_email'] = array(
  '#type' => 'textfield', 
  '#title' => t('Email'), 
  '#default_value' => theme_get_setting('clf_u_email'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

// ** CLF Utility Information ** //
$form['clf_utility'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF Utility Header'), 
  '#prefix' => '<div class="clf_header">', 
  '#suffix' => '</div>',
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
);

$form['clf_utility']['clf_megamenu'] = array(
	'#type' => 'checkbox',
	'#title' => t('Enable CLF Mega Menu'),
	'#default_value' => theme_get_setting('clf_megamenu'),
	'#description' => t('The Mega menu is the drop down that appears when you click on "Campuses", "UBC Directories", "UBC QuickLinks" of the "A Place of Mind" button in the utility tool bar.'),
);

$form['clf_utility']['clf_aplaceofmind'] = array(
	'#type' => 'checkbox',
	'#title' => t('Enable CLF "A Place of Mind" function'),
	'#default_value' => theme_get_setting('clf_aplaceofmind'),
);

$form['clf_utility']['clf_pomfeed'] = array(
  '#type' => 'textfield', 
  '#title' => t('aplaceofmind.ubc.ca Unit RSS Feed'), 
  '#default_value' => theme_get_setting('clf_pomfeed'), 
  '#size' => 60, 
  '#maxlength' => 128,
  '#description' => t('The aplaceofmind.ubc.ca rss feed allows to specify the content that appears in your "A Place of Mind" dropdown.'),
);

$form['clf_utility']['clf_pomlink'] = array(
  '#type' => 'textfield', 
  '#title' => t('aplaceofmind.ubc.ca section link'), 
  '#default_value' => theme_get_setting('clf_pomlink'), 
  '#size' => 60, 
  '#maxlength' => 128,
  '#description' => t('Specify a specific section of the aplaceofmind.ubc.ca site you wish to link to.'),
);

$form['clf_utility']['clf_searchlabel'] = array(
  '#type' => 'textfield', 
  '#title' => t('Search Label (usually your unit name)'), 
  '#default_value' => theme_get_setting('clf_searchlabel'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_utility']['clf_searchdomain'] = array(
  '#type' => 'textfield', 
  '#title' => t('Search Domain'), 
  '#default_value' => theme_get_setting('clf_searchdomain'), 
  '#size' => 60, 
  '#maxlength' => 128,
  '#description' => t('Search domains allows you to limit search results in your search box to a specific domain. e.g. <strong>*.arts.ubc.ca</strong> or <strong>www.publicaffairs.ubc.ca/category/</strong>'),
);

$form['clf_utility']['clf_subunit_override'] = array(
  '#type' => 'textfield', 
  '#title' => t('Subunit Name Override (overrides text in search bar)'), 
  '#default_value' => theme_get_setting('clf_subunit_override'), 
  '#size' => 60, 
  '#maxlength' => 128,
);

$form['clf_utility']['clf_subunit_blank'] = array(
  '#type' => 'checkbox', 
  '#title' => t('Make subunit text in search bar blank (overrides all other settings)'), 
  '#default_value' => theme_get_setting('clf_subunit_blank'),
);

$form['clf_utility']['clf_header_website'] = array(
	'#type' => 'textfield',
	'#title' => t('Your site URL (for header)'),
	'#default_value' => theme_get_setting('clf_header_website'),
	'#size' => 60,
	'#maxlength' => 128,
);



// CLF Dropdown Settings

$form['clf_dropdown'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF Dropdown Menu'), 
  '#prefix' => '<div class="clf_dropdown">', 
  '#suffix' => '</div>',
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,

);

// Create the form widgets using Forms API
$form['clf_dropdown']['clf_dropdown_show'] = array(
	'#type' => 'checkbox',
	'#title' => t('Use CLF Dropdown Menu'),
	'#default_value' => theme_get_setting('clf_dropdown_show'),
);

// Getting the available set of menus
$allmenus = db_query('SELECT menu_name, title FROM {menu_custom}');
foreach ($allmenus as $record) {
	$options[$record->menu_name] = $record->title;
}

$form['clf_dropdown']['clf_dropdown_links'] = array(
	'#type' => 'select',
	'#title' => t('Link Set To Use In Dropdown'),
	'#default_value' => theme_get_setting('clf_dropdown_links'),
	'#options' => $options,
);

$form['clf_dropdown']['clf_dropdown_style'] = array(
    '#type' => 'select',
    '#title' => t('Dropdown style'),
    '#description' => t('Choose a dropdown style.'),
    '#default_value' => theme_get_setting('clf_dropdown_style'),
    '#options' => array(
      'default' => t('Default (full width)'),
      'single_row' => t('Single row'),
      'grey_background' => t('Grey background'),
      'custom_bg_colour' => t('Custom bg color'),
      'plain_background' => t('Plain background'),
      /*'Verdana' => t('Verdana'),
      'Times New Roman' => t('Times New Roman'),
      'Lucida Sans' => t('Lucida Sans'),
      'Comic Sans MS' => t('Comic Sans MS'),
      'Impact' => t('Impact'),*/
    ),
);

// ** CLF Fonts and Flavours **//

$form['clf_font'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF Fonts and Styles'), 
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
);

$form['clf_font']['clf_font'] = array(
    '#type' => 'select',
    '#title' => t('Heading Font'),
    '#description' => t('Choose a font.'),
    '#default_value' => t('Arial'),
    '#options' => array(
      'Courier New' => t('Courier New'),
      'Arial' => t('Arial'),
      'Arial Black' => t('Arial Black'),
      'Georgia' => t('Georgia'),
      'Trebuchet MS' => t('Trebuchet MS'),
      'Verdana' => t('Verdana'),
      'Times New Roman' => t('Times New Roman'),
      'Lucida Sans' => t('Lucida Sans'),
      'Comic Sans MS' => t('Comic Sans MS'),
      'Impact' => t('Impact'),
    ),
);

$form['clf_font']['clf_body_font'] = array(
    '#type' => 'select',
    '#title' => t('Body Font'),
    '#description' => t('Choose a font for the body text.'),
    '#default_value' => t('Arial'),
    '#suffix' => '<div class="style-preview">
    <h1 class="edit-heading-colourpicker">Sample Heading</h1>
    <h3 class="edit-heading-colourpicker">Sample H3 Heading</h3>
    <p class="edit-secondary-colour-colourpicker">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu nulla sed erat molestie luctus. In aliquet, augue et sollicitudin dapibus, neque dui placerat erat, eu bibendum nibh justo ut lectus. Proin felis arcu, faucibus in auctor id, pharetra sit amet magna. Integer at nibh in dui auctor viverra. Morbi ipsum odio, dapibus id ultrices eget, pulvinar in nulla. Integer posuere libero non lorem pretium facilisis. Morbi id orci vitae orci consequat vulputate vel eu ligula. Donec mi metus, ullamcorper sed dapibus et, pretium sed nulla. Duis eleifend semper ultricies. Sed consequat, ligula non ultrices faucibus, libero arcu convallis lorem, vel ullamcorper nulla tellus eu justo.</p>

    <h2 class="edit-heading-colourpicker">Sample H2 Heading</h2>
    <p class="edit-secondary-colour-colourpicker">Text.</p>
    <h3 class="edit-heading-colourpicker">Sample H3 Heading</h3>


<p class="edit-secondary-colour-colourpicker">Suspendisse faucibus elit quis orci tempor eget ornare neque condimentum. Ut lobortis, est sit amet semper euismod, dui urna vulputate odio, nec sodales nulla libero ut augue. Nulla sodales, magna ut feugiat vulputate, orci mi blandit augue, eu semper nibh ligula vitae leo. Nullam ut orci id quam feugiat rhoncus sit amet sodales urna. Aliquam erat volutpat. Duis sed euismod elit. Duis metus lorem, viverra nec auctor et, congue eu magna. Nullam ante sapien, commodo eu faucibus non, sodales vitae magna. Duis ac purus erat. Etiam adipiscing, purus ut tincidunt venenatis, ligula nisl sollicitudin nunc, eu rhoncus dolor lorem sed erat. In hac habitasse platea dictumst. Ut tempus elementum tortor, et aliquet felis venenatis eget. Nam quis ante vitae neque adipiscing tincidunt at ac urna.</p>
    </div>',
    '#options' => array(
      'Courier New' => t('Courier New'),
      'Arial' => t('Arial'),
      'Arial Black' => t('Arial Black'),
      'Georgia' => t('Georgia'),
      'Trebuchet MS' => t('Trebuchet MS'),
      'Verdana' => t('Verdana'),
      'Times New Roman' => t('Times New Roman'),
      'Lucida Sans' => t('Lucida Sans'),
      'Comic Sans MS' => t('Comic Sans MS'),
      'Impact' => t('Impact'),
    ),
);

$form['clf_font']['heading_colourpicker'] = array(
    '#type' => 'textfield',
    '#title' => 'Choose a colour for the headings',
    '#size' => 7,
    '#maxlength' => 7,
    '#suffix' => '<div id="colourpicker-heading"></div>',
    '#default_value' => theme_get_setting('heading_colourpicker'),
);

$form['clf_font']['secondary_colour_colourpicker'] = array(
    '#type' => 'textfield',
    '#title' => 'Choose a colour for the secondary color',
    '#size' => 7,
    '#maxlength' => 7,
    '#suffix' => '<div id="colourpicker-body"></div>',
    '#default_value' => theme_get_setting('secondary_colour_colourpicker'),
);


// ** CLF Header Color Options ** //

$form['clf_colour'] = array(
  '#type' => 'fieldset', 
  '#title' => t('CLF Colour Options'), 
  '#prefix' => '<div class="clf_coloroptions">', 
  '#suffix' => '</div>',
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
);

$r = array();
$dir = 'sites/all/themes/gazebo/_header_options/';
$dir2 = base_path() . path_to_theme() . 'sites/all/themes/gazebo/_header_options/';
if( $fd = opendir( $dir ) ) {
	while( ( $file = readdir( $fd ) ) !== false ) {
		if( is_dir( $dir.$file ) && $file!="." && $file!=".." ) {
			$r[$file] = $file;
		}
	}
	closedir($fd);
} elseif ( $fd = opendir( $dir2 ) ) {
	while( ( $file = readdir( $fd ) ) !== false ) {
		if( is_dir( $dir.$file ) && $file!="." && $file!=".." ) {
			$r[$file] = $file;
		}
	}
	closedir($fd);
}

$form['clf_colour']['clf_colour_option'] = array(
	'#type' => 'radios',
    '#prefix' => '<div id="clf-settings-form">',
    '#suffix' => '</div>',
	'#title' => t('Header Colour Options'),
	'#description' => t('See: http://www.publicaffairs.ubc.ca/ccwp/clf/background/specifications for details.'),
	'#default_value' => theme_get_setting('clf_colour_option'),
	'#options' => $r,
);

$form['clf_colour']['colourpicker'] = array(
    '#type' => 'textfield',
    '#title' => '<strong><span style="color: red; ">Options 5 and 6:</span></strong> Choose a colour for the place of mind background.',
    '#size' => 7,
    '#maxlength' => 7,
    '#suffix' => '<div id="colourpicker"></div>',
    '#default_value' => theme_get_setting('colourpicker'),
);

// ** Carousel settings **
$form['carousel'] = array(
    '#type' => 'fieldset',
    '#title' => 'Carousel settings',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);

// add image
$form['carousel']['image'] = array(
    '#prefix' => '<div id="carousel-image">',
    '#suffix' => '</div>',
    '#type' => 'radios',
    '#title' => t(''),
    '#default_value' => theme_get_setting('image'),
    '#options' => array(
    ),
); 

$form['carousel']['enable_carousel'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable carousel'),
    '#description' => t('Click the box to enable the carousel.'),
    '#default_value' => theme_get_setting('enable_carousel'),
);

$form['carousel']['carousel_speed'] = array(
     '#type' => 'select',
     '#title' => t('How fast should it be'),
     '#description' => t('Set animation speed'),
     '#default_value' => theme_get_setting('carousel_speed'),
     '#options' => array(
      '1500' => t('Slow'),
      '1000' => t('Medium'),
      '400' => t('Fast'),     
     ),
);

$form['carousel']['carousel_duration'] = array(
    '#type' => 'select',
    '#title' => t('How long between each slide (in seconds)'),
    '#description' => t(''),
    '#default_value' => theme_get_setting('animation'),
    '#options' => array(
      '8000' => t('8'),
      '6000' => t('6'),
      '4000' => t('4'),
    ),
);


$form['carousel']['carousel_option'] = array(
     '#type' => 'select',
     '#title' => t('Choose a style'),
     '#description' => t('Set the style for your carousel'),
     '#default_value' => theme_get_setting('carousel_option'),
     '#options' => array(
      'default' => t('Standard UBC CLF carousel'),
      'thumbnails' => t('With thumbnails'),
      'sliding_gallery' => t('Horizonal Slider'),
      'transparent_slider' => t('Transparent Slider'),     
     ),
);
 

$form['carousel']['number_of_items'] = array(
    '#type' => 'select',
    '#title' => t('Number of Items (must have at least two)'),
    '#description' => t('Choose the number of items.'),
    '#default_value' => theme_get_setting('number_of_items'),
    '#options' => array(
      '2' => t('2'),
      '3' => t('3'),
      '4' => t('4'),
      '5' => t('5'),
      '6' => t('6'),
      '7' => t('7'),
      '8' => t('8'),
      '0' => t('Unlimited'),
    ),
);



// CLF style presets
/*$form['clf_style'] = array(
    '#type' => 'fieldset',
    '#title' => 'Style options',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);*/


/*$form['clf_style']['widget_image'] = array(
    '#prefix' => '<div id="widget-image">',
    '#suffix' => '</div>',
    '#type' => 'radios',
    '#title' => t(''),
    '#default_value' => $settings['widget_image'],
    '#options' => array(
    ),
);*/
  
  
/*$form['clf_style']['style_options'] = array(
    '#type' => 'radios',
    '#title' => t('Front Page Style'),
    '#description' => t('Select a front page style.'),
    '#prefix' => '<div id="style-options-wrapper">',
    '#suffix' => '</div>
    <div id="style1-preview">Some text</div>
    <div id="style2-preview">Some text</div>
    <div id="style3-preview">Some text</div>
    
    ',
    '#default_value' => theme_get_setting('style_options'),
    '#options' => array(
      'style1' => t('<div id="clf-style1">Style 1</div>'),
      'style2' => t('<div id="clf-style2">Style 2</div>'),
      'style3' => t('<div id="clf-style3">Style 3</div>'),
    ),
);*/



$form['widget'] = array(
    '#type' => 'fieldset',
    '#title' => 'Tab widget settings',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);

// Tab widget settings
// add image
$form['widget']['widget_image'] = array(
    '#prefix' => '<div id="widget-image">',
    '#suffix' => '</div>',
    '#type' => 'radios',
    '#title' => t(''),
    '#default_value' => theme_get_setting('widget_image'),
    '#options' => array(
    ),
);
  
$form['widget']['widget_enable'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable widget'),
    '#description' => t('Click the checkbox to enable the widget.'),
    '#default_value' => theme_get_setting('widget_enable'),
);
  
$form['widget']['widget_items'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Add items to widget'),
    '#description' => t('Check the items to add to the widget.'),
    '#default_value' => theme_get_setting('widget_items'),
    '#options' => array(
      'featured' => t('<strong>Featured</strong> - Must have Featured Module installed'),
      'news' => t('<strong>News</strong> - Must have News Module installed'),
      'events' => t('<strong>Events</strong> - Must have Events Module installed'),
    ),
);


// ** Web tools (analytics etc.)  ** // 
$form['web_tools'] = array(
    '#type' => 'fieldset',
    '#title' => 'Tracking and SEO',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);

$form['web_tools']['google_analytics'] = array(
    '#type' => 'textfield',
    '#title' => t('Paste Google Analytics UA tracking code (for example, UA-125436)'),
    '#maxlength' => '50',
    '#description' => t('You can find this on the settings page in your <a href="http://google.com/analytics" target="_blank">Google Analytics account</a>. Should be in form UA-XXXXXXX'),
    '#default_value' => 'UA-',
    '#required' =>  FALSE,
    '#default_value' => theme_get_setting('google_analytics'),
);
  
$form['web_tools']['webmaster_tools_verification'] = array(
    '#type' => 'textfield',
    '#title' => t('Paste your Google Webmaster Tools verification code (for example, 30594838)'),
    '#required' => FALSE,
    '#default_value' => theme_get_setting('webmaster_tools_verification'),
);

// Social media
// ** More settings ** //
$form['social_media'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social media settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);

$form['social_media']['enable_social_media_links'] = array(
    '#type' => 'checkbox',
    '#title' => 'Enable social media',
    '#description' => t('Enable social media links'),
    '#default_value' => theme_get_setting('enable_social_media_links'),
);

$form['social_media']['social_media_options'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Add social media options'),
    '#description' => t('Check the items to add to the widget.'),
    '#default_value' => theme_get_setting('social_media_options'),
    '#options' => array(
      'facebook' => t('Facebook'),
      'twitter' => t('Twitter'),
    ),
);


// ** More settings ** //
$form['advanced'] = array(
    '#type' => 'fieldset',
    '#title' => t('Custom CSS, breadcrumbs, and other advanced settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);

$form['advanced']['enable_breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => 'Enable breadcrumbs',
    '#description' => t('Enable breadcrumbs'),
    '#default_value' => theme_get_setting('enable_breadcrumbs'),
);

$form['advanced']['breadcrumb_symbol'] = array(
    '#type' => 'textfield',
    '#size' => 6,
    '#prefix' => t('<p><span class="breadcrumb-preview-wrapper"><span class="breadcrumb-prefix-text"></span><span class="example-link-text">Home</span> <span class="example-link-symbol">>></span> Sample Page</span></p>'),
    '#title' => t('Breadcrumb separator'),
    '#required' => FALSE,
    '#default_value' => theme_get_setting('breadcrumb_symbol'),
);

$form['advanced']['breadcrumb_prefix'] = array(
    '#type' => 'textfield',
    '#size' => 6,
    '#prefix' => t('<div id="breadcrumb-prefix">'),
    '#suffix' => t('</div>'),
    '#title' => t('Text before breadcrumb'),
    '#required' => FALSE,
    '#default_value' => theme_get_setting('breadcrumb_prefix'),
);

$form['advanced']['paste_css'] = array(
    '#type' => 'textarea',
    '#size' => 10,
    '#title' => t('Custom CSS'),
    '#description' => t('Add CSS in the field - it will be added to your theme. Don\'t include "style" tags.'),
    '#default_value' => theme_get_setting('paste_css'),
);


// Return the additional form widgets
return $form;
}
?>