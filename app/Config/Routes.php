<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Route Group Auth
$routes->get('/', 'AuthController::index');
$routes->get('/logout', 'AuthController::logout');
// End Group Auth

// Route Group Admin
$routes->get('/dashboard', 'AdminController::index');
$routes->get('/sertifikasi', 'AdminController::sertifikasi');

$routes->post('/credentials', 'AuthController::credentials');
// End Group Admin

// Route Group Sertifikasi
$routes->get('sertifikasi/edit/(:segment)', 'SertifikasiController::edit/$1');
$routes->get('sertifikasi/delete/(:segment)', 'SertifikasiController::delete/$1');
$routes->get('sertifikasi/detail/(:segment)', 'SertifikasiController::detail/$1');

$routes->get('/sertifikasi/tambah', 'SertifikasiController::index');
$routes->post('/sertifikat/import', 'SertifikasiController::import');
$routes->post('/sertifikat/insert', 'SertifikasiController::tambah');

$routes->put('/sertifikasi/update/(:segment)', 'SertifikasiController::update/$1');
// End Group Sertifikasi

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
