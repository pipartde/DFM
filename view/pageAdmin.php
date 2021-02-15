<?php
include('../model/admin/read.php');
if (!empty($_GET['message'])){
    echo $_GET['message'];
}

?>


<table>
    <thead>
    <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>trigramme</th>
        <th>password</th>
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
    </tr>
    <?php } ?>
    </tbody>
</table>

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
