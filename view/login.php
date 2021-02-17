<?php
session_start();

if (!empty($_GET['message'])){
    echo $_GET['message'];
}

include('include/head.php');

?>



<div class="box">

    <?php include('include/nav.php'); ?>

    <div class="content login">

        <div class="header">
            <h1 class="text-header">Connexion</h1>
            <span class="text-info">Veuillez vous connecter pour accéder à la gestion de stock</span>
        </div>

        <div class="logForm">
            <form method="post" action="../controller/login.php">
                <label for="email">Email ou trigramme</label><br>
                <input type="text" name="email" id="email"><br><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
                <input type="submit">
            </form>
        </div>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../ressources/js/jquery.selectric.js"></script>
<script src="../ressources/js/stock.js"></script>

</body>
</html>