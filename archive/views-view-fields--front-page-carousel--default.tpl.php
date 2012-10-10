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


      <li class="UbcCarouselItem">
      <div class="UBCHeadlinePicture"> 
      <?php if ($row->nid != 125) { ?>
      
      <?php if ($fields['field_news_video_embed']->content == '') {
       print $fields['field_news_image_fid']->content;
      } else
      {
       print $fields['field_news_video_embed']->content; 
      }
      ?>
      
      <?php } else 
      {
       print $fields['body']->content;
      }
      ?> 
      </div>
      <div id="carousel-text-wrapper"><h4><?php print $fields['title']->content; ?></h4>
      <p><?php print trim($fields['field_news_subtitle_value']->content); ?></p>
      <a class="UBCHeadlineReadMore" href="<?php print base_path(); ?>node/<?php print $row->nid; ?>">Read More</a></div></li>
    <!-- UBC Reports -->
