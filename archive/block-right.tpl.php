<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $

// turn subject into usable div class, so it can be styled per block
$subject = $block->subject;
$div_class = strtolower(str_replace(" ", "-", $subject));

$delta = $block->delta;
$div_class_delta = strtolower(str_replace(" ", "-", $delta));

?>

<div class="UbcQuickLinks quick-links-right <?php print $div_class; ?> block-right-<?php print $div_class_delta; ?>">
<div class=" block-hover">
<?php if (!empty($block->subject)): ?>
  <h2 class="UbcHeaderCallOut"><?php print $block->subject ?></h2>
<?php endif;?>
  <?php print $edit_links; ?><?php print $block->content ?>
</div>
</div>