<?php 
namespace Mouro\Models;
use Mouro\Core\Model;
/**
 * A-Convention sur les Classe
 * 1-Nom Classe PascalCase   Exemple : MaClasse  CategorieModel
 * 2-Les classes portent le meme nom que le fichier
 * 
 *    
 */

 class UniteCategorie extends Model{
    public  $idUC;
    public $idCategorie;
    public $idUnite;


   /*  public function article(){
        return $this->articleModel-> find($this->articleConfId);
      } */
      protected static function tableName(){
        return "unite-categorie";
  }
 
      public static function findDetailByCategorie(int $idCategorie){
         return parent::query("select * from ".  self::tableName() ." where idCategori=:idCategori  ",["idCategori"=>$idCategorie]);
      }
       //Attributs   ==> Donnees ou informations
         //Convention 
           //1-camelCase  ==> Exemple: monAttribut
        //Formalisme
        //[visibilite(private(-)|public(+)|protected(#)) ] type(php 8>) $attribut
       
    
         

 }