<?php
class AddingUsers extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'adding_users';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'email' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'password' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'verified' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'group' => array('type' => 'string', 'null' => false, 'default' => 'user', 'length' => 10, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'comment' => 'admin,user', 'charset' => 'latin1'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'email' => array('column' => 'email', 'unique' => 0),
						'password' => array('column' => 'password', 'unique' => 0),
						'group' => array('column' => 'group', 'unique' => 0),
						'created' => array('column' => 'created', 'unique' => 0),
						'modified' => array('column' => 'modified', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
