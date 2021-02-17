<?php

session_start();
include('fonction.php');
include('../model/admin/read.php');
include('../model/admin/insert.php');


htmlSpecialArray($_POST);
checkTrimArray($_POST);


var_dump($_POST);