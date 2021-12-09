<?php

namespace App\Providers;

use App\Models\{Category,
    Client,
    Coupon,
    DetailPlan,
    FormPayment,
    Group,
    Permission,
    Plan,
    Product,
    Provider,
    Role,
    Table,
    Tenant,
    User
};
use App\Observers\{CategoryObserver,
    ClientObserver,
    CouponObserver,
    DetailPlanObserver,
    FormPaymentObserver,
    GroupObserver,
    PermissionObserver,
    PlanObserver,
    ProductObserver,
    ProviderObserver,
    RoleObserver,
    TableObserver,
    TenantObserver,
    UserObserver
};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use NascentAfrica\Jetstrap\JetstrapFacade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        JetstrapFacade::useAdminLte3();

        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        Table::observe(TableObserver::class);
        Client::observe(ClientObserver::class);
        Group::observe(GroupObserver::class);
        Permission::observe(PermissionObserver::class);
        Role::observe(RoleObserver::class);
        User::observe(UserObserver::class);
        DetailPlan::observe(DetailPlanObserver::class);
        Coupon::observe(CouponObserver::class);
        Provider::observe(ProviderObserver::class);
        FormPayment::observe(FormPaymentObserver::class);
    }
}
