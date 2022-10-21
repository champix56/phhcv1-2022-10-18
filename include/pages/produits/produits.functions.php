<?php
include_once 'include/functions/sql.php';
include_once 'include/functions/class.php';
function getProduits($idCategorie = null)
{
    global $mysqli;
    $returnedProducts = new Produits();
    $req = "SELECT `id`  , `id_categories`, `nom`  , `EAN`, `prix`, `description`, `image` FROM `produits`";
    if ($idCategorie != null && is_numeric($idCategorie)) {
        $req = $req . " WHERE  `id_categories`=" . $idCategorie;
    }
    $result = mysqli_query($mysqli, $req);

    while ($as = mysqli_fetch_assoc($result)) {
        $produit = new Produit($as['id'],
            $as['nom'],
            $as['description'],
            $as['prix'],
            $as['EAN'],
            $as['img'],
            $as['id_categories']);
        $returnedProducts->add($produit);
    }
    return $returnedProducts;
}
function getCategorie($idcat)
{
    global $mysqli;
    if (is_numeric($idcat)) {
        $req = "SELECT id,nom,tva FROM categories WHERE id=" . $idcat;
        $result = mysqli_query($mysqli, $req);
        $sqlValues = mysqli_fetch_assoc($result);
        return new Categorie($sqlValues['id'], $sqlValues['nom'], $sqlValues['tva']);
    } else {
        return null;
    }
}
