<?php

$hostname = "localhost" ?? $_SERVER['SERVER_NAME'];
$username = "root";
$password = "";
$database = "cahayatani";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die('Gagal terhubung ke database: '.mysqli_connect_error());
}