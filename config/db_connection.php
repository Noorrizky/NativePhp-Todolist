<?php
    $db = new mysqli("localhost","root","","todo_list");

    if($db->connect_error)
        echo "DB Connection error!";
    else
        // echo "Connection Success";
?>