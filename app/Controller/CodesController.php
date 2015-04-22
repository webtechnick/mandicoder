<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CodesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Code->recursive = 0;
		$this->set('codes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		$options = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
		$this->set('code', $this->Code->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Code->create();
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Code->exists($id)) {
			throw new NotFoundException(__('Invalid code'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Code->save($this->request->data)) {
				$this->Session->setFlash(__('The code has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Code.' . $this->Code->primaryKey => $id));
			$this->request->data = $this->Code->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Code->id = $id;
		if (!$this->Code->exists()) {
			throw new NotFoundException(__('Invalid code'));
		}
		if ($this->Code->delete($i)) {
			$this->Session->setFlash(__('The code has been deleted.'));
		} else {
			$this->Session->setFlash(__('The code could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
