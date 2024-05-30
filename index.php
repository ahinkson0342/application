<?php
session_start();

// 328/diner/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();
$con = new Controller($f3);

// Define a default route
// https://andrewhinkson.greenriverdev.com/328/application/
$f3->route('GET /', function()
{
    $GLOBALS['con']->home();
});

$f3->route('GET /home', function() use ($con)
{
    $con->home();
});

$f3->route('GET|POST /personalInfo', function($f3)
{
    $GLOBALS['con']->personalInfo();
});

$f3->route('GET|POST /experience', function($f3)
{
    $GLOBALS['con']->experience();
});

$f3->route('GET|POST /mailingLists', function($f3)
{
    $GLOBALS['con']->mailingLists();
});

$f3->route('GET|POST /summary', function($f3)
{
//    echo '<h1>Personal Info</h1>';


    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');
    session_destroy();
});

// Run Fat-Free
$f3->run();