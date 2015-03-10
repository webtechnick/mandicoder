<?php
App::uses('Mandicoder', 'Lib');
App::uses('AppController', 'Controller');
class PagesController extends AppController {

	public $uses = array();
	public $Mandicoder = null;

	public function home() {
		if (!empty($this->request->data)) {
			$this->Mandicoder = new Mandicoder();
			$output = null;
			if (!empty($this->request->data['Decode']['data'])) {
				$output = $this->Mandicoder->decode($this->request->data['Decode']['data']);
			} elseif (!empty($this->request->data['Encode']['data'])) {
				$output = $this->Mandicoder->encode($this->request->data['Encode']['data']);
			}
			$output = nl2br($output);
			$this->set('output',$output);
		}
	}
}
