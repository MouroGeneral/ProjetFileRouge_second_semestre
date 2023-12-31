<?php 
namespace Mouro\Controller\Api;
use Mouro\Models\Taille;
use Mouro\Core\Controller;
use Mouro\Models\ArticleVente;
use Mouro\Models\CategorieVente;

class ArticleVenteController extends Controller{
    public function create(){
      
    }
    
    public function store(){
      $data = json_decode(file_get_contents('php://input'), true);

   

          try {
              ArticleVente::create([
                  "libelle" => $data["venteInput"],
                  "taille" => $data["tailleSelect"],
                  "prixVente" => $data["prixInput"],
                  "montant" => $data["montantInput"],
                  "quantiteVente" => $data["ProductionInput"],
                  "idCategorieVente" => $data["categorieventeSelect"]
              ]);
              

           
          } catch (\PDOException $th) {
           
          }
     
    }

    public function getTaille(){
      $datas=Taille::all();
       $this->JsonEncode($datas);
    }
    public function getCategorieVente(){
      $datas=CategorieVente::all();
       $this->JsonEncode($datas);
    }
    public function getArticleVente(){
      $datas=ArticleVente::all();
       $this->JsonEncode($datas);
  }
    public  function index(){
      $this->JsonEncode(ArticleVente::all()) ;
       }
       
       public function delete(){

       }
       public function update(){
        
       }
 }
