<?php
 namespace Mouro\Controller\Api;
use Mouro\Models\Taille;
use Mouro\Core\Validator;
use Mouro\Core\Controller;
class TailleController extends Controller{
  
           public function create(){
            ob_start();
            require("../ressources/Views/Taille/lister.js.html.php");
              $recuperateurVue = ob_get_clean();
            require("../ressources/Views/base.layout.html.php");
           }

       
            public function store() {
          //dd('Mouro General');
        $data = json_decode(file_get_contents('php://input'), true);

        Validator::isVide($data["libelle2"], "libelleT");
        if (Validator::validate()) {

            try {
             Taille::create([
                    "libelleT" => $data["libelle2"]
                ]);
             
             
             
            } catch (\PDOException $th) {
                Validator::$errors['libelleT'] = "le libelle existe deja";
                // die($th->getMessage());
            }
        }
    }
    
           public function index(){   
                 
                  $this->JsonEncode(Taille::all()) ;
              
           }

           public function delete(){ 
                Taille::deleted($_POST['idTaille']);
                 $this->redirect("taille");
           }

           public function indexUpdate(){
            $data = Taille::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("Taille/lister",[ "datas" => $datas],$nombrepage,$page);
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


