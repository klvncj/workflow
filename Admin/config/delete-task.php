<?php
require_once('connect.php');
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    if (isset($_GET['user'])) {
        $user = $_GET['user'];
    
        $response = get_user($user);
        if ($response) {
            extract($response);
        }
    } else {
        echo "<script>alert('User not found')</script>";
    }
    $response = delete_task($task_id);

    if ($response === true) {
        header("Location: ../../main/task.php?user=$firstname");
    } else {
        echo "<script>Alert('Failed to delete')</script>";
    }
}