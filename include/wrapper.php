<?php
    //verif. d'existance de la position 'page' dans le tableau $_GET avec isset
    if(!isset($_GET['page'])){$_GET['page']='home';}
    //choix de la page a inclure
    switch($_GET['page'])
    {
        case 'produit':include('pages/produit/produit.php');break;
        case 'produits':include('pages/produits/produits.php');break;
        case 'categories':include('pages/categories/categories.php');break;
        default : include('pages/home.html');break;
    }
?>