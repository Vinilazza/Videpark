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
};