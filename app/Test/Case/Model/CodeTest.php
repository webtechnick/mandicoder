<?php
App::uses('Code', 'Model');

/**
 * Code Test Case
 *
 */
class CodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.code'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Code = ClassRegistry::init('Code');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Code);

		parent::tearDown();
	}

}
