<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<li class="UbcMenuSection">
<?php if (!empty($block->subject)): ?>
	<h4><?php print $block->subject ?></h4>
<?php endif;?>
	<?php print $block->content ?><?php print $edit_links; ?>
</li>