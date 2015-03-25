<?php
App::uses('AppModel', 'Model');
/**
 * Code Model
 *
 */
class Code extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'engine';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'decoded' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'encoded' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'engine' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_reverse' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	/**
	* Takes a mandicoder object and saves it into the database
	* No need to save more than one encode and decode, so we just do it
	* once.
	*/
	public function saveCode(Coder $Mandicoder) {
		$data = array(
			'encoded' => $Mandicoder->encoded,
			'decoded' => $Mandicoder->decoded,
			'engine' => $Mandicoder->currentEngine,
		);
		if ($this->hasAny($data)) {
			return true;
		}
		return $this->saveAll($data);
	}
}
