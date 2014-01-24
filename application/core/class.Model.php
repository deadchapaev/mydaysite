<?php

class Model
{
    private $inputVarArray;
    private $user;

    /**
     * @return mixed
     */
    public function getInputVarArray()
    {
        return $this->inputVarArray;
    }

    /**
     * @param mixed $inputVarArray
     */
    public function setInputVarArray($inputVarArray)
    {
        $this->inputVarArray = $inputVarArray;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getData()
    {

    }
}

?>