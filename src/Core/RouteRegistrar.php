<?php

namespace GetCandy\Api\Core;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for clients and admins.
     *
     * @return void
     */
    public function all()
    {
        $this->forAdmins();
        $this->forClients();
    }

    /**
     * Register the client routes.
     *
     * @return void
     */
    public function forClients()
    {
        $this->router->group([], __DIR__.'/../../routes/api.client.php');
    }

    public function forAdmins()
    {
        $this->router->group([], __DIR__.'/../../routes/api.php');
    }
}
