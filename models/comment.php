<?php
class Comment extends CommentsAppModel {

	var $name = 'Comment';
	var $validate = array(
		'comment' => array('notempty'),
		'model' => array('notempty'),
		'foreign_key' => array('numeric'),
		'creator_id' => array('numeric'),
		'modifier_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Creator' => array('className' => 'User',
								'foreignKey' => 'creator_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Modifier' => array('className' => 'User',
								'foreignKey' => 'modifier_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
}
?>
