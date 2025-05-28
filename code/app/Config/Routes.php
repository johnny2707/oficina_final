<?php

use App\Filters\AuthGuard;
use App\Filters\AuthValidation;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'authGuard']);


//FATURA

// $routes->group('fatura', ['filter' => 'authGuard|permissionsValidation:FATURAS, ALL'], function($routes){
//     $routes->get('faturaDireta',  'Fatura::faturaDireta');
//     $routes->get('fatura',        'Fatura::fatura');
// });

//STOCK

$routes->group('stock', ['filter' => 'authGuard|permissionsValidation:STOCK, ALL'], function($routes){
    $routes->get('index',                 'Products::index');
    $routes->get('getAllProducts',        'Products::getAllProducts');
    $routes->post('getProduct',           'Products::getProduct');
    $routes->get('populateProductsTable', 'Products::populateProductsTable');
    $routes->get('criarProduto',          'Products::createProductPage');
    $routes->post('criarProduto',         'Products::createProduct');
});

// AUTHENTICATION

$routes->group('auth', ['filter' => 'authValidation'], function($routes){
    $routes->get('/',                                  'Auth::ShowLoginPage');
    $routes->post('/',                                 'Auth::Login');
});

$routes->get('/auth/recoverPassword',                  'Auth::ShowPasswordRecoveryPage');
$routes->post('/auth/sendPasswordEmail',               'Auth::SendPasswordRecoveryEmail');
$routes->get('/auth/emailSentConfirmation/(:segment)', 'Auth::ShowEmailSentConfirmationPage/$1');
$routes->post('/auth/validateCode',                    'Auth::ValidateCode');
$routes->get('/auth/newPassword/(:segment)',           'Auth::ShowNewPasswordPage/$1');
$routes->post('/auth/updatePassword',                  'Auth::UpdatePassword');
$routes->get('/auth/logout',                           'Auth::logout', ['filter' => 'authGuard']);

// PRODUCTS 

$routes->group('products', ['filter' => 'authGuard|permissionsValidation: PRODUCTS, ALL'], function($routes){
    $routes->post('getProductByCode', 'Products::getProductByCode');
    $routes->get('getAllProducts',    'Products::getAllProducts');
    $routes->get('getAllUnits',       'Products::getAllUnits');
});

//CLIENTS

$routes->group('clients', ['filter' => 'authGuard|permissionsValidation:CLIENTS, ALL'], function($routes){
    $routes->get('create',                'Clients::createClientPage');
    $routes->post('createClient',         'Clients::createClient');
    $routes->get('list',                  'Clients::list');
    $routes->get('populateClientsTable',  'Clients::populateClientsTable');
    $routes->get('getAllClients',         'Clients::getAllClients');
    $routes->post('getClientInfoByCode',  'Clients::getClientInfoByCode');
    $routes->post('getVehiclesByCode',    'Clients::getClientVehicles');
    $routes->post('deleteClient',         'Clients::deleteClient');
    $routes->post('updateClient',         'Clients::updateClient');
});

//VEHICLES

$routes->group('vehicles', ['filter' => 'authGuard|permissionsValidation: VEHICLE, ALL'], function($routes){
    $routes->get('myVehicle',                               'Vehicles::index');
    $routes->get('historic',                                'Vehicles::historicPage');
    $routes->get('getUserVehicles',                         'Vehicles::getUserVehicles');
    $routes->post('getVehicleByLicensePlate',               'Vehicles::getVehicleByLicensePlate');
    $routes->get('getAllVehicles',                          'Vehicles::getAllVehicles');
    $routes->post('getVehicleById',                         'Vehicles::getVehicleById');
});

//MECHANICS

$routes->group('mechanics', ['filter' => 'authGuard|permissionsValidation: MECHANICS, ALL'], function($routes){
    $routes->get('index',                                   'Mechanics::index');
    $routes->get('create',                                  'Mechanics::createMechanicPage');
    $routes->post('createMechanic',                         'Mechanics::createMechanic');
    $routes->get('list',                                    'Mechanics::list');
    $routes->get('populateMechanicsTable',                  'Mechanics::populateMechanicsTable');
    $routes->get('getAllMechanics',                         'Mechanics::getAllMechanics');
    $routes->post('getMechanicByNumber',                    'Mechanics::getMechanicByNumber');
});

//EVENTS

$routes->group('calendar', ['filter' => 'authGuard|permissionsValidation: EVENTS, ALL'], function($routes){
    $routes->get('index',               'Events::index');
    $routes->post('events',             'Events::listOfEvents');
    $routes->get('create',              'Events::createEventLoadPage');
    $routes->post('create',             'Events::createEvent');
    $routes->get('(:num)',              'Events::intervention/$1');
    $routes->post('changeProgress',     'Events::changeProgress');
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

$routes->get('clock', 'Clock::index');

// SERVICES
$routes->group('services', ['filter' => 'authGuard|permissionsValidation: SERVICES, ALL'], function($routes){
    $routes->get('index',                   'Services::index');
    $routes->get('getAllServices',          'Services::getAllServices');
    $routes->get('create',                  'Services::createServicePage');
    $routes->post('createService',          'Services::createService');
    $routes->post('start-work',             'Services::startWork');
    $routes->post('end-work',               'Services::endWork');
    $routes->get('populateServicesTable',   'Services::populateServicesTable');
});


// PERSONALIZATION

$routes->group('personalization', ['filter' => 'authGuard|permissionsValidation: PERSONALIZATION, ALL'], function($routes){
    $routes->get('index',                   'Personalization::index');
    $routes->post('createPersonalization',  'Personalization::createPersonalization');
    $routes->post('deletePersonalization',  'Personalization::deletePersonalization');
    $routes->post('updatePersonalization',  'Personalization::updatePersonalization');
});