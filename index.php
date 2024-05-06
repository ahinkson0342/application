<?php
session_start();

// 328/diner/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

//require validation
require_once ('model/validate.php');

//require data layer
require_once ('model/data-layer.php');

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

$f3->route('GET|POST /personalInfo', function($f3)
{
    //    echo '<h1>Personal Info</h1>';

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {

        //echo "<p>You got here using the POST method</p>";
        //var_dump ($_POST);


        // Get the data from the post array
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $pNumber = $_POST['pNumber'];


        // check if data has been entered
        if (isset($fName) && isset($lName) && isset($email) && isset($pNumber))
        {

            //validation
            if (validName($fName))
            {
                $f3->set('SESSION.fName', $fName);
            } else
            {
                $f3->set('errors["fName"]', "Please do not enter any numbers within the first name field");
            }

            if (validName($lName))
            {
                $f3->set('SESSION.lName', $lName);
            } else
            {
                $f3->set('errors["lName"]', "Please do not enter any numbers within the last name field");
            }

            if (validEmail($email))
            {
                $f3->set('SESSION.email', $email);
            } else
            {
                $f3->set('errors["email"]', "Please enter a valid email");
            }

            if (validPhone($pNumber))
            {
                $f3->set('SESSION.pNumber', $pNumber);
            } else
            {
                $f3->set('errors["pNumber"]', "Please enter a valid phone number - format (XXX) XXX-XXXX");
            }


            // No validation for state
            $f3->set('SESSION.state', $state);

            // Send the user to the next form as long as no errors were found
            if(empty($f3->get('errors')))
            {
                $f3->reroute('experience');
            }
        }
        else
            {
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

    $expArray = getExperience();
    $f3->set('exp', $expArray);

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {

        // Get the data from the post array
        $userGithub = $_POST['userGithub'];
        $yrsExp = implode(", ", $_POST['experience']);
        $relocate = $_POST['willingRelocate'];


        // check if data has been entered
        if (isset($userGithub) && isset($yrsExp))
        {
            //echo "<p>You got here using the POST method</p>";
            //var_dump ($_POST);




            //validation
            if (validGithub($userGithub))
            {
                $f3->set('SESSION.userGithub', $userGithub);
            } else
            {
                $f3->set('errors["userGithub"]', "Please enter a valid github url");
            }

            if (validExperience($yrsExp))
            {
                $f3->set('SESSION.exp', $yrsExp);
            } else
            {
                $f3->set('errors["yearsExperience"]', "Detected invalid experience input");
            }

                // No validation for bio or relocation
                $f3->set('SESSION.userBio', $userBio);
                $f3->set('SESSION.relocate', $relocate);

            // Send the user to the next form as long as no errors were found
            if(empty($f3->get('errors')))
            {
                $f3->reroute('mailingLists');
            }
        }
        else
        {
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


    // Render a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();