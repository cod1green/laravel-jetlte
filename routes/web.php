<?php

use App\Http\Controllers\Admin\{CategoryController,
    DashboardController,
    DetailPlanController,
    OrderController,
    PlanController,
    ProductController,
    SaleController,
    SubscriptionController,
    TableController,
    TenantController,
    UserController
};
use App\Http\Controllers\Admin\ACL\{GroupController,
    GroupPermissionController,
    PermissionController,
    PermissionRoleController,
    PlanGroupController,
    RoleController,
    RoleUserController
};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('admin.prefix'))
    ->middleware(['auth:sanctum', 'verified', 'subscribed'])
    ->group(
        function () {
            //Orders
            Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

            //Sales
            Route::get('sales', [SaleController::class, 'pdv'])->name('sales.pdv');

            /**
             * Companies
             */
            Route::any('search', [TenantController::class, 'search'])->name('tenants.search');
            // Route::get('tenants/{idTenant}/categories', 'TenantController@categories')->name('tenants.categories');
            Route::resource('tenants', TenantController::class);

            /**
             * Tables
             */
            Route::get('tables/qrcode/{idTable}', [TableController::class, 'qrcode'])->name('tables.qrcode');
            Route::any('tables/search', [TableController::class, 'search'])->name('tables.search');
            Route::resource('tables', TableController::class);

            /**
             * Products x Categories
             */
            Route::get(
                'products/{idProduct}/categories/{idCategory}/detach',
                [ProductController::class, 'productCategoriesDetach']
            )->name('products.categories.detach');
            Route::get('products/{idProduct}/categories/create', [ProductController::class, 'categoriesAvailable'])
                ->name('products.categories.available');
            Route::post('products/{idProduct}/categories', [ProductController::class, 'productCategoriesAttach'])
                ->name('products.categories.attach');
            Route::get('products/{idProduct}/categories', [ProductController::class, 'categories'])
                ->name('products.categories');

            /**
             * Products
             */
            Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
            Route::resource('products', ProductController::class);

            /**
             * Categories
             */
            Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
            Route::resource('categories', CategoryController::class);

            /**
             * Users x Roles
             */
            Route::get('users/{id}/roles/{idRole}/detach', [RoleUserController::class, 'detachUserRole'])
                ->name('users.roles.detach');
            Route::any('users/{id}/roles/create', [RoleUserController::class, 'userRoleAvailable'])
                ->name('users.roles.available');
            Route::post('users/{id}/roles', [RoleUserController::class, 'attachUserRole'])
                ->name('users.roles.attach');
            Route::get('users/{id}/roles', [RoleUserController::class, 'roles'])->name('users.roles');

            /**
             * Users
             */
            Route::get('users/profile/{username}', [UserController::class, 'profile'])->name('users.profile');

            Route::get('users/create', [UserController::class, 'create'])->name('users.create');
            Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::post('users', [UserController::class, 'store'])->name('users.store');
            Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
            Route::any('users/search', [UserController::class, 'search'])->name('users.search');
            Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
            Route::get('users', [UserController::class, 'index'])->name('users.index');

            /**
             * Plans x Groups
             */
            Route::get('plans/{id}/groups/{idGroup}/detach', [PlanGroupController::class, 'planGroupsDetach'])
                ->name('plans.groups.detach');
            Route::post('plans/{id}/groups', [PlanGroupController::class, 'planGroupsAttach'])
                ->name('plans.groups.attach');
            Route::any('plans/{id}/groups/create', [PlanGroupController::class, 'groupsAvailable'])
                ->name('plans.groups.available');
            Route::get('plans/{id}/groups', [PlanGroupController::class, 'groups'])
                ->name('plans.groups');

            /**
             * Groups x Permissions
             */
            Route::get(
                'groups/{id}/permissions/{idPermission}/detach',
                [GroupPermissionController::class, 'groupPermissionsDetach']
            )->name('groups.permissions.detach');
            Route::post('groups/{id}/permissions', [GroupPermissionController::class, 'groupPermissionsAttach'])
                ->name('groups.permissions.attach');
            Route::any('groups/{id}/permissions/create', [GroupPermissionController::class, 'permissionsAvailable'])
                ->name('groups.permissions.available');
            Route::get('groups/{id}/permissions', [GroupPermissionController::class, 'permissions'])
                ->name('groups.permissions');

            /**
             * Permissions x Groups
             */
            Route::get(
                'permissions/{id}/groups/{idGroup}/detach',
                [GroupPermissionController::class, 'permissionGroupsDetach']
            )->name('permissions.groups.detach');
            Route::post('permissions/{id}/groups', [GroupPermissionController::class, 'permissionsGroupAttach'])
                ->name('permissions.groups.attach');
            Route::any('permissions/{id}/groups/create', [GroupPermissionController::class, 'groupsAvailable'])
                ->name('permissions.groups.available');
            Route::get('permissions/{id}/groups', [GroupPermissionController::class, 'groups'])
                ->name('permissions.groups');

            /**
             * Permissions x Roles
             */
            Route::get(
                'permissions/{idPermission}/roles/{idRole}/detach',
                [PermissionRoleController::class, 'PermissionRoleDetach']
            )->name('permissions.roles.detach');
            Route::get('permissions/{id}/roles/create', [PermissionRoleController::class, 'rolesAvailable'])
                ->name('permissions.roles.available');
            Route::post('permissions/{id}/roles', [PermissionRoleController::class, 'attachRolesPermission'])
                ->name('permissions.roles.attach');
            Route::get('permissions/{id}/roles', [PermissionRoleController::class, 'roles'])
                ->name('permissions.roles');

            /**
             * Roles x Permissions
             */
            Route::get(
                'roles/{idRole}/permissions/{idPermission}/detach',
                [PermissionRoleController::class, 'rolePermissionDetach']
            )->name('roles.permissions.detach');
            Route::any(
                'roles/{id}/permissions/create',
                [PermissionRoleController::class, 'permissionsAvailable']
            )->name('roles.permissions.available');
            Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])
                ->name('roles.permissions.attach');
            Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])
                ->name('roles.permissions');

            /**
             * Users x Roles
             */
            Route::get('roles/{id}/users/{idUser}/detach', [RoleUserController::class, 'detachRoleUser'])
                ->name('roles.users.detach');
            Route::any('roles/{id}/users/create', [RoleUserController::class, 'roleUserAvailable'])
                ->name('roles.users.available');
            Route::post('roles/{id}/users', [RoleUserController::class, 'attachRoleUser'])
                ->name('roles.users.attach');
            Route::get('roles/{id}/users', [RoleUserController::class, 'users'])
                ->name('roles.users');

            /**
             * Roles
             */
            Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
            Route::resource('roles', RoleController::class);

            /**
             * Routes Permissions
             */
            Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
            Route::resource('permissions', PermissionController::class);

            /**
             * Routes Groups
             */
            Route::any('groups/search', [GroupController::class, 'search'])->name('groups.search');
            Route::resource('groups', GroupController::class);

            /**
             * Routes Details Plans
             */
            Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])
                ->name('details.plan.create');
            Route::delete('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'destroy'])
                ->name('details.plan.destroy');
            Route::get('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'show'])
                ->name('details.plan.show');
            Route::put('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'update'])
                ->name('details.plan.update');
            Route::get('plans/{url}/details/{idPlan}/edit', [DetailPlanController::class, 'edit'])
                ->name('details.plan.edit');
            Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
            Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

            /**
             * Routes Plans
             */
            Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
            Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
            Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
            Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
            Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
            Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
            Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
            Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        }
    );

Route::prefix('user')
    ->middleware(['auth:sanctum', 'verified', 'subscribed'])
    ->group(
        function () {
            Route::get('subscriptions/resume', [SubscriptionController::class, 'resume'])
                ->name('subscriptions.resume');
            Route::get('subscriptions/cancel', [SubscriptionController::class, 'cancel'])
                ->name('subscriptions.cancel');
            Route::get('subscriptions/invoices', [SubscriptionController::class, 'invoices'])
                ->name('subscriptions.invoices');
            Route::get(
                'subscriptions/invoices/download/{idInvoice}',
                [SubscriptionController::class, 'downloadInvoice']
            )->name('subscriptions.invoice.download');
        }
    );

Route::middleware(['verified', 'check.choice.plan'])
    ->group(
        function () {
            Route::get('subscriptions/checkout', [SubscriptionController::class, 'checkout'])
                ->name('subscriptions.checkout');
            Route::post('subscriptions/store', [SubscriptionController::class, 'store'])
                ->name('subscriptions.store');
        }
    );

/**
 * Home
 */
Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');

Route::middleware(['auth:sanctum', 'verified'])
    ->get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');
