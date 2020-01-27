<?php
error_reporting(0);
ini_set('display_errors', 0);

/* Настройки подключения к БД */
const DB_HOST = "localhost";
const DB_NAME = "library";
const DB_LOGIN = "root";
const DB_PASSWORD = "";


$GLOBALS['link'] = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die("ERROR: Ошибка соединения с базой");

if (!$link){
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "<br>";
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link, "utf8");
$result = mysqli_query($link, "SET NAMES 'utf-8'");
