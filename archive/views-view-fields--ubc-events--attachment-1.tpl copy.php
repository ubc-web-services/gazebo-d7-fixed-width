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
<?php 
    //dsm($fields);
    $body_text = $fields['body']->content; 
    $body_text_array = explode(". ", $body_text);
    
    $bta_location_splice_ubc = explode("UBC", $body_text_array[0]);
    //$bta_datesplice_pm = explode("PM", $body_text_array[0]);
    
    
    print "<div class='views-field-title'>" . $fields['title']->content . "</div>";
    print "<div class='views-field-field-ubcevent-start-date-value'>" .strip_tags($bta_location_splice_ubc[0]) . "</div>";
    print "<div id='event-list-body'><p>" .$body_text_array[1] . "</p></div>";
    
    
      
 ?>
