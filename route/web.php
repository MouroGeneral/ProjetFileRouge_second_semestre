<?php

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



Router::route("/js/categorie", [CategorieController::class, 'indexJs']);
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
Router::route("/taille-add-select",[ ArticleVenteController::class,'getTaille']);
Router::route("/categorie-vente-select",[ ArticleVenteController::class,'getCategorieVente']);

Router::route("/saisir-fournisseur",[ ArticleConfectionController::class,'getFourniseur']);
Router::route("/categorie-select",[ ArticleConfectionController::class,'getCategorieConfection']);
Router::route("/article-select",[ ArticleConfectionController::class,'getArticle']);
Router::route("/article-vente-select",[ ArticleVenteController::class,'getArticleVente']);
