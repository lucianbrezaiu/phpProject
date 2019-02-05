<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 05-Feb-19
 * Time: 4:46
 */

namespace App\Models;
use Framework\Model;

class Project extends Model
{
    protected $table = "project";

    private $name;
    private $startDate;
    private $endDate;
    private $budget;
    private $employee;

    /**
     * Functia returneaza valoarea lui $name.
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Functia seteaza valoarea lui $name.
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Functia returneaza valoarea lui $startDate.
     */
    public function getStartDate() : string
    {
        return $this->startDate;
    }

    /**
     * Functia seteaza valoarea lui $startDate.
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * Functia returneaza valoarea lui $endDate.
     */
    public function getEndDate() : string
    {
        return $this->endDate;
    }

    /**
     * Functia seteaza valoarea lui $startDate.
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * Functia returneaza valoarea lui $budget.
     */
    public function getBudget() : double
    {
        return $this->budget;
    }

    /**
     * Functia seteaza valoarea lui $budget.
     */
    public function setBudget($budget): void
    {
        $this->budget = $budget;
    }

    /**
     * Functia returneaza valoarea lui $employee.
     */
    public function getEmployee() : int
    {
        return $this->employee;
    }

    /**
     * Functia seteaza valoarea lui $employee.
     */
    public function setEmployee($employee): void
    {
        $this->employee = $employee;
    }



}