<?php
class CommentsController extends CommentsAppController {

	var $name = 'Comments';
	var $helpers = array('Html', 'Form', 'Ajax', 'Time');
	var $components = array('RequestHandler');

	function beforeFilter() {
		parent::beforeFilter();
		$this->LoadsysAuth->allow('index', 'add');
	}

	function index($model, $id) {
		$this->paginate = array(
			'conditions' => array(
				'Comment.model' => $model,
				'Comment.foreign_key' => $id,
			),
			'contain' => array(
				'Creator',
			),
			'limit' => 8,
			'page' => 'first',
		);
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
		$this->set('_model', $model);
		$this->set('_foreignKey', $id);
	}

	function add($model = null, $id = null) {
		
		if (!empty($this->data)) {
			$model = Set::extract($this->data, 'Comment.model');
			$id = Set::extract($this->data, 'Comment.foreign_key');

			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The Comment has been saved', true));
				$this->data = array();
				$this->set('successful', true);
			} else {
				$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true));
			}
		}
		else {
			$this->data = array(
				'Comment' => array(
					'model' => $model,
					'foreign_key' => $id,
				)
			);
		}
		$this->set('_model', $model);
		$this->set('_foreignKey', $id);
	}

}
?>
