<?php
session_start();

include('../model/admin/read.php');
include('../controller/fonction.php');

if (empty($_SESSION['pk'])) {
    header('Location: login.php');
}

if (!empty($_GET['message'])) {
    echo $_GET['message'];
}

/*if ($_SESSION['superadmin']){
    echo "vous êtes un Super Admin";
}*/

?>

<html lang="fr">

<?php include('include/head.php') ?>

<body>

<div class="box">

    <?php include('include/nav.php'); ?>

    <div class="admin">

        <div class="header">
            <h1 class="text-header">Gestion d'Admin</h1>
            <span class="text-info">Listing des différents admin</span>
        </div>

        <div class="tableau">
            <table>
                <thead>
                <tr>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>trigramme</th>
                    <th>password</th>
                    <th class="superadmin">action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listeadmin = recupTousAdmin();
                foreach ($listeadmin as $admin) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($admin['nom']) ?></td>
                        <td><?= htmlspecialchars($admin['prenom']) ?></td>
                        <td><?= htmlspecialchars($admin['email']) ?></td>
                        <td><?= htmlspecialchars($admin['trigramme']) ?></td>
                        <td><?= htmlspecialchars($admin['password']) ?></td>
                        <td class="superadmin">DEL MOD</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="superadmin">
            <h3>
                Inscription d'un nouvel admin
            </h3>
            <form action="../controller/registerAdmin.php" method="post">
                <label for="email">Email : </label>
                <input type="email" name="email" id="email">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
                <label>Super Admin ? : </label>
                <input type="checkbox" name="superadmin" id="superadmin">
                <input type="submit">
            </form>
        </div>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../ressources/js/admin.js"></script>

<!-- si la personne qui se log n'est pas un superAdmin, on hide les partie sensible -->
<?php if (!$_SESSION['superadmin']) {
    ?>
    <script>testing();</script>
    <?php
} ?>


</body>
</html>
