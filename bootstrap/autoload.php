<?php

ini_set('xdebug.max_nesting_level', 120);

/**for php versions 5.3 and below, for file uploads, apache default is 2MB
we can set this in php.ini if we are in control of the server, otherwise
we adjust the necessary values here
 for php versions >=5.3, we have to create a 'user.ini'
 containing upload_max_filesize=4M
 *post_max_size=6M
 file located
 in the same folder as index.php*/
//ini_set('upload_max_filesize', 4);
//ini_set('post_max_size', 6);

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Include The Compiled Class File
|--------------------------------------------------------------------------
|
| To dramatically increase your application's performance, you may use a
| compiled class file which contains all of the classes commonly used
| by a request. The Artisan "optimize" is used to create this file.
|
*/

$compiledPath = __DIR__.'/cache/compiled.php';

if (file_exists($compiledPath)) {
    require $compiledPath;
}
