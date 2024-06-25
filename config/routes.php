<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Veiculos', 'action' => 'index']);
        $builder->fallbacks();
    });

    $routes->scope('/movimentos', function (RouteBuilder $builder) {
        $builder->connect('/', ['controller' => 'Movimentos', 'action' => 'index']);
        $builder->fallbacks();
    });
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/planos', ['controller' => 'Planos', 'action' => 'index']);
    $routes->connect('/planos/add', ['controller' => 'Planos', 'action' => 'add']);
    $routes->connect('/planos/edit/:id', ['controller' => 'Planos', 'action' => 'edit'], ['pass' => ['id']]);
    $routes->connect('/planos/delete/:id', ['controller' => 'Planos', 'action' => 'delete'], ['pass' => ['id']]);


    
};


?>
