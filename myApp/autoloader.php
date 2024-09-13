<?php 
require_once __DIR__ . '/autoloader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    $baseDirs = [
        __DIR__ . '/controllers/',
        __DIR__ . '/models/',
        __DIR__ . '/router/',
    ];

    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $classPath;
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    echo "Class $class not found.<br>"; // Debugging line
});




?>