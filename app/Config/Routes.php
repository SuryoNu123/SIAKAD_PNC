<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->get('/lupa_sandi', 'Auth::lupa_sandi');
$routes->post('/loginPost', 'Auth::loginPost');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/profile', 'Profile::default');                
$routes->get('/profile/(:segment)', 'Profile::index/$1');    
$routes->get('/profile/edit/(:segment)', 'Profile::edit/$1'); 
$routes->post('/profile/update/(:segment)', 'Profile::update/$1'); 

$routes->get('krs', 'KRS::index');
$routes->post('krs/save', 'KRS::save');
$routes->get('krs/success', 'KRS::success');

$routes->get('/jadwal', 'Jadwal::index');
$routes->get('jadwal/week', 'Jadwal::week');

$routes->get('presensi', 'Presensi::index');
$routes->post('presensi/absen', 'Presensi::absen');

$routes->get('transcript/(:num)', 'Transcript::index/$1');
$routes->get('transcript/download/khs', 'Transcript::downloadKHS');
$routes->get('transcript/download/full', 'Transcript::downloadFull');
$routes->get('transcript/download/grade', 'Transcript::downloadGrade');

$routes->get('/keuangan/detail/(:num)', 'Keuangan::detail/$1');
$routes->post('/keuangan/upload-bukti', 'Keuangan::uploadBukti');
$routes->get('/keuangan', 'Keuangan::index');

$routes->get('/surat', 'Surat::index');

$routes->get('/tugasakhir', 'Tugasakhir::index');

$routes->get('/mbkm', 'Mbkm::index');
$routes->get('/mbkm/program/(:num)', 'Mbkm::program/$1');
$routes->post('mbkm/uploadReport', 'Mbkm::uploadReport');
$routes->get('/mbkm/register', 'Mbkm::register');   
$routes->post('/mbkm/register', 'Mbkm::saveProgram'); 