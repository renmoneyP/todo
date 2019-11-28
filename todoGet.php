<?php
session_start();
require __DIR__."\connect.php";
class todoGet extends connect{
    // protected static $db;
    public $arrays = array();

    public function __construct(){
        // todoGet::$db = new mysqli("localhost", "root", "", "todo");
        parent::__construct();
        // var_dump($this->db);
        $query = "SELECT * FROM todos ORDER BY date DESC,time DESC";
        $result = $this->db->query($query);
        // count($result->fetch_object());
        while ($a = $result->fetch_object()) {
            # code...
            array_push($this->arrays, $a);
        }

       $array;
    }
}

$a = new todoGet();

print_r(json_encode(json_encode($a->arrays)));

?>