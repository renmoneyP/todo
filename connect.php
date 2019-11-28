<?php

class connect{
    protected $db;

    public function __construct(){
        $this->db = new mysqli("localhost", "root", "", "todo");
        // return $this->db;
    }
}
?>