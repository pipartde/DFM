<?php
session_start();

if(!empty($_SESSION['pk'])){
    session_destroy();

    header("Location: ../view/login.php");
}