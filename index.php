<?php

//turning on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Create instance of base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /',function()
{
//    echo '<h1>Hello World!</h1>';

//    Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run fat-free
$f3->Run();
