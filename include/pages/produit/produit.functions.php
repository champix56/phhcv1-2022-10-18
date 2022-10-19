<?php
include_once 'include/functions/sql.php'
function getProduit($id )
{
    global $mysqli;
    $req="SELECT `id`, `id_categories`, `nom`, `EAN`, `prix`, `description`, `image` FROM `produits` WHERE id=".$id;
    $result=mysqli_query($mysqli,$req);
    return mysqli_fect_assoc($result);
}
?>