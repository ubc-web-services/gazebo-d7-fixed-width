<?php 

/**
 * Scripts for bottom of page
 */

/*function gazebo_ubc_clf_bottom_scripts($variables) {
  $output = '<script type="text/javascript"> 
    <!--//--><![CDATA[//><!--var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));//--><!]]></script>';
  $output .= '<script type="text/javascript"> 
    <!--//--><![CDATA[//><!--
      try{var pageTracker = _gat._getTracker("' . theme_get_setting('google_analytics') . '");pageTracker._trackPageview();} catch(err) {}
    //--><!]]>
  </script>';
return $output; 
}*/

/* The above code didn't correctly log Google Analytics */
function gazebo_ubc_clf_bottom_scripts($variables) {
  $output = '<script type="text/javascript"> 
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));</script>';
  $output .= '<script type="text/javascript"> 
      try{var pageTracker = _gat._getTracker("' . theme_get_setting('google_analytics') . '");pageTracker._trackPageview();} catch(err) {}</script>';
return $output; 
}

/** 
 * Add social media buttons
 *
 * Options:
 * $items: An array of options. Ex, array('facebook', 'twitter');
 * $style: 'plain', 'dotted'
 *
 * For ex, to include in your theme file: print gazebo_ubc_social_media_links(array('twitter'), 'dotted');
 *
 */
function gazebo_ubc_social_media_links($items = NULL, $style = 'plain') {
  // social media buttons
  $variables['tweet'] = '<span class="social-link social-link-twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="';
  $variables['tweet'] .= $_SERVER['HTTP_HOST'] . base_path() . drupal_get_path_alias($_GET['q']) . '" data-count="horizontal">Tweet</a>';
  $variables['tweet'] .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span>';
  $variables['facebook_like'] = '
  <script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, "script", "facebook-jssdk"));
  </script>';

  $variables['facebook_like'] .= '<span class="social-link social-link-fb"><fb:like href=http://' . $_SERVER['HTTP_HOST'] . base_path() . drupal_get_path_alias($_GET['q']);
  $variables['facebook_like'] .= ' layout="button_count" show-faces="true" width="80" action="like" colorscheme="light" /></span>';
     
  $variables['social_media_buttons'] = '<div class="media-links-' . $style . '">';
  if (isset($items)) {
    if (in_array('twitter', $items)) {
      $variables['social_media_buttons'] .= $variables['tweet'];
    }
    if (in_array('facebook', $items)) {
      $variables['social_media_buttons'] .= $variables['facebook_like'];
    }
  }
  else $variables['social_media_buttons'] .= $variables['facebook_like'] . $variables['tweet'];
  
  return $variables['social_media_buttons'] . '</div>';

}


/**
 * UBC CLF Carousel options
 *
 * Options:
 * $duration: in milliseconds
 * $speed: in milliseconds
 * $style: 'default', 'thumbnail', 'sliding_gallery', 'transparent_slider'
 *
 * For ex, to include in your theme file: print gazebo_ubc_clf_carousel('4000', '800', 'sliding_gallery');
 *
 */

function gazebo_ubc_clf_carousel($duration = NULL, $speed = NULL, $style = NULL) {  
  // output carousel view
  $output = '  <div id="UBCHeadlineWidget" ';
  if (isset($duration['element'])) {
    $duration = $duration['element'];	
  }
  else {
    $duration = theme_get_setting('carousel_duration');
  }
  $output .= 'data-duration="' . $duration . '"';
  if (isset($speed)) {
    $speed = $speed;
  }
  else {
    $speed = theme_get_setting('carousel_speed');
  }
  $output .= ' data-speed="' . $speed . '" class="';
  if (isset($style)) {
    $output .= $style;
  }
  else {  
    $output .= theme_get_setting('carousel_option');
  }
  $output .= '"><div class="carousel">';
  $output .= views_embed_view('news_views', $display_id = 'block');
  $output .= '</div></div>';
  return $output;
}

/**
 * Return the UBC CLF header
 *
 */
function gazebo_ubc_clf_header($variables) {
  $output = '';
  $output .= '<ul id="UbcHeader" class="UbcContainer">
    <li>
      <h1 id="UbcLogo"><a href="http://www.ubc.ca">The University of British Columbia</a></h1>
    </li>
    <li class="UbcMindLink"><a href="http://www.aplaceofmind.ubc.ca/" id="UbcMindLink">a place of mind</a></li>
    <li id="UbcHeaderLine"><a href="http://www.ubc.ca/" id="UbcHeaderLink"><span>';
  $output .= theme_get_setting('clf_u_unitname'); 
  $output .= '</span></a></li>
    <li id="UbcSubUnitLine"><a href="';
    if (theme_get_setting('clf_header_website') == '') {
      $output .= base_path(); 
    }
    else {
      $output .= (theme_get_setting('clf_header_website'));
    }
  $output .= '" id="UbcSubUnitLink"><span>' . theme_get_setting('clf_unitname') . '</span></a></li>
  </ul>';
  
  return $output;
}

