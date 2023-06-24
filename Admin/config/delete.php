<?php
require_once('connect.php');
if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    $response = delete($staff_id);

    if ($response === true) {
        header("Location: ../main/index.php");
    } else {
        echo "<script>Alert('Failed to delete')</script>";
    }
}