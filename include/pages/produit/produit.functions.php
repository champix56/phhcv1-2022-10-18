<?php
include_once 'include/functions/gd2Watermark.php';
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
    return new Produit(
        $sqlVal['id'],
        $sqlVal['nom'],
        $sqlVal['description'],
        $sqlVal['prix'],
        $sqlVal['EAN'],
        $sqlVal['image'],
        $sqlVal['id_categories']);

}

function postProduit(Produit $pr)
{
    global $mysqli;
var_dump($pr->getIdcat());
    $req = "INSERT INTO `produits`(
        `id_categories`,
        `nom`,
        `EAN`,
        `prix`,
        `description`,
        `image`)
        VALUES (".$pr->getIdcat().",
        '" . addslashes($pr->getNom()) . "',
        '" . addslashes($pr->getEAN()) . "',".
        $pr->getPrix().",".
        "'" . addslashes($pr->description) . "','')";

    $result = mysqli_query($mysqli, $req);
    $id= mysqli_insert_id($mysqli); //$result;// mysqli_affected_rows($mysqli)>=1;//?true:false;
    $pr=new Produit($id,$pr->getNom(),$pr->description, $pr->getPrix(),$pr->getEAN(),$pr->getImage(),$pr->getIdcat());
    return $pr;
}
function putProduit(Produit $pr)
{
    global $mysqli;
    $req = "UPDATE `produits`
    SET `id_categories`=".$pr->getIdcat().",
    `nom`='" . addslashes($pr->getNom()) . "',
    `EAN`='" . addslashes($pr->getEAN()) . "',
    `prix`=".$pr->getPrix().",
    `description`='" . addslashes($pr->description)."'  WHERE `id`=".$pr->getId();
    mysqli_query($mysqli, $req);
   
    return mysqli_affected_rows($mysqli) == 1;
}
function produit_updateImage($file,Produit $pr) {
    if($_FILES['imageProduit']['size']>0){
        
        $extfile=getFileExtension($file['name']);
        //echo 
        $uploadFileName="img/produits/".$pr->getId()."w.".$extfile;
        $uploadUnWatermarkedFileName="img/produits/".$pr->getId()."big.".$extfile;
        
        var_dump( $_FILES['imageProduit']);
        if(move_uploaded_file($file['tmp_name'],$uploadFileName) && copy($uploadFileName,$uploadUnWatermarkedFileName)){
            reScaleImage($uploadFileName, 2400, 1800);
            watermark('img/watermarkLogo.png', $uploadFileName);
            reScaleImage($uploadFileName, 600, 400);
            global $mysqli;
            echo 
            $req="UPDATE `produits` SET `image`='$uploadFileName' WHERE `id`=".$pr->getId();
            mysqli_query($mysqli,$req);

            
        }
    }
}
function getFileExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}
?>