<?php
session_start();

unset($_SESSION['update_profile']);

$datas = json_decode($_SESSION['update_profile'], true);

echo $datas['name'];
echo $datas['phoneNumber'];
?>