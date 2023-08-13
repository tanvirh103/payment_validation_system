<?php
if(isset($_POST['submit'])){
    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    
    $logincode=file_get_contents('logincode.json');
    $code=json_decode($logincode,true);

    $file=fopen('login.php','w');
    fwrite($file,$code['loginCode']);
    header('location:login.php');
   
    
}


?>