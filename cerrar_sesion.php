<?php
        //inicializar la sesión 
        session_start();

        if(!$_SESSION){
            header("location:index.php");
        }
        else{
            session_destroy();
            header("location:index.php");
        }
?>