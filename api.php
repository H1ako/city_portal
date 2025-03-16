<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/admin-settings.php';
require_once __DIR__ . '/core/router.php';

use app\models\Session;

use app\controllers\ServiceHistoryController;
use app\controllers\UserController;

use app\controllers\admin\AdminUserController;
use app\controllers\admin\AdminRequestCategoriesController;
use app\controllers\admin\AdminRequestsController;
use app\controllers\RequestsController;

global $SITE_URL;

$session = Session::get();


Router::set_route_prefix('api');

Router::post('/auth/signin', [UserController::class, 'sign_in']);
Router::post('/auth/signup', [UserController::class, 'sign_up']);
Router::get('/auth/logout', [UserController::class, 'logout']);

if (!Session::check()) {
    return Router::not_found();
}
Router::put('/user/settings/edit', [UserController::class, 'edit_settings']);

Router::post('/requests/create', [RequestsController::class, 'create']);

if (!Session::user()->is_admin) {
    return Router::not_found();
}
Router::set_route_prefix('api/admin');


Router::post('/requests/create', [AdminRequestsController::class, 'create']);
Router::put('/requests/%s/edit', [AdminRequestsController::class, 'edit']);
Router::delete('/requests/%s/delete', [AdminRequestsController::class, 'delete']);

Router::post('/request-categories/create', [AdminRequestCategoriesController::class, 'create']);
Router::put('/request-categories/%s/edit', [AdminRequestCategoriesController::class, 'edit']);
Router::delete('/request-categories/%s/delete', [AdminRequestCategoriesController::class, 'delete']);

Router::post('/users/create', [AdminUserController::class, 'create']);
Router::put('/users/%s/edit', [AdminUserController::class, 'edit']);
Router::delete('/users/%s/delete', [AdminUserController::class, 'delete']);


Router::not_found();
