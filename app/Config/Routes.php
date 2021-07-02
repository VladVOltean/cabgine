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
$routes->setDefaultController('Users');
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
$routes->get('/', 'Users::index', ['filter' => 'noauth']);
$routes->get('users', 'Users::users_data', ['filter' => 'auth','filter'=>'admin']);
$routes->match(['get', 'post'], 'profile/(:any)', 'Users::register_edit/$1',['filter' => 'auth']);
$routes->get('delete/(:any)', 'Users::delete/$1', ['filter' => 'auth','filter'=>'admin']);
$routes->get('logout', 'Users::logout');
$routes->get('patients_list', 'PatientsList::index',['filter' => 'auth']);
$routes->match(['get', 'post'],'patient/(:any)', 'PatientsList::add_edit/$1',['filter' => 'auth']);
$routes->match(['get', 'post'],'city','PatientsList::city',['filter' => 'auth']);
$routes->match(['get', 'post'], 'medicalrecord/(:num)', 'MedicalRecord::index/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'],'medicalrecord/history', 'MedicalRecord::history', ['filter' => 'auth']);
$routes->match(['get', 'post'],'medicalletter/(:any)/(:any)', 'Medicalletter::index/$1/$2', ['filter' => 'auth']);
$routes->get('download_ML/(:any)/(:any)', 'Medicalletter::htmlToPDF/$1/$2', ['filter' => 'auth']);
$routes->get('history/(:any)', 'History::index/$1', ['filter' => 'auth']);
$routes->post('getpicture', 'History::getpicture', ['filter' => 'auth']);
$routes->post('savepicture', 'History::savepicture', ['filter' => 'auth']);
$routes->post('deletepicture', 'History::deletepicture', ['filter' => 'auth']);
$routes->get('examinations', 'EditData::exam_data', ['filter' => 'auth','filter'=>'admin']);
$routes->get('analyses', 'EditData::analyses_data', ['filter' => 'auth','filter'=>'admin']);
$routes->match(['get', 'post'],'edit_exam/(:any)', 'EditData::edit_exam/$1', ['filter' => 'auth','filter'=>'admin']);
$routes->match(['get', 'post'],'edit_analysis/(:any)', 'EditData::edit_analysis/$1', ['filter' => 'auth','filter'=>'admin']);
$routes->get('delete_data/(:any)/(:any)', 'EditData::delete/$1/$2', ['filter' => 'auth','filter'=>'admin']);
$routes->match(['get', 'post'],'clinic_data', 'EditData::clinic_data', ['filter' => 'auth','filter'=>'admin']);


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
