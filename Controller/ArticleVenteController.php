<?php 
namespace Mouro\Controller;
use Mouro\Models\ArticleVente;
use Mouro\Core\Controller;
class ArticleVenteController extends Controller{
    public function create(){
      
              // $this->renderJson($dataArticleVentes);
              ob_start();
              require("../ressources/Views/ArticleVente/add.html.php");
                $recuperateurVue = ob_get_clean();
              require("../ressources/Views/base.layout.html.php");
    }
    
    public function store(){
  
    }
    public  function index(){
      $data = ArticleVente::all();
      $page=1;
      if(isset($_GET['page'])) {
          $page = intval($_GET['page']);
       }
       $datas=paginnation($data, $page, 4);
       $nombrepage=get_nombre_page($data, 4);
       $this->view("ArticleVente/lister",[ "datas" => $datas],$nombrepage,$page);
       }
       
       public function delete(){

       }
       public function update(){
        
       }
 }
