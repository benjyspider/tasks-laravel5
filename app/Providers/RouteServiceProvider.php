<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /* Suppression de la methode boot(), car re-écrire une méthode préente dans la super-classe (classe mère) sans différences est inutile : Resolve as fixed */

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
	/* Suppression de "$router" en paramètre qui est non utilisée : Resolve as fixed */
        $router->group(['namespace' => $this->namespace], function() {
            require app_path('Http/routes.php');
        });
    }
}
