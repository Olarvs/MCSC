<?php
session_start();
require_once '../../database/config.php';

if(isset($_POST['enable'])) {
    $adminId = $_POST['adminId'];

    $enable = mysqli_query($conn, "UPDATE tbl_admin SET status = 1 WHERE adminId = $adminId");

    if($enable) {
        echo 'success';
    }
}

if(isset($_POST['disable'])) {
    $adminId = $_POST['adminId'];

    $enable = mysqli_query($conn, "UPDATE tbl_admin SET status = 0 WHERE adminId = $adminId");

    if($enable) {
        echo 'success';
    }
}