<?php
 namespace Mouro\Controller\Api;
use Mouro\Core\Validator;
use Mouro\Core\Controller;          
use Mouro\Models\CategorieVente;
class CategorieVenteController extends Controller{


  
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
        if (Validator::validate()) {

            try {
                CategorieVente::create([
                    "libelle" => $data["libelle1"]
                ]);
             
             
             
            } catch (\PDOException $th) {
                Validator::$errors['libelle'] = "le libelle existe deja";
                // die($th->getMessage());
            }
        }
    }
           public function index(){   
          
                  $this->JsonEncode(CategorieVente::all()) ;
              
           }
           public function getCategorieVente()
           {
               $this->JsonEncode(CategorieVente::findDetailByCategorieVente($_SESSION['id']));
           }

           public function delete(){ 
                CategorieVente::deleted($_POST['id']);
                 $this->redirect("categorie_vente");
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


