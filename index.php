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

// Define a default route
// https://tostrander.greenriverdev.com/328/hello-fat-free/
$f3->route('GET /', function() {

    // Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home', function() {

    // Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personalInfo', function($f3) {
//    echo '<h1>Personal Info</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $pNumber = $_POST['pNumber'];

        // If the data valid
        if (isset($fName) && isset($lName) && isset($email) && isset($pNumber)) {

            // Add the data to the session array
            $f3->set('SESSION.fName', $fName);
            $f3->set('SESSION.lName', $lName);
            $f3->set('SESSION.email', $email);
            $f3->set('SESSION.state', $state);
            $f3->set('SESSION.pNumber', $pNumber);

            // Send the user to the next form
            $f3->reroute('experience');
        }
        else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";
        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

$f3->route('GET|POST /experience', function($f3) {
//    echo '<h1>Personal Info</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $userBio = $_POST['userBio'];
        $userGithub = $_POST['userGithub'];
        $yrsExp = $_POST['yearsExperience'];
        $relocate = $_POST['willingRelocate'];

        // If the data valid
        if (isset($userBio) && isset($userGithub) && isset($yrsExp) && isset($relocate)) {

            // Add the data to the session array
            $f3->set('SESSION.userBio', $userBio);
            $f3->set('SESSION.userGithub', $userGithub);
            $f3->set('SESSION.exp', $yrsExp);
            $f3->set('SESSION.relocate', $relocate);

            // Send the user to the next form
            $f3->reroute('mailingLists');
        }
        else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";

        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/experience.html');
});

$f3->route('GET|POST /mailingLists', function($f3) {
//    echo '<h1>Personal Info</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
        $SDEVSkills = $_POST['softwareSkills'];
        $verticals = $_POST['industryVerticals'];

        // If the data valid
        if (true) {

            // Add the data to the session array
            $f3->set('SESSION.SDEVSkills', $SDEVSkills);
            $f3->set('SESSION.verticals', $verticals);

            // Send the user to the next form
            $f3->reroute('summary');
        }
        else {
            // Temporary
            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";

        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/mailingLists.html');
});

$f3->route('GET|POST /summary', function($f3) {
//    echo '<h1>Personal Info</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);

        // Get the data from the post array
//        $userBio = $_POST['userBio'];
//        $userGithub = $_POST['userGithub'];

//        // If the data valid
//        if (isset($userBio) && isset($userGithub)) {
//
//            // Add the data to the session array
//            $f3->set('SESSION.userBio', $userBio);
//            $f3->set('SESSION.userGithub', $userGithub);
//
//            // Send the user to the next form
//            $f3->reroute('summary');
//        }
//        else {
//            // Temporary
//            echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";
//
//        }
    }

    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();