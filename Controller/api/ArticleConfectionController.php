<?php

namespace Mouro\Controller\Api;

use Mouro\Core\Validator;
use Mouro\Core\Controller;
use Mouro\Models\ArticleConfection;


class ArticleConfectionController extends Controller
{
 /**
  * lister Categorie
  *
  * @return mixed
  */
 public function index(){
    $this->JsonEncode(ArticleConfection::all()) ;
  
 }




 // Instanciez le contrôleur


 // Traitez la requête pour obtenir les données JSON

 /**
  * charger le Formulaire de Categorie
  *
  * @return mixed
  */
 public function create()
 {
 }

 /**
  * Ajouter une  Categorie en BD apres 
  * soummition du formulaire
  *
  * @return mixed
  */
 public function store()
 {
  $data = json_decode(file_get_contents('php://input'), true);
  //Validator::isNumeric($data["prix"], "prixAchat");
$libelle= $data['libelle2'];
$prixAchat= $data['prix'];
$idCategorie= $data['CategorieSelect'];
$imageData= $data['image'];

   try {
   

    ArticleConfection::create([
     "libelle" => $libelle,
     "qteStock" => $data["quantite"],
     "prixAchat" => $prixAchat,
     "photo" => $imageData,
     "reference" => $data["reference"],
     "idCategorie" => $idCategorie,
     "idFournisseur" => $data["fournisseur"]
    ]);
    
         $response = ['success' => true];
   echo json_encode($response);
} catch (\PDOException $th) {
   // Handle database errors
   http_response_code(500);
   $response = ['success' => false, 'error' => 'Database error'];
   echo json_encode($response);
}
 }
 public  function delete(){

 }
 public  function update(){

 }
}