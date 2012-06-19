<?php 

	/*	
	Available variables:
	
	General utility variables:
	$base_path: The base URL path of the Drupal installation. At the very least, this will always default to /.
	$directory: The directory the template is located in, e.g. modules/system or themes/bartik.
	$is_front: TRUE if the current page is the front page.
	$logged_in: TRUE if the user is registered and signed in.
	$is_admin: TRUE if the user has permission to access administration pages.
	
	Site identity:
	$front_page: The URL of the front page. Use this instead of $base_path, when linking to the front page. This includes the language domain or prefix.
	$logo: The path to the logo image, as defined in theme configuration.
	$site_name: The name of the site, empty when display has been disabled in theme settings.
	$site_slogan: The slogan of the site, empty when display has been disabled in theme settings.
	Navigation:
	
	$main_menu (array): An array containing the Main menu links for the site, if they have been configured.
	$secondary_menu (array): An array containing the Secondary menu links for the site, if they have been configured.
	$breadcrumb: The breadcrumb trail for the current page.
	
	Page content (in order of occurrence in the default page.tpl.php):
	$title_prefix (array): An array containing additional output populated by modules, intended to be displayed in front of the main title tag that appears in the template.
	$title: The page title, for use in the actual HTML content.
	$title_suffix (array): An array containing additional output populated by modules, intended to be displayed after the main title tag that appears in the template.
	$messages: HTML for status and error messages. Should be displayed prominently.
	$tabs (array): Tabs linking to any sub-pages beneath the current page (e.g., the view and edit tabs when displaying a node).
	$action_links (array): Actions local to the page, such as 'Add menu' on the menu administration interface.
	$feed_icons: A string of all feed icons for the current page.
	$node: The node object, if there is an automatically-loaded node associated with the page, and the node ID is the second argument in the page's path 
	(e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
	
	Regions:
	$page['help']: Dynamic help text, mostly for admin pages.
	$page['highlighted']: Items for the highlighted content region.
	$page['content']: The main content of the current page.
	$page['sidebar_first']: Items for the first sidebar.
	$page['sidebar_second']: Items for the second sidebar.
	$page['header']: Items for the header region.
	$page['footer']: Items for the footer region.
	
	*/

?>

<?php //require_once(path_to_theme() . '/config.php'); ?>
<?php require_once('config.php'); ?>

<!-- BEGIN: UBC CLF HEADER -->
  <div id="UbcHeaderWrapper" class="headerwrapper-node-<?php if (isset($node)): print $node->nid; endif; if ($is_front) print 'home'; ?>">
  <!-- BEGIN: UBC CLF GLOBAL UTILITY HEADER -->
    <?php print theme('ubc_clf_toolbar'); ?>
  <!-- END: UBC CLF GLOBAL UTILITY HEADER -->
  <!-- BEGIN: UBC CLF VISUAL IDENTITY HEADER -->
    <?php print theme('ubc_clf_header'); ?>
  <!-- END: UBC CLF VISUAL IDENTITY HEADER -->
  <!-- BEGIN: UBC CLF PRIMARY NAVIGATION -->  
    <?php if (isset($clf_dropdown)) { print $clf_dropdown; } ?>
  <!-- END: UBC CLF PRIMARY NAVIGATION -->
    <div id="secondary-menu-links">
    <?php if ($page['submenu_top']): ?>
      <?php print render($page['submenu_top']); ?>
    <?php endif; ?>
    </div>
  </div><!-- End UbcHeaderWrapper -->
<!-- END: UBC CLF HEADER -->

