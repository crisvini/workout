<?php
$mysqli = new mysqli('localhost', 'root', '', 'workou68_workout');
if ($mysqli->connect_error) die("Connection failed: " . $mysqli->connect_error);
