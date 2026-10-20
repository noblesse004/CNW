<?php
class Patient{
    private $Id_Prod;
    private $Name_Prod;
    private $Calculating;
    private $Des;


    public function __construct($Id_Prod, $Name_Prod, $Calculating, $Des)
    {
        $this ->Id_Prod = $Id_Prod;
        $this ->Name_Prod = $Name_Prod;
        $this ->Calculating = $Calculating;
        $this ->Des = $Des;

// 
    }
    public function getId(){
        return $this ->Id_Prod;;
    }
    public function getFullName(){
        return $this ->Name_Prod;
    }
    public function getCalculating(){
        return $this ->Calculating;
    }
    // ham get, set
     public function getDes(){
        return $this ->Des;
    }
}
?>