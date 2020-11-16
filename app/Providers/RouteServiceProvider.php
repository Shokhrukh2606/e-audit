<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/uz/dispatcher';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        
        $this->routes(function () {

            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/overrides.php'));

            Route::group(['prefix'=>"{l}", 'middleware'=>'lang'],function(){

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->prefix('customer')
                    ->name('customer.')
                    ->group(base_path('routes/customer.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->prefix('agent')
                    ->name('agent.')
                    ->group(base_path('routes/agent.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->prefix('auditor')
                    ->name('auditor.')
                    ->group(base_path('routes/auditor.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->prefix('admin')
                    ->name('admin.')
                    ->group(base_path('routes/admin.php'));

            });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
