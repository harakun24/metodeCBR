<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->addRedirect('/admin/(:any)', '/');
$routes->get('/kucing', 'Admin::kucing', ['as' => 'kucing_list']);
$routes->post('/kucing/tambah', 'Admin::kucing_add', ['as' => 'kucing_save']);
$routes->add('/kucing/hapus/(:num)', 'Admin::kucing_hapus/$1', ['as' => 'kucing_del']);
$routes->add('/kucing/edit/(:num)', 'Admin::kucing_edit/$1', ['as' => 'kucing_edit']);
$routes->add('/kucing/get/(:num)', 'Admin::kucing_get/$1', ['as' => 'kucing_get']);

$routes->get('/ciri', 'Admin::ciri', ['as' => 'ciri_list']);
$routes->post('/ciri/tambah', 'Admin::ciri_add', ['as' => 'ciri_save']);
$routes->add('/ciri/hapus/(:num)', 'Admin::ciri_hapus/$1', ['as' => 'ciri_del']);
$routes->add('/ciri/edit/(:num)', 'Admin::ciri_edit/$1', ['as' => 'ciri_edit']);
$routes->add('/ciri/get/(:num)', 'Admin::ciri_get/$1', ['as' => 'ciri_get']);

$routes->get('/hub', 'Admin::hub', ['as' => 'hub_list']);
$routes->get('/hub/cat/(:num)', 'Admin::hub_cat/$1');
$routes->post('/hub/tambah', 'Admin::hub_add', ['as' => 'hub_save']);
$routes->add('/hub/hapus/(:num)', 'Admin::hub_hapus/$1', ['as' => 'hub_del']);
$routes->add('/hub/edit/(:num)', 'Admin::hub_edit/$1', ['as' => 'hub_edit']);
$routes->add('/hub/get/(:num)', 'Admin::hub_get/$1', ['as' => 'hub_get']);

$routes->get('/cbr/(:num)', 'Admin::cbr/$1', ['as' => 'cbr']);
$routes->get('/pengujian', 'Admin::input_cbr', ['as' => 'cbr_form']);
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}