<?php

namespace Vuetified\Configuration;

use Vuetified\Vuetified;
use Illuminate\Support\Facades\Auth;
use Vuetified\Contracts\InitialFrontendState;

trait ProvidesScriptVariables
{
    /**
     * Get the default JavaScript variables for Spark.
     *
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'csrfToken' => csrf_token(),
            'env' => config('app.env'),
            'api_endpoint' => config('app.domain').'/api',
            'site'  => config('site'), // Should Be Fetch From DB Settings
            'menu' => config('menu'), // Should Be Fetch From DB Menu and GroupMenu
            'grouplinks' => config('grouplinks'),
            'theme' => config('theme'),
            'cart' => self::getCart()
        ];
    }

    protected static function getState()
    {
       return Vuetified::call(InitialFrontendState::class.'@forUser', [Auth::user()]);
    }
    protected static function getCart()
    {
       return Vuetified::call(InitialFrontendState::class.'@getCart');
    }

}

