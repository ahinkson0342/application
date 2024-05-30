<?php

namespace classes;

class Applicant
{
    private String $_fname;
    private String $_lname;
    private String $_email;
    private String $_state;
    private String $_phone;
    private String $_github;
    private String $_experience;
    private String $_relocate;
    private String $_bio;


    /**
     * Constructor creates an Applicant object
     * @param $_fname - first name
     * @param $_lname - last name
     * @param $_email - applicant's email
     * @param $_state - applicant's state
     * @param $_phone - applicant's phone number
     * @param $_github - applicant's github link
     * @param $_experience - applicant's experience as filled out in the form
     * @param $_relocate - applicant's willingness to relocate
     * @param $_bio - applicant's bio
     */
    public function __construct($_fname="", $_lname="", $_email="", $_state="", $_phone="", $_github="",
                                $_experience="", $_relocate="", $_bio="")
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_email = $_email;
        $this->_state = $_state;
        $this->_phone = $_phone;
        $this->_github = $_github;
        $this->_experience = $_experience;
        $this->_relocate = $_relocate;
        $this->_bio = $_bio;
    }

    /**
     * getter method for the first name of the selected applicant
     * @return String $_fname
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * sets the first name for the applicant selected
     * @param mixed $fname
     */
    public function setFname(String $fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * getter method for the last name of the selected applicant
     * @return String $_lname
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * sets the last name for the selected applicant
     * @param mixed $lname
     */
    public function setLname(String $lname): void
    {
        $this->_lname = $lname;
    }

    /**
     * getter method for the email of the selected applicant
     * @return String $_email
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * sets the email for the selected applicant
     * @param String $email
     */
    public function setEmail(String $email): void
    {
        $this->_email = $email;
    }

    /**
     * getter method for the state of the selected applicant
     * @return String $_state
     */
    public function getState(): String
    {
        return $this->_state;
    }

    /**
     * sets the state for the selected applicant
     * @param String $state
     */
    public function setState(String $state): void
    {
        $this->_state = $state;
    }

    /**
     * getter method for phone number of the selected applicant
     * @return String $_phone
     */
    public function getPhone(): String
    {
        return $this->_phone;
    }

    /**
     * sets the phone number for the selected applicant
     * @param String $phone
     */
    public function setPhone(String $phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * getter method for github url of the selected applicant
     * @return String $_github
     */
    public function getGithub(): String
    {
        return $this->_github;
    }

    /**
     * sets the github url for the selected applicant
     * @param String $github
     */
    public function setGithub(String $github): void
    {
        $this->_github = $github;
    }

    /**
     * getter method for experience of the selected user
     * @return String $_experience
     */
    public function getExperience(): String
    {
        return $this->_experience;
    }

    /**
     * sets the experience for the selected user
     * @param String $experience
     */
    public function setExperience(String $experience): void
    {
        $this->_experience = $experience;
    }

    /**
     * getter method for willingness to relocate of the selected user
     * @return String $_relocate
     */
    public function getRelocate(): String
    {
        return $this->_relocate;
    }

    /**
     * sets the willingness to relocate for the selected user
     * @param String $relocate
     */
    public function setRelocate(String $relocate): void
    {
        $this->_relocate = $relocate;
    }

    /**
     * getter method for the bio of the selected user
     * @return String $_bio
     */
    public function getBio(): String
    {
        return $this->_bio;
    }

    /**
     * sets the bio for the selected user
     * @param String $bio
     */
    public function setBio(String $bio): void
    {
        $this->_bio = $bio;
    }

}