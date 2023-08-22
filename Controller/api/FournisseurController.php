<?php
 namespace Mouro\Controller\Api;
use Mouro\Core\Validator;
use Mouro\Core\Controller;
use Mouro\Models\Fournisseur;

class FournisseurController extends Controller{
  
           public function create(){
            ob_start();
            require("../ressources/Views/Fournisseur/lister.js.html.php");
              $recuperateurVue = ob_get_clean();
            require("../ressources/Views/base.layout.html.php");
           }
           public function store(){
            $data = json_decode(file_get_contents('php://input'),true);
            Validator::isVide(['nomF'],"nomF");
            Validator::isVide(['prenomF'],"prenomF");
            if(Validator::validate()){

              try {
                Fournisseur::create([
                  "nomF" => $data['nomF'],
                  "prenomF" =>$data ['prenomF']
                 ]);
              } catch (\PDOException $th) {
                Validator::$errors["nomF"] = "cette fournisseur existe deja dans la base de donnés";
              }
               
            }
                   $this->redirect("fournisseur");
           }
           public function index(){   
                 
                  $this->JsonEncode(Fournisseur::all()) ;
              
           }

           public function delete(){ 
            Fournisseur::deleted($_POST['idFournisseur']);
                 $this->redirect("fournisseur");
           }

           public function indexUpdate(){
            $data = Fournisseur::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("Fournisseur/lister",[ "datas" => $datas],$nombrepage,$page);
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


