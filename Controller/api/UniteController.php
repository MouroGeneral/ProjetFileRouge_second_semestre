<?php
 namespace Mouro\Controller\Api;
use Mouro\Models\Unite;
use Mouro\Core\Validator;
use Mouro\Core\Controller;
class UniteControler extends Controller{
  
           public function create(){
            ob_start();
            require("../ressources/Views/Unite/lister.js.html.php");
              $recuperateurVue = ob_get_clean();
            require("../ressources/Views/base.layout.html.php");
           }
           public function store(){
            Validator::isVide($_POST['libelle'],"libelle");
            if(Validator::validate()){

              try {
                Unite::create([
                  "libelleU" => $_POST['libelleU']
                 ]);
              } catch (\PDOException $th) {
                Validator::$errors["libelleU"] = "cette categorie existe deja dans la base de donnés";
              }
               
            }
                   $this->redirect("unite");
           }
           public function index(){   
                 
                  $this->JsonEncode(Unite::all()) ;
              
           }

           public function delete(){ 
                Unite::deleted($_POST['idUnite']);
                 $this->redirect("unite");
           }

           public function indexUpdate(){
            $data = Unite::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("Unite/lister",[ "datas" => $datas],$nombrepage,$page);
       }
            public function update(){
              // Validator::isVide($_POST['libelle'],"libelle");
              // if(Validator::validate()){
              //   try {
              //     Categorie::updated($_SESSION["id"],[
              //       "libelle" => $_POST['libelle']
              //      ]);
              //   } catch (PDOException $th) {
              //     Validator::$errors["libelle"] = "cette categorie existe deja dans la base de donnés";
              //   }
                 
              // }
              //   Session::set("errors",Validator::$errors);
              //        $this->redirect("categorie");
           }
}


