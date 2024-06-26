<?php
// src/Application.php
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Authentication\Middleware\AuthenticationMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Psr\Http\Message\ServerRequestInterface;

class Application extends BaseApplication
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        // Load more plugins here
        $this->addPlugin('Bake');
        $this->addPlugin('Authentication');
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue): MiddlewareQueue
    {
        // Load the authentication service configuration
        $authenticationService = $this->createAuthenticationService();

        // Add ErrorHandlerMiddleware
        $middlewareQueue->add(ErrorHandlerMiddleware::class);

        // Add AssetMiddleware for serving asset files.
        $middlewareQueue->add(AssetMiddleware::class);

        // Add RoutingMiddleware for handling URL routing.
        $middlewareQueue->add(new RoutingMiddleware($this));

        // Add the AuthenticationMiddleware.
        $middlewareQueue->add(new AuthenticationMiddleware($authenticationService));

        return $middlewareQueue;
    }

    /**
     * Create the authentication service
     *
     * @return \Authentication\AuthenticationServiceInterface
     */
    protected function createAuthenticationService(): AuthenticationServiceInterface
    {
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

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update/add services to.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
    }

    /**
     * Bootstrapping for CLI environments.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        try {
            $this->addPlugin('Bake');
            $this->addPlugin('Migrations');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        // Load more plugins here
    }
}
