<?php
App::uses('AppController', 'Controller');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 */
class ActivitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */

	var $uses = array('Activity', 'User', 'ActivitiesUser');

	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */

	public function index() {
		$this->Activity->recursive = 0;
		$this->set('activities', $this->Paginator->paginate());
	}

	public function select() {
		if ($this->request->is('post')) {

			$data = array();
			// $data['ActivitiesUser'] = array();

			foreach($this->request->data['Activity'] as $selected_activity) {
				// array_push($data['ActivitiesUser'],
				array_push($data,
					array(
						'activity_id' => $selected_activity['id'],
						'user_id' => $this->Auth->user('id'),
						'frequency' => $selected_activity['frequency']
					)
				); 
			}
			// debug($data);die;
			if($this->ActivitiesUser->saveAll($data)) {
				$this->Session->setFlash(__('The activities have been saved.'));
				return $this->redirect(array('controller' => 'quizzes', 'action' => 'take'));
			} else {
				debug($this->ActivitiesUser->validationErrors);die;
				$this->log(print_r($this->ActivitiesUser->validationErrors, true));
				$this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
			}
		}
		$this->Activity->recursive = 0;
		$this->set('activities', $this->Activity->find('all'));
		$this->ActivitiesUser->recursive = 0;
		$this->set('user_activities', $this->ActivitiesUser->find('all', array(
				'conditions' => array ('user_id' => $this->Auth->user('id'))
			)
		));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$this->set('activity', $this->Activity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Activity->create();
			if ($this->Activity->save($this->request->data)) {
				$this->Session->setFlash(__('The activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
			}
		}
		$users = $this->Activity->User->find('list');
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
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Activity->save($this->request->data)) {
				$this->Session->setFlash(__('The activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			$this->request->data = $this->Activity->find('first', $options);
		}
		$users = $this->Activity->User->find('list');
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
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Activity->delete()) {
			$this->Session->setFlash(__('The activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
