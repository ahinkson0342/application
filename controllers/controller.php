<?php

use classes\Applicant;
use classes\Applicant_SubscribedToLists;

require_once ('vendor/autoload.php');
require_once ('model/validate.php');
require_once ('model/data-layer.php');

/** My Controller class for the application project
 *  328/diner/controllers/controller.php
 */
class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personalInfo()
    {
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
            $mList = $_POST['jobOpeningsML'];


            // check if data has been entered
            if (isset($fName) && isset($lName) && isset($email) && isset($pNumber))
            {


                //validation
                if (validName($fName))
                {
                    $this->_f3->set('SESSION.fName', $fName);
                }
                else
                {
                    $this->_f3->set('errors["fName"]', "Please do not enter any numbers within the first name field");
                }

                if (validName($_POST['lName']))
                {
                    $this->_f3->set('SESSION.lName', $lName);
                }
                else
                {
                    $this->_f3->set('errors["lName"]', "Please do not enter any numbers within the last name field");
                }

                if (validEmail($_POST['email']))
                {
                    $this->_f3->set('SESSION.email', $email);
                }
                else
                {
                    $this->_f3->set('errors["email"]', "Please enter a valid email");
                }

                if (validPhone($_POST['pNumber']))
                {
                    $this->_f3->set('SESSION.pNumber', $pNumber);
                }
                else
                {
                    $this->_f3->set('errors["pNumber"]', "Please enter a valid phone number - format (XXX) XXX-XXXX");
                }

                $this->_f3->set('SESSION.mList', $mList);

                $this->_f3->set('SESSION.state', $state);

                // Send the user to the next form as long as no errors were found
                if (empty($this->_f3->get('errors')))
                {
                    $this->_f3->reroute('experience');
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
    }

    function experience()
    {
        $expArray = getExperience();
        $this->_f3->set('exp', $expArray);

        // If the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {

            // Get the data from the post array
            $userBio = $_POST['userBio'];
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
                    $this->_f3->set('SESSION.userGithub', $userGithub);
                }
                else
                {
                    $this->_f3->set('errors["userGithub"]', "Please enter a valid github url");
                }

                if (validExperience($yrsExp))
                {
                    $this->_f3->set('SESSION.exp', $yrsExp);
                }
                else
                {
                    $this->_f3->set('errors["yearsExperience"]', "Detected invalid experience input");
                }

                // No validation for bio or relocation
                $this->_f3->set('SESSION.userBio', $userBio);
                $this->_f3->set('SESSION.relocate', $relocate);

                $mList = $_SESSION['mList'];

                if($mList)
                {
                    $applicant = new Applicant_SubscribedToLists(
                        $this->_f3->get('SESSION.fName'),
                        $this->_f3->get('SESSION.lName'),
                        $this->_f3->get('SESSION.email'),
                        $this->_f3->get('SESSION.pNumber'),
                        $this->_f3->get('SESSION.state')
                    );
                }
                else
                {
                    $applicant = new Applicant(
                        $this->_f3->get('SESSION.fName'),
                        $this->_f3->get('SESSION.lName'),
                        $this->_f3->get('SESSION.email'),
                        $this->_f3->get('SESSION.pNumber'),
                        $this->_f3->get('SESSION.state')
                    );
                }

                $applicant->setGithub($userGithub);
                $applicant->setExperience($yrsExp);
                $applicant->setBio($userBio);
                $applicant->setRelocate($relocate);

                $this->_f3->set('SESSION.applicant', $applicant);

                // Send the user to the next form as long as no errors were found
                if (empty($this->_f3->get('errors')) && !$mList)
                {
                    $this->_f3->reroute('summary');
                }
                else if(empty($this->_f3->get('errors')))
                {
                    $this->_f3->reroute('mailingLists');
                }
                else
                {
                    echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";
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
    }

    function mailingLists()
    {
        // If the form has been posted
        global $f3;
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {

            //echo "<p>You got here using the POST method</p>";
            //var_dump ($_POST);

            // Get the data from the post array
            $SDEVSkills = $_POST['softwareSkills'];
            $verticals = $_POST['industryVerticals'];

            // If the data valid
            if (true)
            {

                // Add the data to the session array
                $f3->set('SESSION.SDEVSkills', $SDEVSkills);
                $f3->set('SESSION.verticals', $verticals);

                // Send the user to the next form
                $f3->reroute('summary');
            }
            else
            {
                // Temporary
                echo "<p class='text-center text-danger'>Please ensure you filled out all fields!</p>";

            }
        }

        // Render a view page
        $view = new Template();
        echo $view->render('views/mailingLists.html');
    }
}

