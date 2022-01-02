<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('Pages');
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

// Login Routes
$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');

// Beranda Routes
$routes->get('/beranda', 'Pages::index', ['filter' => 'auth']);

//Akun Routes
$routes->get('/akun', 'Akun::index', ['filter' => 'auth']);
$routes->get('/akun/tambah', 'Akun::tambah', ['filter' => 'auth']);

//Kecelakaan Kerja Routes
$routes->get('/kecelakaan', 'Kecelakaan::index', ['filter' => 'auth']);
$routes->get('/kecelakaan/tambah', 'Kecelakaan::tambah', ['filter' => 'auth']);
$routes->get('/kecelakaan/ubah/(:segment)', 'Kecelakaan::ubah/$1', ['filter' => 'auth']);
$routes->delete('/kecelakaan/(:num)', 'Kecelakaan::hapus/$1', ['filter' => 'auth']);
$routes->get('/kecelakaan/(:any)', 'Kecelakaan::detail/$1', ['filter' => 'auth']);


//Progres Proyek
$routes->get('/progres', 'Progres::index', ['filter' => 'auth']);
$routes->get('/progres/tambah', 'Progres::tambah', ['filter' => 'auth']);
$routes->get('/progres/ubah/(:segment)', 'Progres::ubah/$1', ['filter' => 'auth']);
$routes->delete('/progres/(:num)', 'Progres::hapus/$1', ['filter' => 'auth']);
$routes->get('/progres/grafik/(:segment)', 'Progres::grafik/$1', ['filter' => 'auth']);


//Data Umum Proyek
$routes->get('/datum', 'Datum::index', ['filter' => 'auth']);
$routes->get('/datum/tambah', 'Datum::tambah', ['filter' => 'auth']);
$routes->get('/datum/ubah/(:segment)', 'Datum::ubah/$1', ['filter' => 'auth']);
$routes->delete('/datum/(:num)', 'Datum::hapus/$1', ['filter' => 'auth']);
$routes->get('/datum/(:any)', 'Datum::detail/$1', ['filter' => 'auth']);

// $routes->get('/ubah', 'Ubah::udatum');

//Timeline Proyek
$routes->get('/timeline', 'Timeline::index', ['filter' => 'auth']);
$routes->get('/timeline/tambah', 'Timeline::tambah', ['filter' => 'auth']);
$routes->delete('/timeline/hapus/(:num)', 'Timeline::hapus/$1', ['filter' => 'auth']);
$routes->get('/timeline/hapus/(:any)', 'Timeline::lempar/$1', ['filter' => 'auth']);
$routes->get('/timeline/ubah/(:segment)', 'Timeline::ubah/$1', ['filter' => 'auth']);
$routes->get('/timeline/kategori', 'Timeline::kategori', ['filter' => 'auth']);
$routes->delete('/timeline/hapus-kategori/(:segment)', 'Timeline::khapus/$1', ['filter' => 'auth']);
$routes->get('/timeline/hapus-kategori/(:any)', 'Timeline::lempar/$1', ['filter' => 'auth']);
$routes->get('/timeline/kategori/ubah/(:segment)', 'Timeline::kubah/$1', ['filter' => 'auth']);
$routes->get('/timeline/grafik', 'Timeline::grafik', ['filter' => 'auth']);
$routes->get('/timeline/grafik/(:segment)', 'Timeline::grafik2/$1', ['filter' => 'auth']);

// Laporan
$routes->get('/laporan-tahunan', 'Laporan::index', ['filter' => 'auth']);
$routes->get('/laporan-proyek', 'Laporan::index2', ['filter' => 'auth']);

// Coba Routes
$routes->get('/cobatimeline', 'Coba::index');
$routes->get('/cobatimeline/cobagrafik', 'Coba::grafik');
$routes->get('/cobatimeline/cobagrafik2', 'Coba::grafik2');
$routes->get('/cobahitung', 'Coba::hitung');


//Keuangan
// $routes->get('/keuangan', 'Admin::keuangan');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
