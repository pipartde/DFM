<?php
// But : récupérer les différent type lié à l'ordinateur

include('../model/stock/read.php');

$types = recupTypeForCat(1);
?>

<!-- File: ordinateur.php -->
<?php
foreach ($types as $type){
    ?><option value="<?= $type['pk_typ'] ?>"><?= $type['nom'] ?></option>
<?php
}
?>

