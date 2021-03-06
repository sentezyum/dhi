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

Router::parseExtensions("html");
Router::parseExtensions("jpg");
Router::parseExtensions("jpeg");
Router::parseExtensions("png");

Router::connect('/', array('controller' => 'main', 'action' => 'index'));

Router::connect('/photos/:id-:slug', array('controller' => 'photos', 'action' => 'index'), array('id' => '[0-9]+'));
Router::connect('/:controller/:id-:slug.html', array(), array('id' => '[0-9]+'));
Router::connect('/:controller.html', array());
Router::connect('/:language/:controller.html', array('action' => 'index'), array('language' => '[a-z]{3}|[a-z]{2}'));
Router::connect('/:language/:controller/:id-:slug.html', array(), array('language' => '[a-z]{3}|[a-z]{2}', 'id' => '[0-9]+'));
Router::connect('/:language/:controller/:action/*', array(), array('language' => '[a-z]{3}|[a-z]{2}'));
Router::connect('/:language',array('controller' => 'main' , 'action' => 'index'), array('language' => '[a-z]{3}|[a-z]{2}'));
Router::connect('/', array('controller' => 'main' , 'action' => 'index'));

require CAKE . 'Config' . DS . 'routes.php';

        
