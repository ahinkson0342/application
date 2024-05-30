<?php

namespace classes;

require_once ('classes/Applicant.php');

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionsJobs = [];
    private $_selectionsVerticals = [];

    public function getSelectionsJobs(): array
    {
        return $this->_selectionsJobs;
    }

    public function setSelectionsJobs(array $selectionsJobs): void
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    public function getSelectionsVerticals(): array
    {
        return $this->_selectionsVerticals;
    }

    public function setSelectionsVerticals(array $selectionsVerticals): void
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }



}