<?php
// But : récupérer les différent type lié à l'ordinateur

include('../model/stock/read.php');

//$types = recupTypeForCat($_POST['pk_cat']);
$types = recupTypeForCat(2);
?>

<!-- File: cable.php -->
<?php
foreach ($types as $type){
    ?><option value="<?= $type['pk_typ'] ?>"><?= $type['nom'] ?></option>
    <?php
}
?>

