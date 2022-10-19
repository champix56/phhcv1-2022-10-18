<?php
include_once 'include/functions/sql.php';
function getProduits($idCategorie = null)
{
    global $mysqli;
    // $mysqli = mysqli_connect("localhost:3307", "root", "", "phh-22-10-18");
    $req = "SELECT P.`id` AS `pid`, `id_categories`, P.`nom` AS `pnom`, `EAN`, `prix`, `description`, `image`, C.`nom` AS `cnom` FROM `produits` P, `categories` C WHERE P.`id_categories` = C.`id`";
    if ($idCategorie != null && is_numeric($idCategorie)) {
        $req = $req . " AND C.`id`=" . $idCategorie;
    }
    var_dump($req);
    $result = mysqli_query($mysqli, $req);
    $produits = [];
    while ($assoc = mysqli_fetch_assoc($result)) {
        array_push($produits, $assoc);
        // eq. $produits[]=$assoc;
    }
    return $produits;
}
function getCategorie($idcat)
{
    global $mysqli;
    if (is_numeric($idcat)) {
        $req = "SELECT id,nom FROM categories WHERE id=" . $idcat;
        $result = mysqli_query($mysqli, $req);
        return mysqli_fetch_assoc($result);
    }else{
        return NULL;
    }

}
