<?php
App::uses('Controller', 'Controller');
App::uses('Coder', 'Lib');
class AppController extends Controller {
	public $Mandicoder = null;
	public $components = array(
		'Session',
		'Auth' => array(
      'authorize' => array('Controller'),
      'loginAction' => array('controller' => 'users', 'action' => 'login'),
      'allowedActions' => array('search','view','index','get','display'),
      'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
      'authError' => 'Please Login',
      'autoRedirect' => false,
      'authenticate' => array(
      	'Form' => array(
      		'fields' => array('username' => 'email')
      	)
      )
    ),
		'DebugKit.Toolbar',
		'RequestHandler',
		'Security',
	);
	public $helpers = array();

	public function beforeFilter() {
		$this->Mandicoder = new Coder();
		$this->set('user', $this->Auth->user());
		$this->set('is_admin', $this->isAdmin());
	}

	/**
	* Auth authorization function
	*/
	public function isAuthorized($user, $request = null) {
		if (strpos($this->request->action,"admin") !== false){
			return $this->isAdmin();
		}
		return true;
	}

	public function isAdmin(){
    return ($this->Auth->user('group') == 'admin');
  }

  public function goodFlash($message){
    $this->Session->setFlash($message,'goodFlash');
  }

  public function badFlash($message){
    $this->Session->setFlash($message,'badFlash');
  }

  public function infoFlash($message){
    $this->Session->setFlash($message,'infoFlash');
  }

  /**
    * Take all the data[search] and puts it into params named
    */
  protected function dataToNamed(){
  	$params = is_array($this->request->params['named']) ? $this->request->params['named'] : array();
  	$data = isset($this->request->data['Search']) ? $this->request->data['Search'] : array();
  	$this->request->params['named'] = array_merge($data, $params);
  }
}