<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>

<?php 
// turn subject into usable id
$subject = $block->subject;
$div_id = strtolower(str_replace(" ", "-", $subject));
$div_id .= "_ui";
?>

<div id="<?php print $div_id; ?>" class="UbcQuickLinks tab-widget">
<div class="widget-inner">
<?php if (!empty($block->subject)): ?>


<li class="ui-append"><a href="#<?php print $div_id; ?>"><?php print $block->subject; ?></a></li>
<?php endif;?>
</div>

<?php print $block->content ?>
</div>