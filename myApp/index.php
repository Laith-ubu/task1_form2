<?php 

use MYAPP\Controllers\ProductController;
use MYAPP\Controllers\dbConnection;
use MYAPP\Models\dbQueries;


require_once './controllers/dbConnection.php';
require_once './models/dbQueries.php';
require_once 'router/Router.php';
require_once __DIR__ . '/autoloader.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$routes = [
    'GET' => [
        '/' => [
            'controller' => ProductController::class,
            'action' => 'home'
        ],
        '/products/' => [
            'controller' => ProductController::class,
            'action' => 'index'
        ],
        '/profile/' => [
            'controller' => ProductController::class,
            'action' => 'profile'
        ],
        '/addProduct/' => [
            'controller' => ProductController::class,
            'action' => 'addProduct'
        ],
        '/contactUs/' => [
            'controller' => ProductController::class,
            'action' => 'contact'
        ],
        '/addNewForm/' => [
            'controller' => ProductController::class,
            'action' => 'form'
        ],
        '/products/editData' => [
            'controller' => ProductController::class,
            'action' => 'edit'
        ],
        '/updateProduct' => [
            'controller' => ProductController::class,
            'action' => 'update'
        ],
        '/products/delete' => [
            'controller' => ProductController::class,
            'action' => 'delete'
        ],
    ],
    'POST' => [
        '/myApp/add' => [
            'controller' => ProductController::class,
            'action' => 'add'
        ],
        '/edit' => [
            'controller' => ProductController::class,
            'action' => 'edit'
        ],
        '/task1_form2/addNew/' => [
            'controller' => ProductController::class,
            'action' => 'add'
        ]
    ],
    'PUT' => [
        '/updateProduct/' => [
            'controller' => ProductController::class,
            'action' => 'update'
        ],
    ],
];

$router = new Router();
$router->setRoutes($routes);

$router->dispatch();


?>