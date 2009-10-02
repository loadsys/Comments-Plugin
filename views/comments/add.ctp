<?php
$divId = 'comment_add_'.$_model.'_'.$_foreignKey;
echo $ajax->div($divId); 
$session->flash();
?>
<?php
if ( !empty($successful) ) {
	echo $javascript->codeBlock($ajax->remoteFunction(array(
		'url' => '/comments/index/'.$_model.'/'.$_foreignKey,
		'update' => 'comments_'.$_model.'_'.$_foreignKey,
	)));
}
?>
<div class="comments form">
<?php echo $ajax->form('Comment', 'post', array('model' => 'Comment', 'update' => $divId));?>
	<fieldset>
 		<legend><?php __('Add Comment');?></legend>
	<?php
		echo $form->input('model', array('type' => 'hidden'));
		echo $form->input('foreign_key', array('type' => 'hidden'));
		echo $form->input('comment');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $ajax->divEnd($divId); ?>
