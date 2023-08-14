<?php

session_destroy();
setcookie('user','',time()-3600,'/');
setcookie('admin','',time()-999999999,'/');
header('location:signin.html');

?>