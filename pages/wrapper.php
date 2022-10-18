<?php
    var_dump($_GET);
    //verif. d'existance de la position 'page' dans le tableau $_GET avec isset
    if(!isset($_GET['page'])){$_GET['page']='home';}
    var_dump($_GET);
    //choix de la page a inclure
    switch($_GET['page'])
    {
        case 'produit':include('produit/produit.php');break;
        case 'produits':include('produits/produits.php');break;
        default : include('home/home.html');break;
    }
?>