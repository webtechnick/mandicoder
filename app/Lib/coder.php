<?php
App::uses('Mandicoder','Lib');
class Coder extends Mandicoder {

	/**
	* overwrite encode to also save to database
	*/
	public function encode($string = null, $options = array()) {
		$retval = parent::encode($string, $options);
		ClassRegistry::init('Code')->saveCode($this);
		return $retval;
	}

	/**
	* overwrite decode to also save to database
	*/
	public function decode($string = null, $options = array()) {
		$retval = parent::decode($string, $options);
		ClassRegistry::init('Code')->saveCode($this);
		return $retval;
	}

}