<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/admin',array('admin' => true, 'plugin' => null, 'controller'=>'codes','action'=>'index'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
  Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
  Router::connect('/account', array('controller' => 'users', 'action' => 'account'));
  //Redirect admin login to user login
	Router::connect('/admin/users/login', array('admin' => false, 'controller' => 'users', 'action' => 'login'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

	//combine edit and add
	Router::connect('/admin/:controller/add', array('admin' => true, 'controller' => ':controller', 'action' => 'edit'));
	Router::connect('/:controller/add', array('controller' => ':controller', 'action' => 'edit'));

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
