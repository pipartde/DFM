<?php
session_start();

include('../model/admin/delete.php');

if (empty($_SESSION['pk']) or !$_SESSION['superadmin']) {
    header('Location: login.php');
}

if(isset($_GET['pk'])){
    deleteAccess($_GET['pk']);
    deleteAdmin($_GET['pk']);
    header('Location: ../view/pageAdmin.php');
}