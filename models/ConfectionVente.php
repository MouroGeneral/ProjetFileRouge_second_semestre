<?php
namespace Mouro\Models;
use Mouro\Core\Model;
use Mouro\Models\ArticleConfection;
class ConfectionVente extends Model{
    public   $id;
    public  $qteCV;
    public  $articleConfId;
    public  $articleVenteId;
     protected static function tableName(){
               return "ConfectionVente";
      }
      public  $articleModel;
      public function __construct()
      {
          $this->articleModel = new ArticleConfection;
      }
      
      public function article(){
        return $this->articleModel-> find($this->articleConfId);
      }
 
      public static function findDetailByConfectionVente(int $articleVenteId){
         return parent::query("select * from ".  self::tableName() ." where articleVenteId=:articleVenteId  ",["articleVenteId"=>$articleVenteId]);
      }
      public function getId()
      {
         return $this->id;
      }

      public function setId($id)
      {
          $this->id = $id;
  
          return $this;
      }
  
      public function getQuantite()
      {
          return $this->qteCV;
      }
  
      public function setQuantite($qteCV)
      {
          $this->$qteCV = $qteCV;
          return $this;
      }
}