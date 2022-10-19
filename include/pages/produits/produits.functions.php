<?php
function getProduits()
{
    $mysqli = mysqli_connect("localhost:3307", "root", "", "phh-22-10-18");
    $req = "SELECT P.`id` AS `pid`, `id_categories`, P.`nom` AS `pnom`, `EAN`, `prix`, `description`, `image`, C.`nom` AS `cnom` FROM `produits` P, `categories` C WHERE P.`id_categories` = C.`id`"; // AND C.`id`=1;";
    $result = mysqli_query($mysqli, $req);
    $produits=[];
    while ($assoc = mysqli_fetch_assoc($result)) {
        array_push($produits,$assoc);
        // eq. $produits[]=$assoc;
    }
    return $produits;
}
?>