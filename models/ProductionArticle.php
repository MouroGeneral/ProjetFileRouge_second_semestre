<?php 
namespace Mouro\Models;
use Mouro\Core\Model;
use Mouro\Models\ArticleVente;
class ProductionArticle extends Model{
    private  $id;
    private  $quantitePA;
    private  $dateProd;
    public  $idArticleVente;
    public  $prodId;

    protected static function tableName(){
        return 'productionarticle';
    }

    public  $articleModel;
    public function __construct()
    {
        $this->articleModel = new ArticleVente;
    }

    public function getId()
    {
             return $this->id;
    }

    public function setId($id)
    {
         if($id>0){
           $this->id = $id;
         }

             return $this;
    }


    public function getQuantite()
    {
        return $this->quantitePA;
    }
 
    public function setQuantite($qteStock)
    {
        $this->quantitePA = $qteStock;

        return $this;
    }

  /*   public function article(){
        return $this->articleModel->find($this->idArticleVente);
      } */
 
      public static function findDetailByProduction(int $prodId){
         return parent::query("select * from ".  self::tableName() ." where prodId=:prodId  ",["prodId"=>$prodId]);
      }


}