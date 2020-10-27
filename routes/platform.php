<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

use App\Orchid\Screens\ProductsEditScreen;
use App\Orchid\Screens\ProductsListScreen;
use App\Orchid\Screens\AttributeEditScreen;
use App\Orchid\Screens\AttributeListScreen;
use App\Orchid\Screens\AttributeValueEditScreen;
use App\Orchid\Screens\AttributeValueListScreen;
use App\Orchid\Screens\CategoryEditScreen;
use App\Orchid\Screens\CategoryListScreen;
use App\Orchid\Screens\CustomerEditScreen;
use App\Orchid\Screens\CustomerListScreen;
use App\Orchid\Screens\SettingsEditScreen;
use App\Orchid\Screens\StatsListScreen;
use App\Http\Controllers\QrController;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{users}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Edit'), route('platform.systems.users.edit', $user));
    });


// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Example screen'));
    });

//PRODUCTS
Route::screen('product/{products?}', ProductsEditScreen::class)
    ->name('platform.products.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Ürünler Listesi'),route('platform.products.list'))
            ->push(__('Ürün Düzenle'));
    });;
    
Route::screen('products', ProductsListScreen::class)
    ->name('platform.products.list');


//CATEGORY
    Route::screen('categor/{post?}', CategoryEditScreen::class)
    ->name('platform.category.edit');

Route::screen('category', CategoryListScreen::class)
    ->name('platform.category.list');



//ATTRIBUTE
Route::screen('attribute/{post?}', AttributeEditScreen::class)
->name('platform.attribute.edit');

Route::screen('attributes', AttributeListScreen::class)
->name('platform.attribute.list');


//ATTRIBUTEVALUE
Route::screen('attributevalue/{post?}', AttributeValueEditScreen::class)
->name('platform.attributevalue.edit');

Route::screen('attributevalues', AttributeValueListScreen::class)
->name('platform.attributevalue.list');



//CUSTOMER

Route::screen('customer/{customer?}', CustomerEditScreen::class)
    ->name('platform.customer.edit');

Route::screen('customers', CustomerListScreen::class)
    ->name('platform.customer.list');



// SETTINGS
Route::screen('settings', SettingsEditScreen::class)
    ->name('platform.settings.edit');



Route::screen('stats', StatsListScreen::class)
    ->name('platform.stats.list');


Route::get('qrdownload/{sku}', [QrController::class, 'download'])
    ->name('platform.qr.eps');

Route::get('qrmake/{sku}', [QrController::class, 'make'])
    ->name('platform.qr.download');


//Route::screen('idea', 'Idea::class','platform.screens.idea');
