<?php
class Produits
{
    private $_produits=[];
    /**
     * Class constructor.
     */
    public function __construct()
    {
         
    }
    public  function add(Produit $pr)
    {
        array_push($this->_produits,$pr);
    }
    public function getById($id){
        $resultTab=array_filter($this->_produits,function($item)use($id){
            return $item->getId()==$id;
        });
        return (count($resultTab)>0?$resultTab[0]:null);
    }
    public function filterByIdcat($idcat){
        $resultTab=array_filter($this->_produits,function($item)use($idcat){
            return $item->idcat()==$idcat;
        });
        return (count($resultTab)>0?$resultTab:null);
    }
}

class Produit
{
    protected $id;
    protected $nom;
    private $prix;
    protected $ean;
    protected $image;
    protected $idcat;
    public $description;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img,$idcat)
    {  
        //set d'une valeur interne
        $this->id=$id;  
        $this->nom=$nom;  
        $this->description=$desc;  
        $this->prix=$prix;  
        $this->idcat=$idcat;  
        $this->img=$img;  
        $this->ean=$ean;  
    }
    public function getIdcat(){return $this->idcat;}
    public function setNom($value) {
        $this->nom=$value;
    } 
    public function saveToDB(){}
    protected function applyReduction($taux){
        $this->prix*=$taux;
    }
    public function getId(){return $this->id;}
    public function getPrix(){return $this->prix;}
}
class ProduitPanier extends Produit
{
    private $qte;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img,$idcat,$qte=1)
    {
        parent::__construct($id,$nom,$desc,$prix,$ean,$img,$idcat);
        $this->qte=$qte;
    }
    public function getQte(){return $this->qte;}
    public function add($qte=1){
        $this->qte+=$qte;
    }
    public function remove($quantite=1){
        if($this->qte>=$quantite){$this->qte -= $quantite;}
        else {$this->qte = 0;}
    }
    public function getNomAndID(){
        return $this->id.':'.$this->nom;
    }
    //exposition protected
    public function applyReduction($tx){parent::applyReduction($tx);}
    public static function convertProduit(Produit $pr) {
        return new ProduitPanier($pr->getId(), $pr->nom,$pr->description,$pr->getPrix(),$pr->ean,$pr->img,$pr->idcat);
    } 
}
 
class Panier{
    private Array $produits;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->produits=[];
    }
    public function addProduit(ProduitPanier $produit)
    {
        $tabOfResponse=array_filter($this->produits,function($item) use($produit) {
            return $item->getId()==$produit->getId();
        });
        if(count($tabOfResponse)>=1){
            //echo '<h2>present</h2>';
            $produitDuPanier=$tabOfResponse[0];
            $produitDuPanier->add(1);
            //var_dump($this->produits);
        }
        else{
            //echo '<h2>NON present</h2>';
            array_push($this->produits,$produit);
            //var_dump($this->produits);

        }
    }
    public function removeProduit($id)
    {
        $respTab=array_filter($this->produits,function ($item)use ($id) {
        return $item->getId()==$id;
        });
        if(count($respTab)>0 && $respTab[0]->getQte()>1){
            $respTab[0]->remove();
        }
        else if(count($respTab)>0){
            $position=array_search($respTab[0],$this->produits);
            array_splice($this->produits,$position,1);
        }
         
    }
    public function totalHT()
    {
        $total=0;
       foreach ($this->produits as $pr) {
        $total+=($pr->getQte()*$pr->getPrix());
       }
        return $total;
    }
}
