<?php
 namespace Mouro\Controller\Api;
use Mouro\Models\Unite;
use Mouro\Core\Validator;
use Mouro\Core\Controller;          
use Mouro\Models\Categorie;
use Mouro\Models\UniteCategorie;
class CategorieController extends Controller{
    public function getUnite()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $data;
        $_SESSION['id'] = $data['idCategorie'];
        // $this->JsonEncode(UniteCategorie::findDetailByAppro(20));
    }

    public function getUniteCategorie()
    {
        $this->JsonEncode(UniteCategorie::findDetailByCategorie($_SESSION['id']));
    }
           public function create(){
           
            // ob_start();
            // require("../ressources/Views/CategorieConfection/lister.js.html.php");
            //   $recuperateurVue = ob_get_clean();
            // require("../ressources/Views/base.layout.html.php");
           }
           public function store() {
          // dd('Mouro General');
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
                    'idCategorie' => $categorie->id,
                    "idUnite" => $unite->id,
                    "libelle" => $data["unitedefaut"],
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
                Categorie::deleted($_POST['id']);
                 $this->redirect("categorie");
           }

           public function indexUpdate(){
            
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


