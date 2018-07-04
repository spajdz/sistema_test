<?php
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

Router::connect('/admin', array('controller' => 'usuarios', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'usuarios', 'action' => 'login', 'admin' => true));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