/**
 * Return the UBC CLF toolbar wrapper
 *
 */ 
function gazebo_ubc_clf_toolbar($variables) {

  // get search text
  if (theme_get_setting('clf_subunit_blank')) {
    $search_text = '';
  } 
  else if (theme_get_setting('clf_subunit_override')) {
    $search_text = t('Search ') . theme_get_setting('clf_subunit_override');
  }
  else {
    $search_text = t('Search ') . theme_get_setting('clf_unitname');
  }
  
  // get search domain if set
  $search_domain = '';
  if (theme_get_setting('clf_searchdomain')) {
	 $search_domain = theme_get_setting('clf_searchdomain');
	 $search_domain = '<input type="hidden" name="label" value="'.$search_domain.'" class="UbcSearchField" />'.
	 				  '<input type="hidden" name="site" value="'.$search_domain.'" class="UbcSearchField" />';
  }

  

  $output = '
  <div id="UbcToolBarWrapper">
    <div id="UbcToolBar" class="UbcContainer">';
      
  $items = array(
    l(t('Campuses'), 'http://www.ubc.ca/campuses/', array('attributes' => array('id' => 'UbcCampusLinks')) ),
    l(t('UBC Directories'), 'http://www.ubc.ca/directories/', array('attributes' => array('id' => 'UbcDirectLinks')) ),
    l(t('Quick Links'), 'http://www.ubc.ca/quicklinks/', array('attributes' => array('id' => 'UbcQuickLinks')) ),
    '<form id="UbcSearchForm" action="//www.ubc.ca/search/refine/" method="get">
       <input type="text" name="q" value="' . $search_text . '" class="UbcSearchField" />'.$search_domain.'
       <input type="image" src="' . base_path() . path_to_theme() . '/_ubc_clf/img/header/spacer.gif" class="UbcSearchBtn" value="Search" alt="Search" />
     </form>',
  );
  $output .= theme_item_list(array('items' => $items, 'title' => NULL, 'type' => 'ul', 'attributes' => array('id' => 'UbcToolNav')));       
  $output .= '
    </div><!-- End UbcToolBar UbcContainer -->
  </div><!-- End UbcToolBarWrapper -->
  <div id="UbcMegaMenuesWrapper" class="UbcContainer">
    <div id="UbcMegaMenues" class="UbcContainer"> <a href="#" class="UbcCloseBtn">[X] close</a> </div><!-- End UbcMegaMenues UbcContainer -->
  </div><!-- End UbcMegaMenuesWrapper UbcContainer -->';

  return $output;
}

/**
 * Return the UBC CLF visual identity footer
 *
 */
function gazebo_ubc_clf_visual_identity_footer($variables) {

  $output = '<div id="UbcBottomInfoWrapper">
  <div id="UbcBottomInfo" class="UbcContainer">
    <div id="UbcBottomLeft" >
      <p>';
  $image = array(
    'path' => base_path() . path_to_theme() . '/_ubc_clf/img/footer/logo.gif', 
    'alt' => t('A place of mind, The University of British Columbia'),
    'title' => t('A place of mind, The University of British Columbia'),
  );
  
  $output .= '<a href="http://www.ubc.ca">' . theme('image', $image) . '</a>'; 
  $output .= '</p>
    </div><!-- End UbcBottomLeft -->
    <div id="UbcBottomCenter">';
  $output .= variable_get('clf_umbrella_hcard');
  $output .= '</div><!-- End UbcBottomCenter -->
    <div id="UbcBottomRight">';
  $output .= variable_get('clf_unit_hcard'); 
  $output .= '</div><!-- End UbcBottomRight -->
  </div><!-- End UbcBottomInfo UbcContainer -->
  </div><!-- End UbcBottomInfoWrapper -->';
  
  return $output;
}

/**
 * Return the UBC CLF global utility footer
 *
 */
function gazebo_ubc_clf_global_utility_footer($variables) {

  $output = '<div id="UbcUtilNavWrapper">
  <div id="UbcUtilNav" class="UbcContainer">
    <p> <a href="http://www.emergency.ubc.ca">Emergency Procedures</a>&nbsp;|&nbsp;';
  $output .= l(t('Accessibility'), 'http://www.ubc.ca/accessibility'); 
  $output .= '&nbsp;|&nbsp;';
  $output .= l(t('Contact UBC'), 'http://www.ubc.ca/about/contact'); 
  $output .= '&nbsp;|&nbsp;';
  $output .= '<a href="http://www.ubc.ca/copyright">&copy; Copyright  The University of British Columbia</a>'; 
  $output .= '</p>
</div><!-- End UbcUtilNav UbcContainer -->
</div><!-- UbcUtilNavWrapper -->';
  return $output;
  
}