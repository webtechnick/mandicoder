<?php
App::uses('Model', 'Model');
class AppModel extends Model {
	public $actsAs = array('Containable');
	public $recursive = -1;
	/**
	* returns the user_id/member_id for a logged in member/user
	* @param mixed $user usually blank -or- array('id'=>$user_id)
	* @return int $user_id
	*/
	public function getUserId($user=null) {
		if (is_numeric($user)) {
			return intval($user);
		}
		App::uses('AuthComponent','Controller/Component');
		return AuthComponent::user('id');
	}
}