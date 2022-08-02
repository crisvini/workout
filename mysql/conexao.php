<?php

$mysqli = new mysqli('localhost', 'root', '', 'workout');
if ($mysqli->connect_errno)
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " .  $mysqli->connect_error;
