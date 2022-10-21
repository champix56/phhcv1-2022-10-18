<?php
include_once 'include/functions/sql.php';
include_once 'include/functions/class.php';
function getProduit($id)
{
    global $mysqli;
    $req = "SELECT `id`,
    `id_categories`,
    `nom`,
    `EAN`,
    `prix`,
    `description`,
    `image` FROM `produits` WHERE id=" . $id;
    $result = mysqli_query($mysqli, $req);
    $sqlVal = mysqli_fetch_assoc($result);
    return new Produit($sqlVal['id'],
        $sqlVal['nom'],
        $sqlVal['description'],
        $sqlVal['prix'],
        $sqlVal['EAN'],
        $sqlVal['img'],
        $sqlVal['id_categories']);

}

function postProduit(Produit $pr)
{
    global $mysqli;

    $req = "INSERT INTO `produits`(
        `id_categories`,
        `nom`,
        `EAN`,
        `prix`,
        `description`,
        `image`)
        VALUES ($pr->getIdcat(),
        '" . addslashes($pr->getNom()) . "',
        '" . addslashes($pr->getEAN()) . "',
        $pr->getPrix(),
        '" . addslashes($pr->description) . "',
        '$pr->getImage()')";

    $result = mysqli_query($mysqli, $req);
    $id= mysqli_insert_id($mysqli); //$result;// mysqli_affected_rows($mysqli)>=1;//?true:false;
    $pr=new Produit($id,$pr->getNom(),$pr->description, $pr->getPrix,$pr->getEAN(),$pr->getImage(),$pr->getIdcat());
    return $pr;
}
function putProduit(Produit $pr)
{
    global $mysqli;
    $req = "UPDATE `produits`
    SET `id_categories`=$pr->getIdcat(),
    `nom`='" . addslashes($pr->getNom()) . "',
    `EAN`='" . addslashes($pr->getEAN()) . "',
    `prix`=$pr->getPrix(),
    `description`='" . addslashes($pr->description) . "',
    `image`='$pr->getImage()'
    WHERE `id`=$pr->getId()";
    mysqli_query($mysqli, $req);
   
    return mysqli_affected_rows($mysqli) == 1;
}
