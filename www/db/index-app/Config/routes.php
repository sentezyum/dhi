<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
CakePlugin::routes();

Router::connect('/', array('controller' => 'main', 'action' => 'index', 'language' => 'en'));
Router::connect('/photos/*', array('controller' => 'photos', 'action' => 'index'));
Router::connect('/:language/urun_gruplari/:group', array('controller' => 'urun_gruplari', 'action' => 'view'), array('pass' => Array('group', 'language')));
Router::connect('/urun_gruplari/:group', array('controller' => 'urun_gruplari', 'action' => 'view', 'language' => 'en'), array('pass' => Array('group')));
Router::connect('/:language',array('controller' => 'main' , 'action' => 'index'), array('pass' => Array('language')));
Router::connect('/:language/:page',array('action' => 'pages'), array('pass' => Array('language', 'page')));



require CAKE . 'Config' . DS . 'routes.php';

        
