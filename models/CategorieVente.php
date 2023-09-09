<?php
namespace Mouro\Models;
use Mouro\Core\Model;
class CategorieVente extends Model{
    public  $id;
    public  $libelle;
    protected static function tableName(){
        return 'categorie_vente';
    }
    public static function  findDetailByCategorieVente(int $idCategorieVente){
        return parent::query("select * from ".  self::tableName() ." where idT=:idT  ",["idT"=>$idCategorieVente]);
     }
       public function getId(){
        return $this->id;
    }
    public function setId($id){
        if($id>0){
            $this->id = $id;
        } 
        return $this;
    }
    public function getLibelle(){
        return $this->libelle;
    }
    public function setLibelle($libelle){
        return $this->libelle = $libelle;
        
    }

}