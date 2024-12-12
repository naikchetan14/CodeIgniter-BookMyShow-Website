<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Admin Login and Register Routes
$routes->get('admin/signin', 'AdminUserController::signInView');
$routes->get('admin/register', 'AdminUserController::registerView');

$routes->post('admin/create/account', 'AdminUserController::createNewAdminAccount');
$routes->post('admin/getadmin/account', 'AdminUserController::getAdminLoginUser');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('add/movie', 'MovieController::addMovieView');
    $routes->get('delete/(:num)', 'MovieController::deleteMovie/$1');
    $routes->get('update/(:num)', 'MovieController::updateMovieView/$1');
    $routes->get('cards', 'MovieController::adminView');

    $routes->post('movie/add', 'MovieController::addNewMovieAdmin');
    $routes->post('update/(:num)', 'MovieController::updateCurrentMovieAdmin/$1');

});

$routes->group('', ['filter' => 'UserAuth'], function ($routes) {
    $routes->get('/book/show/(:num)', 'MovieController::getBookMyShowView/$1');
    $routes->post('/bookshow', 'MovieController::bookUserShow');
    $routes->get('/view/ticket/(:num)','UserBookingController::userTicketView/$1');
    $routes->get('/generate-ticket/(:num)','UserBookingController::generateTicketPDF/$1');
    $routes->get('/my/bookings','UserBookingController::getAllUserBookingView');

});


//User Login and Register Routes
$routes->get('signin', 'UserController::UserLoginView');
$routes->get('register', 'UserController::UserRegisterView');
$routes->post('create/account', 'UserController::createNewAccount');
$routes->post('signin/account', 'UserController::getLoginUser');

//Public Routes
$routes->get('/', 'Home::index');
$routes->get('/movies/(:num)', 'MovieController::getMoviesDetails/$1');

// $routes->post('/book/show/(:num)', 'MovieController::bookUserShow/$1');

$routes->get('/getimg/(:segment)', 'Home::getimg/$1');
$routes->post('/logout', 'Home::logoutUser');
