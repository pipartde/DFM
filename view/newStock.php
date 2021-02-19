<?php
session_start();


if(empty($_SESSION['pk'])){
    header('Location: login.php');
}

include('include/head.php');
include('../model/stock/read.php');


?>

<div class="box">

    <?php include('include/nav.php'); ?>

    <div class="content newElement">

        <div class="header">
            <h1 class="text-header">Gestion de stock</h1>
            <span class="text-info">Ajoutez un nouvel élément</span>
        </div>

        <div class="fornNewElement">

            <div class="inline-selector">
                <span class="selected" id="select_value_category">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_type">
                    <strong></strong>
                </span>
            </div>


            <form action="" method="get" class="form-tri view">
                <select class="choix" id="get_value_category" name="category">
                    <option value="" disabled onfocus="">Catégorie</option>
                    <?php
                    $listCategory = recupCategory();
                    foreach ($listCategory as $category){
                    ?>
                    <option value="<?= $category['pk_cat'] ?>"><?= $category['nom'] ?></option>
                    <?php
                    }
                    ?>

                </select>
                <select class="choix" id="get_value_type" name="category">
                    <option value="">Type</option>
                    <?php
                    $listCategory = recupCategory();
                    foreach ($listCategory as $category){
                        ?>
                        <option value="<?= $category['pk_cat'] ?>"><?= $category['nom'] ?></option>
                        <?php
                    }
                    ?>

                </select>



            </form>
        </div>


    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../ressources/js/jquery.selectric.js"></script>
<script src="../ressources/js/stock.js"></script>

</body>
</html>