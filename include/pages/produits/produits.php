<h2>Liste des produits</h2>
<hr/>
<?php

include_once 'produits.functions.php ';
var_dump($req);
//creation de l'array vide
$produits = [];

//creation d'un produit
$produit = ['id' => 0, 'nom' => 'vélo', 'prix' => 2000, 'image' => 'https://lapierre-shopware.accell.cloud/thumbnail/64/bb/9f/1648474576/E-Sensium%202.2%20MY21%20Web%20-%20View%20PNG_800x800.png'];

//affichage du contenu d'un array
print_r($produit);

//ajout dans l'array d'un produit plusieurs fois
array_push($produits, $produit, $produit);

//affichage d'une instance simple ou complexe
var_dump($produits);
?>
<table class="produit-liste">
    <thead>
        <tr>
            <th>image</th>
            <th>nom</th>
            <th>prix</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
       <?php
for ($i = 0; $i < count($produits); $i++) {
    $pr = $produits[$i];
    ?><tr>
                <td class="produit-liste-image"><img src="<?=$pr['image']?>" alt=""></td>
                <td class="produit-liste-nom"><?=$pr['nom']?></td>
                <td class="produit-liste-prix"><?php echo $pr['prix']; ?>€</td>
                <td>
                    <button type="button" class="btn btn-warning">add</button><br/>
                    <button type="button" class="btn btn-primary">voir</button>
                </td>
            </tr>
        <?php
}
?>
    </tbody>
</table>
