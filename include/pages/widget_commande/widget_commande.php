<?php
//example de lecture de fichier + deserialisation json-> obj(class instancié)
echo 'liste des commandes :';
    //lecture de la liste des contenus d'un repertoire
    $repContent=scandir('commandesTXT');
    
    print_r($repContent);

    //derniere position dans la liste 
    $lastPosition=count($repContent)-1;
    //chemin du fichier complet
    echo $lastJSONFile="commandesTXT/".$repContent[$lastPosition];
    //decodage json du flux lue
    $obj=json_decode(file_get_contents($lastJSONFile));
    //reinstanciation des objets avec nos classes
    $pn=new Panier();
    foreach ($obj as $row) {
        $pn->addProduit(new ProduitPanier($row->id,$row->nom,'',0,'0','',1,$row->qte));
    }
    var_dump($pn);
?>