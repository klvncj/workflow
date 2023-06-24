<?php
require_once('connect.php');
if (isset($_GET['id'])) {
    $activity_id = $_GET['id'];
    $response = delete_act($activity_id);

    if ($response === true) {
        header("Location: ../../main/admin-activities.php?u=1");
    } else {
        echo "<script>Alert('Failed to delete')</script>";
    }
}