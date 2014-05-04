<?php
namespace application\core;
class Model
{
    private $inputVarArray;
    private $user;

    public function getInputVarArray()
    {
        return $this->inputVarArray;
    }

    public function setInputVarArray($inputVarArray)
    {
        $this->inputVarArray = $inputVarArray;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getData()
    {

    }
}

?>