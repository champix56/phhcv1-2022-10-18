<h2>Liste des produits</h2>
<hr/>
<?php
include_once 'produits.functions.php ';
if (isset($_GET['idcat'])) {
    $cat = getCategorie($_GET['idcat']);
    if ($cat != null) {
        echo '<h4>categorie : ' . $cat->nom . '</h4>';
        $produits = getProduits($_GET['idcat']);
    } else {
        echo '<h4>categorie : innexistante</h4>';
        $produits = getProduits();
    }
} else {
    $produits = getProduits();
}
// var_dump($produits);
// var_dump($cat);

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
for ($i = 0; $i < $produits->length(); $i++) {
    $pr = $produits->getProduit($i);
    ?><tr>
                <td class="produit-liste-image"><img src="<?=$pr->getImage()?>" alt=""></td>
                <td class="produit-liste-nom"><?=$pr->getNom()?></td>
                <td class="produit-liste-prix"><?php echo $pr->getPrix(); ?>€</td>
                <td class="produit-liste-buttons">
                    <a href="?action=edit&page=produit&idp=<?=$pr->getId()?>">
                        <button type="button" class="btn btn-warning">edit</button>
                    </a>
                    <a href="?page=produit&idp=<?=$pr->getId()?>">
                        <button type="button" class="btn btn-primary">voir</button>
                    </a>
                    <a href="?action=add&page=produits&idp=<?=$pr->getId()?>">
                        <button type="button" class="btn btn-info">ajout</button>
                    </a>
                </td>
            </tr>
        <?php
}
?>
    </tbody>
</table>
