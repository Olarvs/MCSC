<?php
session_start();
$data = array();

$data['name'] = 'JennQT';
$data['age'] = '21';
$data['phoneNumber'] = '915362419';

$data_encoded = json_encode($data);

$_SESSION['update_profile'] = $data_encoded;

$decode = $_SESSION['update_profile'];

print_r($_SESSION['update_profile']);

print_r()