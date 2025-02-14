<?php

use App\Filters\AuthGuard;
use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);

$routes->get('fatura/criar', 'Fatura::criar');

// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/',                                  'Auth::ShowLoginPage');
    $routes->post('/',                                 'Auth::Login');
});

$routes->get('/auth/recoverPassword',                  'Auth::ShowPasswordRecoveryPage');
$routes->post('/auth/sendPasswordEmail',               'Auth::SendPasswordRecoveryEmail');
$routes->get('/auth/emailSentConfirmation/(:segment)', 'Auth::ShowEmailSentConfirmationPage/$1');
$routes->get('/auth/newPassword/(:segment)',           'Auth::ShowNewPasswordPage/$1');
$routes->post('/auth/updatePassword',                  'Auth::UpdatePassword');
$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);

// PRODUCTS 

$routes->group('products', ['filter' => 'authGuard|permissionsValidation: PRODUCTS, ALL'], function($routes){
    $routes->post('getProductByCode', 'Products::getProductByCode');
    $routes->get('getAllProducts',    'Products::getAllProducts');
});

//CLIENTS

$routes->group('clients', ['filter' => 'authGuard|permissionsValidation:CLIENTS, ALL'], function($routes){
    $routes->get('create',                'Clients::createClientPage');
    $routes->post('createClient',         'Clients::createClient');
    $routes->get('getAllClients',         'Clients::getAllClients');
    $routes->post('getClientInfoByCode',  'Clients::getClientInfoByCode');
    $routes->post('getVehiclesByCode',    'Clients::getClientVehicles');
});

//VEHICLES

$routes->group('vehicles', ['filter' => 'authGuard|permissionsValidation: VEHICLES, ALL'], function($routes){
    $routes->get('myVehicle',                               'Vehicles::index');
    $routes->get('historic',                                'Vehicles::historicPage');
    $routes->get('getUserVehicles',                         'Vehicles::getUserVehicles');
    $routes->post('getVehicleByLicensePlate',               'Vehicles::getVehicleByLicensePlate');
});

//EVENTS

$routes->group('calendar', ['filter' => 'authGuard|permissionsValidation: EVENTS, ALL'], function($routes){
    $routes->get('index',               'Events::index');
    $routes->post('events',             'Events::listOfEvents');
    $routes->get('create',              'Events::createEventLoadPage');
});

//USERS

$routes->group('users', ['filter' => 'authGuard|permissionsValidation: USERS, ALL'], function($routes){
    $routes->post('changeEmail',                'Users::changeEmail');
    $routes->post('changeUsername',             'Users::changeUsername');
});

$routes->get('users/createAccount/(:segment)',  'Users::createAccountPage/$1');
$routes->post('users/createAccount',            'Users::createAccount');

//ACCOUNT

$routes->group("users", ['filter' => 'authGuard|permissionsValidation: ACCOUNT, ALL'], function($routes){
    $routes->get('/',                           'Users::index');
    $routes->get('/users/my-password',          'Users::myPassword');
    $routes->post('/users/my-password',         'Users::updateMyPassword');
});

$routes->get('table',               'Users::populateUsersTable');
$routes->get('(:hash)/update',      'Users::update/$1');
$routes->post('(:hash)/update',     'Users::updateUser/$1');
$routes->post('(:hash)/activate',   'Users::activateUser/$1');
$routes->post('(:hash)/inactivate', 'Users::inactivateUser/$1');

$routes->get('clock', 'Clock::index');

// SERVICES
$routes->group('services', ['filter' => 'authGuard|permissionsValidation: SERVICES, ALL'], function($routes){
    $routes->get('index', 'Services::index');
});