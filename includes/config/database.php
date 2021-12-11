<?php

function conectarDB() :mysqli
{
    $db = mysqli_connect('127.0.0.1', 'root', 'qazqazqaz9', 'bienes_raices');
    if (!$db) {
        echo "No se conecto";
        exit;
    }
    return $db;
}
