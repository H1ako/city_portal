<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/admin-settings.php';
require_once __DIR__ . '/core/router.php';


use app\models\Session;

global $SITE_URL;

$session = Session::get();

Router::get('/', 'views/index.php');
Router::get('/my-requests', 'views/my-requests.php');


if (Session::user() && Session::user()->is_admin) {
  Router::get('/admin', 'views/my-requests-control.php');
}

Router::not_found();
