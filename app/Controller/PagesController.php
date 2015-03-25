<?php
App::uses('AppController', 'Controller');
class PagesController extends AppController {

	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('home');
	}

	public function home() {
		$this->Mandicoder->reset();
		if (!empty($this->request->data)) {
			$output = null;
			if (!empty($this->request->data['Decode']['data'])) {
				$output = $this->Mandicoder->decode(
					$this->request->data['Decode']['data'],
					array(
						'reverse' => $this->request->data['Decode']['reverse'],
						'engine' => $this->request->data['Decode']['engine']
					)
				);
			} elseif (!empty($this->request->data['Encode']['data'])) {
				$output = $this->Mandicoder->encode(
					$this->request->data['Encode']['data'],
					array(
						'reverse' => $this->request->data['Encode']['reverse'],
						'engine' => $this->request->data['Encode']['engine']
					)
				);
			}
			$output = nl2br($output);
			$this->set('output',$output);
		}
		$this->set('engines', $this->Mandicoder->getEngines());
	}
}
