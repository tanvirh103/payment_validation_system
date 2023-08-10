<?php
require_once('userinfo_model.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $row=userinfo($username,$password);
    if($row['role']=="User"){
        header('location:user_dashboard.html');
    }else if($row['role']=="Admin"){
        header('location:admin_dashboard.html');
    }else{
        header('location:wrong.html');
    }
}


?>