<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php //dsm($fields); ?>    

<div id="featured-story-sidebar">
  <div class='views-field-title'> <?php print $fields['title']->content; ?> </div>
  <div class='views-field-created'> <?php print $fields['created']->content; ?> </div>
  <div id='featured-story-body-wrapper'>
  <div class='views-field-field-news-image-fid'>
  <?php if ($fields['field_news_video_embed']->content == '') { ?>
   <?php print $fields['field_news_image_fid']->content; ?> 
  <? } else {
         print "<a href='node/" . $fields['nid']->content . "'><img src='" . $site_path . $directory . "/_ubc_clf/img/content/youtube.png' /></a>"; 
     } 
  ?>
  </div>
  <div class='views-field-body'><p> <?php print $fields['body']->content; ?> </p></div>
  </div>
  <div class='views-field-nothing'> <?php print $fields['nothing']->content; ?> </div>
</div>