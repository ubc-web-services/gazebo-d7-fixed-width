<?php  

// Colour options 
// Need to clean this up!
$color_option = theme_get_setting('clf_colour_option');
switch($color_option) {
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option1/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option1/placeOfMind.gif') !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option1/ubcHeader.gif') !important;
}
#UbcHeader li#UbcSubUnitLine {
	background: url('/sites/all/themes/gazebo/_header_options/option1/ubcSubUnit.gif') !important;	
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option1/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
  case 'option2': 
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option2/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option2/placeOfMind.gif') !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option2/ubcHeader.gif') !important;
}
#UbcHeader li#UbcSubUnitLine {
	background: url('/sites/all/themes/gazebo/_header_options/option2/ubcSubUnit.gif') !important;	
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option2/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
  case 'option3': 
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option3/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option3/placeOfMind.gif') !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option3/ubcHeader.gif') !important;
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option3/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
  case 'option4': 
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option4/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option4/placeOfMind.gif') !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option4/ubcHeader.gif') !important;
}
#UbcHeader li#UbcSubUnitLine {
	background: url('/sites/all/themes/gazebo/_header_options/option4/ubcSubUnit.gif') !important;	
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option4/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
  case 'option5': 
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option5/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/images/clf_colour_options/sprite_watermark.png') no-repeat " . theme_get_setting('colourpicker') . " !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option5/ubcHeader.gif') !important;
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option5/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
  case 'option6': 
  case 'option1': 
    print '<style>';
    print "/* Header Option Overrides */
#UbcHeader h1#UbcLogo {
	background: url('/sites/all/themes/gazebo/_header_options/option6/ubcLogo.gif') repeat scroll 0 0 transparent !important;	
}
#UbcHeader li.UbcMindLink {
	background: url('/sites/all/themes/gazebo/images/clf_colour_options/sprite_watermark.png') no-repeat " . theme_get_setting('colourpicker') . " !important;	
}
#UbcHeader li#UbcHeaderLine {
	background: url('/sites/all/themes/gazebo/_header_options/option6/ubcHeader.gif') !important;
}
#UbcHeader li#UbcSubUnitLine {
	background: url('/sites/all/themes/gazebo/_header_options/option6/ubcSubUnit.gif') !important;	
}
#UbcHeader a#UbcMindLink {
	background: url('/sites/all/themes/gazebo/_header_options/option6/PlaceOfMind-Gif-V04-unanimated.gif');		
}";
    print '</style>';
    break;
}


?>