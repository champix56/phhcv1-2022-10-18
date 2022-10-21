<?php 

include_once 'include/functions/class.php';

echo 'Objet test';

//$id,$nom,$desc,$prix,$ean,$img
$pr1=new Produit(2,'produit From produit','description',5.5,'3184587458','http://',1);
//var_dump($pr1);
//access des champs d'une instance
//access public
$pr1->description="Nouvelle description de pr1";
// impossible car privée ---->   $pr1->nom='nouveau nom';
//usage du setter
$pr1->setNom('nouveau nom de produit');
//var_dump($pr1);


/**produit panier */

$prPanier1=new ProduitPanier(1,'produit 1','description',5.5,'3184587458','http://',1,1);
//var_dump($prPanier1);
//$prPanier1->add(2);
//access a la valeur privée qte par getter
echo 'quantité'.$prPanier1->getQte();
//execution de fonction public du parent
$prPanier1->setNom('nouveau nom de produit');
echo $prPanier1->getNomAndID();
$prPanier1->applyReduction(0.2);



$panier=new Panier();
var_dump($panier);
$panier->addProduit($prPanier1);
$panier->addProduit($prPanier1);
$panier->addProduit($prPanier1);
$pr1P=ProduitPanier::convertProduit($pr1);
var_dump($pr1P);
$panier->addProduit($pr1P);
var_dump(($panier));
var_dump($panier->totalHT());
$panier->removeProduit($prPanier1->getId());
$panier->removeProduit($prPanier1->getId());
$panier->removeProduit($prPanier1->getId());
$panier->removeProduit($prPanier1->getId());
var_dump($panier);

?>