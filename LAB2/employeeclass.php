<?php  // IDEA:
require_once("personclass.php");

class Employee extends Person
{
    private $employeeID;
    private $department;
    
    public function __construct($employeeName, $dept, $nationalID)
    {
        parent::__construct($employeeName, $nationalID);
        $this->department = $dept;
        $this->employeeID = $this->GenerataEmployeeID();
    }

    public function GetEmployeeID(){
        return $this->employeeID;
    }
    public function GetDepartment(){
        return $this->department;
    }
    public function SetDepartment($dept){
        $this->department = $dept;
    }
    final private function GenerataEmployeeID(){
        static $IDGen = 1;
        return $IDGen++;
    }
}