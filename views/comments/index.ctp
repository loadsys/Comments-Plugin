<?php 
$divId = 'comments_'.$_model.'_'.$_foreignKey;
echo $ajax->div($divId); ?>
<a name="<?php e($divId); ?>"></a>
<?php
$paginator->options(array(
	'update' => $divId,
	'url' => $this->params['pass'], 
));
?>
<h3><?php __('Comments');?></h3>
<?php if ( empty($comments) ) : ?>
	<em>No Comments Posted</em>
<?php endif; ?>
<ol class="comment-list">
	<?php foreach ($comments as $comment): ?>
  	<li>
		<div id="comment<?php e($comment['Comment']['id']); ?>" class="comment">
			<div class="posted-by">
				<strong>
				<?php if ( empty($comment['Creator']['id']) ): ?>
					<em>Anonymous</em>
				<?php else: ?>
					<?php e($comment['Creator']['name']); ?>
				<?php endif; ?>
				said on <em><?php e($time->relativeTime($comment['Comment']['created'])); ?></em>:</strong>
			</div>
			<?php e(nl2br($comment['Comment']['comment'])); ?>
		</div>
	</li>
	<?php endforeach; ?>
</ol>
<div style="clear: both;"></div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php
echo $this->requestAction('/comments/add/'.$_model.'/'.$_foreignKey, array('return'));
?>
<?php echo $ajax->divEnd($divId); ?>
