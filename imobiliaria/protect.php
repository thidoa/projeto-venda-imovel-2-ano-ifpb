<?php
    if(!isset($_SESSION)) {
        session_start();
    }


    if(!isset($_SESSION['id'])) {
        die("Não é possível acessar essa página sem esta logado.<p><a href='form_login.php'>Fazer login</a></p>");
    }
?>