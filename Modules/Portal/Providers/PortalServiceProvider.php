<?php

namespace Modules\Portal\Providers;

use Illuminate\Database\Eloquent\Factory;
use Modules\Cms\Entities\CmsUser;
use Modules\Core\Providers\Base\ModuleServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Portal\Entities\Offer;
use Modules\Portal\Observers\OfferObserver;

class PortalServiceProvider extends ModuleServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected string $moduleName = 'Portal';

    /**
     * @var string $moduleNameLower
     */
    protected string $moduleNameLower = 'portal';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Paginator::useBootstrap(false);
        $this->registerObservers();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function registerObservers()
    {
        Offer::observe(OfferObserver::class);
    }

}
