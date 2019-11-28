<?php

require __DIR__."\connect.php";

class todoSet extends connect{

    public function __construct(string $server,string $uname,string $pword,string $table){
        // todoSet::$db = new mysqli($server, $uname, $pword, $table);
        parent::__construct();
        if ($this->db->connect_error) {
            # code...
            die("Connection failed: " . todoSet::$db->connect_error);
        }
    }

    // public function test(string $server,string $uname,string $pword,string $table): mysqli{
    //     todoSet::$db = new mysqli($server, $uname, $pword, $table);
    //     if (todoSet::$db->connect_error) {
    //         # code...
    //         die("Connection failed: " . todoSet::$db->connect_error);
    //     }
    //     echo "Your Bluetooth device is connected successfully";
    //     return todoSet::$db;
    // }

    public function setTodo($title, $body, $importance){
        $date = date("Y-m-d");
        $time = date("h:i:s");
        $query = "INSERT INTO todos(title, body, importance, date, time) VALUE('$title', '$body', '$importance', '$date', '$time')";
        $this->db->query($query);
    }

    public function delete($id){
        echo $query = "DELETE FROM todos WHERE id = $id";
        $this->db->query($query);
    }
}


$a = new todoSet("localhost", "root", "", "todo");

if (isset($_POST['title']) && isset($_POST['body']) && isset($_POST['importance'])) {
    # code...
    $a->setTodo($_POST['title'], $_POST['body'], $_POST['importance']);
    ?>
    <script>
        alert("todo set");
        window.location = "todo.php";    
    </script>
    <?php
}

if(isset($_GET['id'])){
    $a->delete($_GET['id']);
}

?>