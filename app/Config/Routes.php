<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// $routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('admin/add/movie', 'MovieController::addMovieView',['filter' => 'auth']);
    $routes->get('admin/delete/(:num)', 'MovieController::deleteMovie/$1',['filter' => 'auth']);
    $routes->get('admin/update/(:num)', 'MovieController::updateMovieView/$1',['filter' => 'auth']);
    $routes->get('admin/cards', 'MovieController::adminView',['filter' =>'auth']);
    $routes->post('admin/movie/add', 'MovieController::addNewMovieAdmin',['filter' =>'auth']);
    $routes->post('admin/update/(:num)', 'MovieController::updateCurrentMovieAdmin/$1',['filter' => 'auth']);
    $routes->get('admin/track/allusers', 'AdminUserController::userTrackingView',['filter' => 'auth']);
// });

// $routes->group('', ['filter' => 'UserAuth'], function ($routes) {
    $routes->get('/book/show/(:num)', 'MovieController::getBookMyShowView/$1',['filter' => 'UserAuth']);
    $routes->post('/bookshow', 'MovieController::bookUserShow',['filter' =>'UserAuth']);
    $routes->get('/view/ticket/(:num)', 'UserBookingController::userTicketView/$1',['filter' =>'UserAuth']);
    $routes->get('/generate-ticket/(:num)', 'UserBookingController::generateTicketPDF/$1',['filter' => 'UserAuth']);
    $routes->get('/my/bookings', 'UserBookingController::getAllUserBookingView',['filter' => 'UserAuth']);
// });

// Admin Login and Register Routes
$routes->get('/admin/signin', 'AdminUserController::signInView');
$routes->get('/admin/register', 'AdminUserController::registerView');

$routes->post('/admin/create/account', 'AdminUserController::createNewAdminAccount');
$routes->post('/admin/getadmin/account', 'AdminUserController::getAdminLoginUser');



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

// logout function for both admin and user
$routes->post('/logout', 'Home::logoutUser');
