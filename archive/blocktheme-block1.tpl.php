<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $

// turn subject into usable div class, so it can be styled per block
$subject = $block->delta;
$div_class = strtolower(str_replace(" ", "-", $subject));
?>

<div id="blocktheme-1" class="block-hover quick-links-block  <?php print $div_class; ?> ">
<?php if (!empty($block->subject)): ?>
  <h2><?php print $block->subject ?></h2>
<?php endif;?>

<div class="content">
  <?php print $edit_links; ?>
  <?php print $block->content ?>
</div>
</div>
