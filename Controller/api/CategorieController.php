<?php
 namespace Mouro\Controller\Api;
use Mouro\Models\Unite;
use Mouro\Core\Validator;
use Mouro\Core\Controller;
use Mouro\Models\Categorie;
use Mouro\Models\UniteCategorie;
class CategorieController extends Controller{
  
           public function create(){
            // ob_start();
            // require("../ressources/Views/CategorieConfection/lister.js.html.php");
            //   $recuperateurVue = ob_get_clean();
            // require("../ressources/Views/base.layout.html.php");
           }
           public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        Validator::isVide($data["libelle1"], "libelle");
        Validator::isVide($data["unitedefaut"], "libelleU");
        if (Validator::validate()) {

            try {
                $categorie = Categorie::create([
                    "libelle" => $data["libelle1"]
                ]);
                $unite = Unite::create([
                    "libelleU" => $data["unitedefaut"],
                    "conversion" => $data["conversion"]
                ]);
                UniteCategorie::create([
                  "idUnite" => $unite->id,
                  'idCategorie' => $categorie->id
                ]);
            } catch (\PDOException $th) {
                Validator::$errors['libelle'] = "le libelle existe deja";
                // die($th->getMessage());
            }
        }
    }
           public function index(){   
                 
                  $this->JsonEncode(Categorie::all()) ;
              
           }

           public function delete(){ 
                Categorie::deleted($_POST['idCategorie']);
                 $this->redirect("categorie");
           }

           public function indexUpdate(){
            $data = Categorie::all();
            $page=1;
            if(isset($_GET['page'])) {
                $page = intval($_GET['page']);
             }
            $datas=paginnation($data, $page, 4);
            $nombrepage=get_nombre_page($data, 4);
        $this->view("CategorieConfection/lister",[ "datas" => $datas],$nombrepage,$page);
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
?>