<!-- BEGIN: UBC CLF CONTENT SPACE -->
<div id="UbcContentWrapper" class="<?php if (!$is_front): print 'contentwrapper-node-'; ?><?php if (isset($node)): print $node->nid; endif; ?><?php endif; ?><?php if ($is_front) print 'contentwrapper-home'; else print ' contentwrapper-interior'; ?>">
  <div id="UbcContent" class="UbcContainer">  
    <?php if ($enable_breadcrumbs && !$is_front): ?>
      <div id="UbcBreadCrumb">
      <?php print $breadcrumb; ?>
      </div>
    <?php endif; ?>
		<!-- Begin UbcMainContentHeader -->
		<div id="UbcMainContentHeader">
		<?php if ($page['header']): ?>
		  <?php print render($page['header']); ?>
		<?php endif; ?>
		</div>
		<!-- End UbcMainContentHeader -->

       	<?php if (($layout_columns_home == 'three_column' && $is_front) || ($layout_columns_home == 'two_column_ls' && $is_front) ||
       	          ($layout_columns == 'three_column' && !$is_front) || ($layout_columns == 'two_column_ls' && !$is_front)
       	): ?>   	
       	  <?php if (isset($page['sidebar_first'])): ?>
            <div id="UbcSecondNav">
              <?php print render($page['sidebar_first']); ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>


		<div id="UbcMainContent" <?php if (!$is_front): ?>class="maincontent-node-<?php if (isset($node)): print $node->nid; endif; ?><?php endif; ?>">
		          
        <?php if ($tabs = render($tabs)): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php if ($title): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
        <?php if ($tabs): print render($tabs) . '</div>'; endif; ?>
        <?php //if ($tabs2): print '<ul class="tabs secondary">'; ?>
        <?php //print render($tabs2); ?>
        <?php //print '</ul>'; endif; ?>
        <?php if ($show_messages && $messages): print $messages; endif; ?>

		<?php if ($page['content_top']) : ?>
		  <?php print render($page['content_top']); ?>
		<?php endif; ?>

		<!-- Carousel code -->
		<?php if ($enable_carousel && $is_front) : ?>
		  <?php print theme('ubc_clf_carousel'); ?>
		<?php endif; ?>

		<!-- End carousel code -->
		
		<?php if ($page['content']) : ?>
		  <?php print render($page['content']); ?>
		<?php endif; ?>
		<?php if ($page['content_bottom']) : ?>
		  <?php print render($page['content_bottom']); ?>
		<?php endif; ?>
		
        <?php print $feed_icons ?>
        </div><!-- End UbcMainContent -->
	  
		<!-- show 'right' if layout options are selected in theme -->
        <?php if (($layout_columns == 'three_column' && !$is_front) || ($layout_columns == 'two_column_rs' && !$is_front) ||
                  ($layout_columns_home == 'three_column' && $is_front) || ($layout_columns_home == 'two_column_rs' && $is_front)
        ): ?>
          <div id="UbcContentSidebar" class="sidebar-node-<?php if (isset($node)): print $node->nid; endif; ?>" <?php if ($layout_columns == 'three_column'): ?> style="" <?php endif; ?>>
		    <?php print render($page['sidebar_second']); ?>
          </div><!-- End UbcContentSidebar -->
		<?php endif; ?>
		<?php print render($page['prefooter']); ?>
    </div><!-- End UbcContent UbcContainer -->
    
	<?php if ($page['subfooter']): ?>
        <ul id="UbcBottomNav" class="UbcContainer">
          <?php print render($page['subfooter']); ?>
        </ul>
    <?php endif; ?>   
  </div>
</div><!-- End UbcContentWrapper -->
<!-- END: UBC CLF CONTENT SPACE -->

<!-- BEGIN: UBC CLF FOOTER -->
<!-- BEGIN: UBC CLF VISUAL IDENTITY FOOTER -->
  <?php print theme('ubc_clf_visual_identity_footer'); ?>
<!-- END: UBC CLF VISUAL IDENTITY FOOTER -->
<!-- BEGIN: UBC CLF GLOBAL UTILITY FOOTER -->
  <?php print theme('ubc_clf_global_utility_footer'); ?>
<!-- END: UBC CLF GLOBAL UTILITY FOOTER -->
<!-- END: UBC CLF FOOTER -->