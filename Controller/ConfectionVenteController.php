<?php
namespace Mouro\Controller;
use Mouro\Core\Controller;
use Mouro\Models\ConfectionVente;
use Mouro\Models\ArticleConfection;
class ConfectionVenteController extends Controller
{
    public function create()
    {
          // $this->renderJson($dataArticleVentes);
          ob_start();
          require("../ressources/Views/ConfectionVente/add.html.php");
            $recuperateurVue = ob_get_clean();
          require("../ressources/Views/base.layout.html.php");
    }
    public function store()
    {
            
    }
    public function index()
    {
        $datass =  ConfectionVente::findDetailByConfectionVente($_SESSION['id']);
        $page=1;
        if(isset($_GET['page'])){
            $page = intval($_GET['page']);
        }
        $datas=paginnation($datass, $page, 4);
        $nombrepage=get_nombre_page($datass, 4);
        $this->view("ConfectionVente/lister", [ "datas" => $datas], $nombrepage, $page);
        
    }
    public function delete(){

    }
    public function update(){
     
    }
    public function getArticleConfection(){
        $datas=ArticleConfection::all();
         $this->JsonEncode($datas);
    }
}