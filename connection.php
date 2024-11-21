<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dnName = 'db_prak';

$conn = new mysqli($host, $username, $password, $dnName,  '3306');

if($conn->connect_error)
{
    die('koneksi database gagal');
}