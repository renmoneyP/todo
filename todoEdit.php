<?php

require __DIR__.'\connect.php';

class todoEdit extends connect{
    protected static $id;
    protected static $title;
    protected static $body;
    protected static $importance;

    public function __construct($id, $title, $body, $importance){
        parent::__construct();
        todoEdit::$id = $this->db->real_escape_string($id);
        todoEdit::$title = $this->db->real_escape_string($title);
        todoEdit::$body = $this->db->real_escape_string($body);
        todoEdit::$importance = $this->db->real_escape_string($importance);
        $date = date("Y-m-d");
        $time = date("h:i:s");
        echo $query = "UPDATE todos set title=\"".todoEdit::$title."\", body=\"".todoEdit::$body."\", importance=\"".todoEdit::$importance."\", date=\"".$date."\", time=\"".$time.'" WHERE id = '.todoEdit::$id;
        $result = $this->db->query($query);
        header("location: todo.php");

    }
}

new todoEdit($_POST['id'], $_POST['title'], $_POST['body'], $_POST['importance']);
?>