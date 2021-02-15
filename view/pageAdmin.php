<?php

if (!empty($_GET['message'])){
    echo $_GET['message'];
}

?>


<h3>
    Inscription d'un nouvel admin
</h3>
<form action="../controller/registerAdmin.php" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit">
</form>
