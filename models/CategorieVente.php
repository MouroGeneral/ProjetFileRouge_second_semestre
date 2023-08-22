<?php
namespace Mouro\Models;
use Mouro\Core\Model;
class CategorieVente extends Model{
    private  $id;
    private  $libelle;
    protected static function tableName(){
        return 'categorie_vente';
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