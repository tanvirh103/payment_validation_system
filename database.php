<?php
function dbConnection(){
    $conn=mysqli_connect('localhost','root','','assignment');
    return $conn;
}
?>