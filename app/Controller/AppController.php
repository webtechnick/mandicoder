<?php
App::uses('Controller', 'Controller');
App::uses('Coder', 'Lib');
class AppController extends Controller {
	public $Mandicoder = null;

	public function beforeFilter() {
		$this->Mandicoder = new Coder();
	}
}
