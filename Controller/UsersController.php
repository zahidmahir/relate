<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	
	var $uses = array('User', 'Activity', 'ActivitiesUser', 'Quiz', 'Response');
	
	public $components = array('Paginator');

	public function add_activity($activity_id = null) {
		$this->autoRender = false;
		if (!$this->Activity->exists($activity_id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->ActivitiesUser->create();
		$data = array(
			'user_id' => $this->Auth->user('id'),
			'activity_id' => $activity_id
		);
		if($this->ActivitiesUser->save($data)) {
			$this->Session->setFlash(__('Activity has been added. Please login'));
		} else {
			$this->Session->setFlash(__('Activity has been NOT added.'));
		}
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'activities', 'action' => 'select'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$activities = $this->User->Activity->find('list');
		$this->set(compact('activities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$activities = $this->User->Activity->find('list');
		$this->set(compact('activities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout');
	}

	public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirect());
      }
      $this->Session->setFlash(__('Invalid username or password, try again'));
    }
	}

	public function logout() {
    return $this->redirect($this->Auth->logout());
	}

	public function home() {
		$this->Quiz->recursive = -1;

		$reports = $this->Quiz->find('all', 
			array(
				'conditions' => array(
					'Quiz.user_id' => $this->Auth->user('id'), 
				),
		    'order' => array('Quiz.created DESC'),
		    'limit' => 2
			)
		);

		if(count($reports) > 0) {
			$current_quiz = $reports[0];			
		
			$this->Response->recursive = -1;
			$current_responses = $this->Response->find('all', 
				array(
					'conditions' => array(
						'Response.user_id' => $this->Auth->user('id'), 
						'Response.quiz_id' => $current_quiz['Quiz']['id']
					)
				)	
			);


			$a = $this->Activity->find('list');
			// debug($a);die;

			$activities = array();
			$activities['current'] = array();

			foreach($current_responses as $response) {
				if(empty($activities['current'][$a[$response['Response']['activity_id']]])) {
					$activities['current'][$a[$response['Response']['activity_id']]]=0;
				}
				$activities['current'][$a[$response['Response']['activity_id']]] +=$response['Response']['choice_value'];
			}
			$this->set('current_score', $current_quiz['Quiz']['score']);

			if(count($reports) > 1){
				$activities['previous'] = array();
				$previous_quiz = $reports[1];
				$previous_responses = $this->Response->find('all', 
					array(
						'conditions' => array(
							'Response.user_id' => $this->Auth->user('id'), 
							'Response.quiz_id' => $previous_quiz['Quiz']['id']
						)
					)	
				);
				foreach($previous_responses as $response) {
					if(empty($activities['previous'][$a[$response['Response']['activity_id']]])) {
						$activities['previous'][$a[$response['Response']['activity_id']]]=0;
					}
					$activities['previous'][$a[$response['Response']['activity_id']]] +=$response['Response']['choice_value'];
				}
			}

			$this->set(compact('activities'));
		}
	}
}
