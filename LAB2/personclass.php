<?php

class Person
{
    private $name;
    private $nationalID;

    public function __construct($personName, $ID)
    {
        $this->name = strtolower($personName);
        $this->nationalID = $ID;
    }
    public function GetName(){
        return $this->name;
    }
    public function SetName($newname){
        $this->name = strtoupper($newname);
    }
    public function GetNationalID(){
        return $this->nationalID;
    }
}
?>