<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property BillingAddress $BillingAddress
 * @property ShippingAddress $ShippingAddress
 * @property Order $Order
 */
class User extends AppModel {

	public $hasMany = array(
		'Code'
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please use a valid email address'
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email already taken'
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password is required',
			),
			'confirmed' => array(
		    'rule' => 'confirmPasswordCheck',
		    'message' => 'Passwords did not match'
		  ),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your first name',
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your last name',
			),
		),
		'verified' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
			),
		),
	);

	/**
	* To change the password you need the current password
	* @param array of data
	*/
	public function changePassword($data) {
		if (isset($data['User']['current_password']) && isset($data['User']['id'])) {
			if ($this->checkPassword($data['User']['id'], $data['User']['current_password'])) {
				unset($data['User']['current_password']);
				return $this->save($data);
			}	else {
				$this->invalidate('current_password', 'Your current password is not correct.');
			}
		}
		return false;
	}

	/**
	  * If confirm_password is set, make sure it matches the passed in password
	  * or return a validation error
	  */
	public function confirmPasswordCheck($check = null) {
	  if (isset($this->data[$this->alias]['confirm_password'])) {
	    if ($this->hashPassword($this->data[$this->alias]['confirm_password']) != $this->data[$this->alias]['password']) {
	      return false;
	    }
	  }
	  return true;
	}

	public function checkPassword($user_id, $password) {
		$official_pass = $this->field('password', array('User.id' => $user_id));
		if ($official_pass == $this->hashPassword($password)) {
			return true;
		}
		return false;
	}

	public function register($data) {
		if ($data['User']['password'] != $data['User']['confirm_password']) {
			$this->invalidate('password', 'Password and Confirmation Password don\'t match.');
			return false;
		}
		$data['User']['password'] = $this->hashPassword($data['User']['password']);
		return $this->save($data);
	}

	/**
	* Find the user by email or username
	* @param username_or_email
	* @param password
	* @return user found, or null
	*/
	public function findByEmailAndPassword($email, $password) {
		return $this->find('first', array(
			'conditions' => array(
				'email' => $email,
				'password' => $password
			),
			'recursive' => -1
		));
	}

	/**
	* Hash the password.
	* @param string to hash
	* @return string hashed password.
	*/
	public function hashPassword($password) {
		return Security::hash($password, null, true);
	}

	/**
    * This will take an email address, generate a password for it, hash it and save it to the database,
    * then an email will be sent out to the supplied email address asking for verification.
    *
    * @param string email to generate a password for, hash it and save it to the database
    * @return mixed int of created id, or false if unable to create.
    * @access public
    */
  public function createUserFromEmail($email = null, $sendNotification = false) {
    $save_data = array();
    $save_data['User']['email'] = $email;
    $save_data['User']['code'] = $this->randPass(4);
    $password = $this->randPass();
    $save_data['User']['password'] = $this->hashPassword($password);

    $this->create();
    if($this->save($save_data)){
    	if($sendNotification){
    		//Send email to user with password generated.
    	}
      return $this->id;
    }

    return false;
  }

  /**
	* Generate a strong random password
	* @param int length
	* @return string strong password
	*/
	public function randPass($length = 8) {
  	return substr(md5(rand().rand()), 0, $length);
  }
}