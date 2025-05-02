<?php

$conn = mysqli_connect("localhost", "root", "", "mec_php_124");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}