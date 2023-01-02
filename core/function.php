<?php
    require_once 'init.php';
    function session_push($variable,$msg){
        $_SESSION[$variable] = $msg;
    }