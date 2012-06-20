<?php
// $Id: template.php,v 1.16.2.1 2009/02/25 11:47:37 goba Exp $

/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

/**
 * Variables for HTML wrapper (html.tpl.php)
 */
function gazebo_preprocess_html(&$vars) { 
   // add body class for column layouts
   $vars['layout_columns'] = theme_get_setting('layout_columns');
   $vars['classes_array'][] = preg_replace('/_/', '-' , $vars['layout_columns']);
  if (arg(0) == 'user' && arg(2) == 'imce') {
     $vars['classes_array'][] = 'full-width';
  }
  $vars['classes_array'][] = ' ' . theme_get_setting('clf_colour_option') . ' ';
   
}



/**
 * page.tpl.php variables.
 */
function gazebo_preprocess_page(&$vars) {
  
  // IMCE theming
  if (arg(0) == 'user' && arg(2) == 'imce') {
     unset($vars['page']['sidebar_first']);
     unset($vars['page']['sidebar_second']);
  }
  
  $vars['tabs2'] = menu_secondary_local_tasks();
    
  if(theme_get_setting('clf_dropdown_show')) {
    
  	$vars['clf_dropdown'] = gazebo_dropdown(theme_get_setting('clf_dropdown_links'));
  }
  
  if(theme_get_setting('clf_megamenu')) { $vars['clf_megamenu'] = 'true'; } else { $vars['clf_megamenu'] = 'false'; }
  if(theme_get_setting('clf_aplaceofmind')) { $vars['clf_aplaceofmind'] = 'true'; } else { $vars['clf_aplaceofmind'] = 'false'; }
  if(theme_get_setting('clf_dropdown_show')) { $vars['clf_dropdown_show'] = 'true'; } else { $vars['clf_dropdown_show'] = 'false'; }
  
  // add custom css file (if it exists)
  if (file_exists(conf_path() .'/css/custom.css')) {
    drupal_add_css(conf_path() .'/css/custom.css');
  } 
  
  /**
   * Stylesheets for IE
   */
  if (file_exists(conf_path() .'/css/ie.css')) {
    // Add conditional stylesheets for IE 9 and below
    drupal_add_css(conf_path() .'/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE), 'preprocess' => FALSE));
  } 
  if (file_exists(conf_path() .'/css/ie7.css')) {
    // Add conditional stylesheets for IE 7 and below
    drupal_add_css(conf_path() .'/css/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  } 
  
  $vars['custom_css'] = $add_custom_css;
  $vars['custom_ie_css'] = $add_custom_ie_css;

  $vars['clf_pomlink'] = 'http://www.aplaceofmind.ubc.ca/';
  $vars['clf_pomfeed'] = theme_get_setting('clf_pomfeed');
  $vars['clf_website'] = theme_get_setting('clf_website');
  $vars['clf_searchlabel'] = theme_get_setting('clf_searchlabel');
  $vars['clf_searchdomain'] = theme_get_setting('clf_searchdomain');
  $vars['clf_header_website'] = theme_get_setting('clf_header_website');
  
  $vars['clf_unitname'] = theme_get_setting('clf_unitname');
  
  if(theme_get_setting('clf_u_unitname')!='') {
	  $vars['clf_umbrella_name'] = theme_get_setting('clf_u_unitname');
  } else {
	  $vars['clf_umbrella_name'] = "The University of British Columbia";
  }
  
  $vars['clf_dropdown_style'] = theme_get_setting('clf_dropdown_style');    
  $vars['clf_colour_option'] = theme_get_setting('clf_colour_option');  
  $vars['layout_columns'] = theme_get_setting('layout_columns');
  $vars['layout_columns_home'] = theme_get_setting('layout_columns_home');
  $vars['enable_carousel'] = theme_get_setting('enable_carousel'); 
  $vars['carousel_speed'] = theme_get_setting('carousel_speed'); 
  $vars['carousel_duration'] = theme_get_setting('carousel_duration');
  $vars['number_of_items'] = theme_get_setting('number_of_items');  
  $vars['google_analytics'] = theme_get_setting('google_analytics');
  $vars['webmaster_tools_verification'] = theme_get_setting('webmaster_tools_verification');  
  $vars['paste_css'] = theme_get_setting('paste_css');
  $vars['widget_items'] = theme_get_setting('widget_items');  
  $vars['widget_enable'] = theme_get_setting('widget_enable');
  $vars['enable_breadcrumbs'] = theme_get_setting('enable_breadcrumbs');
  $vars['colour_picker'] = theme_get_setting('colourpicker');
  $vars['clf_font'] = theme_get_setting('clf_font');
  $vars['breadcrumb_symbol'] = theme_get_setting('breadcrumb_symbol');
  $vars['breadcrumb_prefix'] = theme_get_setting('breadcrumb_prefix');
  $vars['clf_font'] = theme_get_setting('clf_font');
  $vars['clf_body_font'] = theme_get_setting('clf_body_font');
  $vars['heading_colourpicker'] = theme_get_setting('heading_colourpicker');
  $vars['secondary_colour_colourpicker'] = theme_get_setting('secondary_colour_colourpicker');
  $vars['style_options'] = theme_get_setting('style_options');
  
  variable_set('temp_bread_prefix', $vars['breadcrumb_prefix']);
  variable_set('temp_bread_symbol', $vars['breadcrumb_symbol']);

  
  global $test_clf_unitname;
  $test_clf_unitname = $vars['clf_unitname'];
  
  global $base_url;
  
  $vars['clf_unit_hcard'] = clf_build_hcard(
	array(
		'unitname' => theme_get_setting('clf_unitname'),
		'website' => $base_url,
		'clf_website' => theme_get_setting('clf_website'),
		'street-address' => theme_get_setting('clf_streetaddr'),
		'locality' => theme_get_setting('clf_locality'),
		'region' => theme_get_setting('clf_region'),
		'country-name' => theme_get_setting('clf_country'),
		'postal-code' => theme_get_setting('clf_postal'),
		'telephone' => theme_get_setting('clf_telephone'),
		'fax' => theme_get_setting('clf_fax'),
		'email' => theme_get_setting('clf_email'),
	)
  );
  
  $vars['clf_umbrella_hcard'] = clf_build_hcard(
	array(
		'unitname' => theme_get_setting('clf_u_unitname'),
		'clf_website' => theme_get_setting('clf_u_website'),
		'street-address' => theme_get_setting('clf_u_streetaddr'),
		'locality' => theme_get_setting('clf_u_locality'),
		'region' => theme_get_setting('clf_u_region'),
		'country-name' => theme_get_setting('clf_u_country'),
		'postal-code' => theme_get_setting('clf_u_postal'),
		'telephone' => theme_get_setting('clf_u_telephone'),
		'fax' => theme_get_setting('clf_u_fax'),
		'email' => theme_get_setting('clf_u_email'),
	)
  );
  
  variable_set('clf_unit_hcard', $vars['clf_unit_hcard']);
  variable_set('clf_umbrella_hcard', $vars['clf_umbrella_hcard']);
  //print $vars['clf_unit_hcard'];
  
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

function gazebo_dropdown($menu) {

    $i = 0;

	// $tree = menu_tree_page_data($menu);
    $tree = menu_tree_all_data($menu);


	$html = '<ul id="UbcMainNav" class="UbcContainer ' . theme_get_setting('clf_dropdown_style') . '">';

	foreach ($tree as $section):
		$html .= '<li  class="menu-li-' . $i . '">'.l($section['link']['link_title'],$section['link']['link_path'])."\n";

		if ($section['below']):
		
			$html .= '<ul class="UbcSubMenu UbcClear">'."\n";
			
			$subitems = count($section['below']);
			if($subitems<=12) {
				$chunks = array_chunk($section['below'], 3, TRUE);
			} else {
				$chunks = array_chunk($section['below'], ceil($subitems/4), TRUE);
			}
			
			# each sub menu has 3 or less elements
			foreach ($chunks as $chunk):
				$html .= '<li class="UbcSubMenuSection">'."\n";
				$html .= '<ul>'."\n";
				
				foreach ($chunk as $item):
					$html .= '<li>'.l($item['link']['link_title'],$item['link']['link_path']).'</li>'."\n";
				endforeach;
				
				$html .= '</ul>'."\n";
				$html .= '</li>'."\n";
			endforeach;
			# end of one column of sub menu
		
			$html .= '</ul>'."\n";
		
		endif;
		$html .= '</li>'."\n";
		$i++;

	endforeach;

	$html .= '</ul>'."\n";
	
	return $html;

}

function clf_build_hcard($fields) {
	$html = '';
	$adr = '';
	
	if($fields['unitname']!='') {
		if($fields['clf_website']!='') {
			$html .= '<a class="fn org url" href="'.$fields['clf_website'].'">'.$fields['unitname'].'</a>'."\n";
		} else if ($fields['website']) {
			$html .= '<a class="fn org url" href="'.$fields['website'].'">'.$fields['unitname'].'</a>'."\n";
		} else {
			$html .= '<span class="fn org">'.$fields['unitname'].'</span>'."\n";		
		}
	}
	
	if($fields['street-address']!='') { 
		$adr .= '<div class="street-address">'.$fields['street-address'].'</div>'."\n";
	}
	
	if($fields['locality']!='') { 
		$adr .= '<span class="locality">'.$fields['locality'].'</span>,'."\n";
	}
	
	if($fields['region']!='') { 
		$adr .= '<abbr class="region">'.$fields['region'].'</abbr>'."\n";
	}
	
	if($fields['country-name']!='') { 
		$adr .= '<div class="country-name">'.$fields['country-name'].'</div>'."\n";
	}
	
	if($fields['postal-code']!='') { 
		$adr .= '<span class="postal-code">'.$fields['postal-code'].'</span>'."\n";
	}
	
	if($adr != '') {
		$adr = '<div class="adr">'.$adr.'</div>';
		$html .= $adr;
	}
	
	if($fields['telephone']!='') { 
		$html .= '<div class="tel">'."\n".
   		'<span class="type">Tel: </span> '.$fields['telephone']."\n".
  		'</div>'."\n";
	}
	
	if($fields['fax']!='') { 
		$html .= '<div class="tel">'."\n".
   		'<span class="type">Fax</span> '.$fields['fax']."\n".
  		'</div>'."\n";
	}
	
	if($fields['email']!='') { 
		$html .= '<div>Email:'."\n".
        '<a href="mailto:'.$fields['email'].'" class="email">'.$fields['email'].'</a>'."\n".
        '</div>'."\n";
	}
	
	if($html!='') {
		$html = '<div class="vcard">'.$html.'</div>';
	}
	
	return $html;
}

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
/*  $class = 'no-sidebar';
	
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  } */
}

function gazebo_preprocess_views_view_fields(&$vars) {
  global $user;
  if (!in_array('editor',$user->roles)) {
    unset($vars['view']->field['edit_node']);
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function gazebo_breadcrumb($variables) {
  $breadcrumb_prefix = variable_get('temp_bread_prefix', '');
  $breadcrumb_symbol = variable_get('temp_bread_symbol', '');
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    if (empty($breadcrumb_symbol)) {
      $breadcrumb_symbol = '»';
    }
    //return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
    
    return '<div id="UbcBreadCrumbPrefix">' . $breadcrumb_prefix . "</div>" . implode(' ' . $breadcrumb_symbol . ' ', $breadcrumb);
  }
}

function gazebo_theme() {
  return array(
    'ubc_clf_toolbar' => array(
      'variables' => array('element' => NULL)
    ),
    'ubc_clf_header' => array(
      'variables' => array('element' => NULL)
    ),
    'ubc_clf_visual_identity_footer' => array(
      'variables' => array('element' => NULL)
    ),
    'ubc_clf_global_utility_footer' => array(
      'variables' => array('element' => NULL)    
    ),
    'ubc_clf_bottom_scripts' => array(
      'variables' => array('element' => NULL)    
    ),
    'ubc_clf_carousel' => array(
      'variables' => array('element' => NULL)    
    ),
    'ubc_social_media_links' => array(
      'variables' => array('element' => NULL)    
    ),
  );
}

/**
 * Define CLF page elements in an include
 */
 
require_once('template-ubc-clf-elements.inc');