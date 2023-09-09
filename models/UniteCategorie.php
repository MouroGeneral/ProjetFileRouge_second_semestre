<?php 
namespace Mouro\Models;
use Mouro\Core\Model;
use Mouro\Models\Unite;
use Mouro\Models\Categorie;
/**
 * A-Convention sur les Classe
 * 1-Nom Classe PascalCase   Exemple : MaClasse  CategorieModel
 * 2-Les classes portent le meme nom que le fichier
 * 
 *    
 */

 class  UniteCategorie extends Model{
    public  $id;
    public  $idUnite;
    public  $idCategorie;
   

    public  Categorie $CategorieModel;
   
     public function categorie(){
        return $this->CategorieModel-> find($this->idCategorie);
      } 
      public Unite $UniteModel;
     public function unite(){
      return $this->UniteModel-> find($this->idUnite);
    }
      protected static function tableName(){
        return "unite-categorie";
  }
 
      public static function findDetailByCategorie(int $idCategorie){
         return parent::query("select * from ".  self::tableName() ." where idCategorie=:idCategorie  ",["idCategorie"=>$idCategorie]);
      }
       //Attributs   ==> Donnees ou informations
         //Convention 
           //1-camelCase  ==> Exemple: monAttribut
        //Formalisme
        //[visibilite(private(-)|public(+)|protected(#)) ] type(php 8>) $attribut
       
        public function getId()
        {
            return $this->id;
        }
    
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;
    
            return $this;
        }
         

 }