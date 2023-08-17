<?php
/**
 * Created by PhpStorm.
 * User: Smiith
 * Date: 15/06/2019
 * Time: 05:42 PM
 */

$conexion = mysqli_connect("localhost", "root", "", "biometrics");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
