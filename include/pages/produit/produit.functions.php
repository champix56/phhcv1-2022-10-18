<?php
include_once 'include/functions/sql.php';
function getProduit($id )
{
    global $mysqli;
    echo $req="SELECT `id`, `id_categories`, `nom`, `EAN`, `prix`, `description`, `image` FROM `produits` WHERE id=".$id;
    $result=mysqli_query($mysqli,$req);
    return mysqli_fetch_assoc($result);
}

function postProduit($idcat,$nom,$ean,$prix,$description,$img){
    global $mysqli;
   
    $req="INSERT INTO `produits`(`id_categories`, `nom`, `EAN`, `prix`, `description`, `image`) VALUES ($idcat,'$nom','$ean',$prix,'$description','$img')";
    $result=mysqli_query($mysqli,$req);
    return $result;// mysqli_affected_rows($mysqli)>=1;//?true:false;
}
function putProduit($id,$idcat,$nom,$ean,$prix,$description,$img){
    global $mysqli;
    $req="UPDATE `produits` SET `id_categories`=?,`nom`='?',`EAN`='?',`prix`='?',`description`='?',`image`='?' WHERE `id`=?";
    $result=mysqli_execute_query($mysqli,$req,[$idcat,$nom,$ean,$prix,$description,$img,$id]);
    return  mysqli_affected_rows($mysqli)==1;
}
?>