<?php
  include_once 'include/functions/class.php';
  include_once 'include/pages/produit/produit.functions.php';
  if(isset($_SESSION['panier']) && ($_SESSION['panier'] instanceof Panier) ){
    //echo '<h2>reopened</h2>';
    //on un panier de pret
  }
  else {
    //echo '<h2>new</h2>';

    $_SESSION['panier']=new Panier();
  }
  $panier=$_SESSION['panier'];
//ajout au panier si action = add
  if(isset($_GET['action'])&& $_GET['action']=='add' && isset($_GET['idp'])){
    $produit=getProduit($_GET['idp']);
    //protection id innexistant
    if($produit !=null){
      $produitPanier=ProduitPanier::convertProduit($produit);
      $panier->addProduit($produitPanier);
    }
  }
  //remove du panier
  if(isset($_GET['action'])&& $_GET['action']=='remove' && isset($_GET['idp'])){
    $panier->removeProduit($_GET['idp']);
  }
  if(isset($_GET['action'])&& $_GET['action']=='validate_cart'){
    $arr_date=getdate();
    $fileName="commandesTXT/".$arr_date['hours']."-".$arr_date['minutes']."-".$arr_date['seconds'].".json";
    
   
    $json=$panier->getJSON();
    file_put_contents($fileName,$json);
    $panier->clearPanier();
  }

//  var_dump($_SESSION);
//var_dump($panier);

?>
<style>
    #w-panier {display: flex;flex-direction: column;padding: 5px;}
    .w-panier-produit {display: flex;}
    .w-panier-produit td{padding: 2px 15px;}
    .w-panier-produit-img{max-width:128px;height: 100px;size: auto;}
    .w-panier-produit-content-body{min-width:200px;}
    .w-panier-produit-content-body>div:nth-child(1){text-decoration: underline;font-size: large;font-weight: 900;}
    .w-panier-produit-content-body .qte{font-style: italic;}
    /* .w-panier-produit-content-body>div:nth-child(2){font-style: italic;} */
    .w-panier-produit-total{text-align: right;padding-right: 10px;}
    .w-panier-produit-buttons{text-align: center;}
    .w-panier-produit-buttons>button{padding: 0 5px;height: 20px; font-size: 8px;}
  </style>
  <div id="w-panier">
    <?php 
    for ($i=0; $i <$_SESSION['panier']->length() ; $i++) { 
      $pr=$_SESSION['panier']->getProduit($i);
  ?>    
      <div class="w-panier-produit">
      <table class="w-panier-produit-table">
        <tr>
          <td><img class="w-panier-produit-img" src="<?=$pr->getImage()?>" alt="" /></td>
          <td class="w-panier-produit-content-body">
            <div><?= $pr->getNom() ?></div>
            <div class="qte"><?php echo  $pr->getQte().' x '.$pr->getPrix();?></div>
            <div class="w-panier-produit-buttons">
              <a href="?action=remove<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>&idp=<?=$pr->getId()?>">
                <button type="button" class="btn btn-warning">-</button>
              </a>
              <a href="?action=add<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>&idp=<?=$pr->getId()?>">
                <button type="button" class="btn btn-info">+</button>
              </a>
            </div>
          </td>
          <td><?=$pr->getQte()*$pr->getPrix();?>€</td>
        </tr>
      </table>
    </div>
    <?php } ?>
    <hr />
     <div class="w-panier-produit-total">Total : <?=$_SESSION['panier']->totalHT()?></div>
  
    <a href="?action=validate_cart<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>"><button type="button" class="btn btn-primary">valider<br/>panier</button></a>
  </div>
  