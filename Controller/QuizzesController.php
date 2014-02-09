<?php
App::uses('AppController', 'Controller');
/**
 * Quizzes Controller
 *
 * @property Quiz $Quiz
 * @property PaginatorComponent $Paginator
 */
class QuizzesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	var $uses = array('Quiz', 'Question', 'Choice', 'ActivitiesUser', 'Activity', 'Response');
	public $components = array('Paginator');

	public function take() {
		if ($this->request->is('post')) {
			// debug($this->request->data);die;
			
			$this->Quiz->create();
			$this->Quiz->save();
			$health = 10;
			foreach($this->request->data['Activity'] as $key => $activity_group) {
				foreach($activity_group as $question) {
					foreach($question as $key2 => $choice) {

						$points = $this->Choice->read('value', $choice);
						if(!empty($points['Choice']['value'])) {
							$health -= $points['Choice']['value'];
						}

						$this->Response->create();
						$this->Response->save(
							array(
								'activity_id' => $key,
								'user_id' => $this->Auth->user('id'),
								'choice_id' => $choice,
								'question_id' => $key2,
								'quiz_id' => $this->Quiz->id
							)
						);
					}
				}
			}
			$this->Quiz->save(array(
				'id' => $this->Quiz->id,
				'score' => $health
			));

die;



			// if ($this->Quiz->save($this->request->data)) {
			// 	$this->Session->setFlash(__('The quiz has been saved.'));
			// 	return $this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'));
			// }
		}
		// $this->Question->recursive = 1;
		$questions = $this->Question->find('all');
		$this->ActivitiesUser->recursive = 0;
		$activities_user = $this->ActivitiesUser->find('all', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));
		$activities = array();
		foreach($activities_user as $au) {
			array_push($activities, array('id' => $au['Activity']['id'], 'name' => $au['Activity']['name']));
		}

		$this->set(compact('questions', 'activities'));
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quiz->recursive = 0;
		$this->set('quizzes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
		$this->set('quiz', $this->Quiz->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quiz->create();
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'));
			}
		}
		$users = $this->Quiz->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Quiz->exists($id)) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quiz->save($this->request->data)) {
				$this->Session->setFlash(__('The quiz has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quiz could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Quiz.' . $this->Quiz->primaryKey => $id));
			$this->request->data = $this->Quiz->find('first', $options);
		}
		$users = $this->Quiz->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Quiz->id = $id;
		if (!$this->Quiz->exists()) {
			throw new NotFoundException(__('Invalid quiz'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quiz->delete()) {
			$this->Session->setFlash(__('The quiz has been deleted.'));
		} else {
			$this->Session->setFlash(__('The quiz could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
