<?php

//Name validation - alphabetical

function validName($nameIn)
{
    return preg_match('/^[a-zA-Z]*$/', $nameIn);
}

//GitHub validation - valid url

function validGithub($url)
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

//Experience validation - string is a valid value property

function validExperience($exp)
{
    return array_search($exp, getExperience());
}

//Phone validation - (555) 555-5555

function validPhone($phone)
{
    return preg_match('/^\(\d{3}\)\s\d{3}-\d{4}/', $phone);
}

//Email validation - valid email format

function validEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}