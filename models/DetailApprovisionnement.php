<?php
namespace Mouro\Models;
use Mouro\Core\Model;
use Mouro\Models\ArticleConfection;
class DetailApprovisionnement extends Model{
    public   $id;
    public  $qteStock;
    public  $articleConfId;
    public  $approId;
     protected static function tableName(){
               return "detail_appro_article_conf";
      }
      public  $articleModel;
      public function __construct()
      {
          $this->articleModel = new ArticleConfection;
      }
      
      public function article(){
        return $this->articleModel-> find($this->articleConfId);
      }
 
      public static function findDetailByAppro(int $approId){
         return parent::query("select * from ".  self::tableName() ." where approId=:approId  ",["approId"=>$approId]);
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
          return $this->qteStock;
      }
  
      public function setLibelle($libelle)
      {
          $this->qteStock = $libelle;
          return $this;
      }
}

