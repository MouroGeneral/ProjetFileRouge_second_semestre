<?php
use Mouro\Core\Router;
use Mouro\Models\Taille;
use Mouro\Controller\Api\UniteController;
use Mouro\Controller\Api\TailleController;
use Mouro\Controller\Api\ArticleVenteController;
use Mouro\Controller\Api\CategorieController;
use Mouro\Controller\Api\FournisseurController;
use Mouro\Controller\Api\CategorieVenteController;
use Mouro\Controller\Api\ArticleConfectionController;

Router::route("/api/categorie",[CategorieController::class,'index']);
Router::route("/api/categorievente",[CategorieVenteController::class,'index']);
Router::route("/api/categorie-store",[CategorieController::class,'store']);
Router::route("/api/taille-store",[TailleController::class,'store']);
Router::route("/api/categorie-vente-store",[CategorieVenteController::class,'store']);
Router::route("/api/fournisseur",[FournisseurController::class,'index']);
Router::route("/api/article-ind",[ArticleConfectionController::class,'index']);
Router::route("/api/article-vente",[ArticleVenteController::class,'index']);
Router::route("/api/fournisseur-store",[FournisseurController::class,'store']);
Router::route("/api/unite",[UniteController::class,'index']);
Router::route("/api/unite-store",[UniteController::class,'store']);
Router::route("/JS/categorie", [CategorieController::class, 'indexJs']);

Router::route("/api/categorie-getUnite", [CategorieController::class, 'getUnite']);
Router::route("/api/UniteByCategorie", [CategorieController::class, 'getUniteCategorie']);
