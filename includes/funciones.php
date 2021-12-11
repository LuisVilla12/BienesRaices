<?php

require 'app.php';

// Funcion para incluir templeates
function incluirTempleate(string $nombre, bool $inicio=false){
    include TEMPLEATES_URL . "/${nombre}.php";
}