<?php
/* $categorieController = new CategorieController;
$categorieVenteController = new CategorieVenteController;
$articleConfectionController = new ArticleConfectionController;
$articleVente = new ArticleVenteController;
$approvisionnement = new ApprovisionnementController;
$detailapprovisionnement = new DetailApprovisionnementController;
$production = new ProductionController;
$productionArticle = new ProductionArticleController;
$confectionvente  = new ConfectionVenteController;
$vente = new VenteController;



if(isset($_REQUEST['path'])){
        $path = $_REQUEST['path'];
        if ($path == "categorie") {
            $categorieController->index();
        }elseif ($path == "article_confection"){
            $articleConfectionController->index();  
        }elseif ($path == "categorie_vente"){
            $categorieVenteController->index();
        }elseif ($path == "article_vente"){
               $articleVente->index();
        }elseif ($path == "approvisionnement"){
            $approvisionnement->index();
       } elseif ($path == "detail_approvisionnement"){
             $_SESSION['id'] = $_GET['id'];
             $data = Approvisionnement::find($_SESSION['id']);
              $_SESSION["data"] = $data ; 
             $detailapprovisionnement->index();    
       }elseif ($path == "store-categorie"){
             $categorieController->store();   
        }elseif ($path == "add"){
             $articleConfectionController->create();
        }elseif ($path == "article-store"){
            $articleConfectionController->store();
        }elseif ($path == "filtrer"){
            $approvisionnement->filtre();
         }elseif ($path == "update-paiement-appro"){
            $approvisionnement->updatePaiement();
         }elseif ($path == "add-approvisionnement"){
            $approvisionnement->create();
         }elseif($path == "approvisionnement-store"){   
            $approvisionnement->store();
         }elseif($path == "deleting"){
            $categorieController->delete();
         }elseif($path == "modification-categorie"){
            $_SESSION['id'] = $_GET['id'];
            $categorieController->update();
         }elseif($path == "modification"){
            $categorieController->index();
          }elseif($path == "getdata-store"){
             $approvisionnement->store();
          }elseif($path == "deleting-approvisionnement"){
              $_SESSION['id'] = $_GET['id'];
              $approvisionnement->delete();
         }elseif($path == "production-list"){
              $production->index();
         }elseif($path == "production-add"){
            $production->create();
         }elseif($path == "production-store"){
            $production->store();
         }elseif($path == "delete-line"){
            $production->store();
         }elseif($path == "production-detail"){
               $_SESSION['id'] = $_GET['id'];
               $data = Production::find($_SESSION['id']);
               $_SESSION['data'] = $data;
               $productionArticle->index();
         }elseif($path == "articleVente-add"){
                   $articleVente->create();
         }elseif($path == "vente-store"){
               $articleVente->store();
         }elseif($path == "articleVente-detail"){
              $_SESSION['id'] = $_GET['id'];
             $confectionvente->index();
          }elseif($path == "production-add-java"){
                 $production->productionJava();
          }elseif($path == "vente-list"){
                $vente->index();
           }elseif($path == "vente-add"){
                $vente->create();
           }elseif($path == "confectionvente-store"){
                $confectionvente->store();
           }elseif($path == "confectionvente-add"){
                $confectionvente->create();
           }
       
         
} */


use Mouro\Core\Router;
use Mouro\Controller\CategorieController;
use Mouro\Controller\VenteController;
use Mouro\Controller\ProductionController;
use Mouro\Controller\ArticleVenteController;
use Mouro\Controller\CategorieVenteController;
use Mouro\Controller\ConfectionVenteController;
use Mouro\Controller\ApprovisionnementController;
use Mouro\Controller\ArticleConfectionController;
use Mouro\Controller\ProductionArticleController;



Router::route("/JS/categorie", [CategorieController::class, 'indexJs']);
Router::route("/categorie", [CategorieController::class, 'index']);
Router::route("/store-categorie",[CategorieController::class,'store']);
Router::route("/deleting",[CategorieController::class,'delete']);
Router::route("/modification-categorie",[CategorieController::class,'update']);
Router::route("/modification",[CategorieController::class,'index']);
Router::route("/article_confection",[ArticleConfectionController::class,'index']);
Router::route("/add",[ArticleConfectionController::class,'create']);
Router::route("/article-store",[ArticleConfectionController::class,'store']);
Router::route("/categorie_vente",[CategorieVenteController::class,'index']);
Router::route("/article_vente",[ ArticleVenteController::class,'index']);
Router::route("/articleVente-add",[ ArticleVenteController::class,'create']);
Router::route("/vente-store",[ ArticleVenteController::class,'store']);
Router::route("/approvisionnement",[ ApprovisionnementController::class,'index']);
Router::route("/getdata-store",[ ApprovisionnementController::class,'store']);
Router::route("/approvisionnement-add",[ ApprovisionnementController::class,'create']);
Router::route("/approvisionnement-store",[ ApprovisionnementController::class,'store']);
Router::route("/deleting-approvisionnement",[ ApprovisionnementController::class,'delete']);
Router::route("/production-list",[ ProductionController::class,'index']);
Router::route("/production-add",[ ProductionController::class,'create']);
Router::route("/production-store",[ ProductionController::class,'store']);
Router::route("/production-add-java",[ ProductionController::class,'productionJava']);
Router::route("/delete-line",[ ProductionController::class,'store']);
Router::route("/production-detail",[ ProductionArticleController::class,'index']);
Router::route("/articleVente-detail",[ ConfectionVenteController::class,'index']);
Router::route("/confectionvente-add",[ ConfectionVenteController::class,'create']);
Router::route("/confectionvente-store",[ ConfectionVenteController::class,'store']);
Router::route("/vente-list",[ VenteController::class,'index']);
Router::route("/vente-add",[ VenteController::class,'create']);
Router::route("/confectionvente-add-select",[ ConfectionVenteController::class,'getArticleConfection']);
Router::route("/unite-add-select",[ ArticleConfectionController::class,'getUnite']);
Router::route("/saisir-fournisseur",[ ArticleConfectionController::class,'getFourniseur']);

