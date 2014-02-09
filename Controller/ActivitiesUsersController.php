<?php
App::uses('AppController', 'Controller');
/**
 * ActivitiesUsers Controller
 *
 * @property ActivitiesUser $ActivitiesUser
 * @property PaginatorComponent $Paginator
 */
class ActivitiesUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ActivitiesUser->recursive = 0;
		$this->set('activitiesUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ActivitiesUser->exists($id)) {
			throw new NotFoundException(__('Invalid activities user'));
		}
		$options = array('conditions' => array('ActivitiesUser.' . $this->ActivitiesUser->primaryKey => $id));
		$this->set('activitiesUser', $this->ActivitiesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ActivitiesUser->create();
			if ($this->ActivitiesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The activities user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The activities user could not be saved. Please, try again.'));
			}
		}
		$activities = $this->ActivitiesUser->Activity->find('list');
		$users = $this->ActivitiesUser->User->find('list');
		$this->set(compact('activities', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ActivitiesUser->exists($id)) {
			throw new NotFoundException(__('Invalid activities user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ActivitiesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The activities user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The activities user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ActivitiesUser.' . $this->ActivitiesUser->primaryKey => $id));
			$this->request->data = $this->ActivitiesUser->find('first', $options);
		}
		$activities = $this->ActivitiesUser->Activity->find('list');
		$users = $this->ActivitiesUser->User->find('list');
		$this->set(compact('activities', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ActivitiesUser->id = $id;
		if (!$this->ActivitiesUser->exists()) {
			throw new NotFoundException(__('Invalid activities user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ActivitiesUser->delete()) {
			$this->Session->setFlash(__('The activities user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The activities user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
