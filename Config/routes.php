<?php
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

Router::connect('/admin', array('controller' => 'usuarios', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'usuarios', 'action' => 'login', 'admin' => true));

foreach ( ['neumaticos', 'accesorios', 'llantas'] as $tipo ) 
{

    Router::connect("/{$tipo}/:marca/ficha/:slug", array('controller' => 'productos', 'action' => 'view', $tipo));
    Router::connect("/{$tipo}/ficha/:slug", array('controller' => 'productos', 'action' => 'view', $tipo));
    // Router::connect("/{$tipo}/:marca/*", array('controller' => 'productos', 'action' => 'marca', $tipo));
    Router::connect("/{$tipo}", array('controller' => 'productos', 'action' => 'index', $tipo));
}

Router::connect("/neumaticos/*", array('controller' => 'productos', 'action' => 'categorias', 'neumaticos'));
Router::connect("/llantas/*", array('controller' => 'productos', 'action' => 'categorias', 'llantas'));


Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
