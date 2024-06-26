<?php
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Psr\Http\Message\ServerRequestInterface;

return [
    'authentication' => function (ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler) {
        $service = new AuthenticationService();

        // Carregar os identificadores de autenticação, por exemplo, senha de usuário
        $service->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ]
        ]);

        // Carregar os autenticadores, por exemplo, formulário
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'loginUrl' => '/users/login',
        ]);

        return $service;
    }
];
