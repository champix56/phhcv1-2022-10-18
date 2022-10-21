<?php
//var_dump($_POST);
include_once 'produit.functions.php';
if(isset($_POST['idProduit'])){
    //soumission du formulaire

    //var_dump($_FILES); 
    //var_dump($_FILES['imageProduit']['name']);
    $uploadFileName=null;
    
    if(is_numeric($_POST['idProduit']))
    {
        $pr=new Produit($_POST['idProduit'],
            $_POST['nomProduit'],
            $_POST['descriptionProduit'],
            $_POST['prixProduit'],
            $_POST['eanProduit'],
            ($uploadFileName!=null?$uploadFileName:''),
            $_POST['categorieProduit']);
            //var_dump($pr);       
        putProduit($pr);
        produit_updateImage($_FILES['imageProduit'],$pr);
    }
    else{
       $pr=postProduit(
        new Produit($_POST['idProduit'],
        $_POST['nomProduit'],
        $_POST['descriptionProduit'],
        $_POST['prixProduit'],
        $_POST['eanProduit'],
        ($uploadFileName!=null?$uploadFileName:''),
        $_POST['categorieProduit'])
    );
    produit_updateImage($_FILES['imageProduit'],$pr);
       header('Location:?page=produit&action=edit&idp='.$pr->getId());
    }
}


$produit = null;
if (isset($_GET['idp'])) {
    $produit = getProduit($_GET['idp']);
}
?>
<div id="produit-form" style="padding:5px 25px;">
    <h2>Edition produit</h2>
    <form action="" method="POST" enctype="multipart/form-data" >
        <?php
if ($produit != null) {echo 'id:' . $produit->getId() . '<br/>';}
?>
        <input type="hidden" name="idProduit" value="<?=($produit != null) ? $produit->getId() : ''?>">
        <label for="nomProduit">Nom produit :</label>
        <input type="text" name="nomProduit" id="i_nomProduit"
            value="<?=($produit != null) ? $produit->getNom() : ''?>"><br />
        <label for="categorieProduit">Categorie</label>
        <select name="categorieProduit" id="i_categorieProduit">
            <?php
include_once 'include/pages/categories/categories.functions.php';
$categories = getCategories();
foreach ($categories as $cat) {
    echo '<option value="'.
            $cat['id'].
            '" '.
            (($produit != null && $produit->getIdcat()==$cat['id']) ? 'selected' : '').
            '>' .
            $cat['nom'] .
            '</option>';
}
?>
        </select>
        <hr />
        <div id="produit-form-content" style="display:flex">
            <div style="width:60%">
                <label for="descriptionProduit">Description</label><br />
                <textarea name="descriptionProduit" id="i_descriptionProduit" cols="30" rows="10"
                    style="margin-left:15%;width:70%;resize : none;"><?=($produit != null) ? $produit->description : ''?></textarea><br />
                <label for="eanProduit">barcode</label><br />
                <input type="text" name="eanProduit" id="i_eanProduit"
                    value="<?=($produit != null) ? $produit->getEAN() : ''?>"><br />
                <label for="prixProduit">Prix</label><br />
                <input type="number" name="prixProduit" id="i_prixProduit" min="0.01" step="0.01"
                    value="<?=($produit != null) ? $produit->getPrix() : ''?>">
            </div>
            <div style="flex-grow:1;padding:5px 15px;text-align:center">
                <label for="urlImageProduit">url image</label><br />
                <?php /* <input type="text" name="urlImageProduit" id="i_urlImageProduit" style="max-width:45vw;max-height:45vh;"value="<?=($produit != null) ? $produit->getImage() : ''?>"> */?>
                
                <input type="file" name="imageProduit" id="i_ImageProduit">

                <hr />
                <img src="<?=($produit != null) ? $produit->getImage() : ''?>" alt="" id="imageProduit">
            </div>
        </div>
        <hr />
        <div style="display:flex;justify-content:space-between;">
            <button type="reset" class="btn btn-warning">reset</button>
            <button type="submit" class="btn btn-info">valider</button>
        </div>
    </form>
</div>