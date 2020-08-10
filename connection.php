<?php
$mysqli = new mysqli("localhost","root","","nationalhealthcareassistant");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
// else
// echo "<h1>Connected successfully<h1/>";

?>