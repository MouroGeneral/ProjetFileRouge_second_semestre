<?php
use Mouro\Core\Router;
use Mouro\Models\UniteController;
use Mouro\Models\Api\FournisseurController;
use Mouro\Controllers\Api\CategorieController;
use Mouro\Controller\ArticleConfectionController;

// Router::route("/api/categorie",[CategorieController::class,'index']);
Router::route("api/store-categorie",[CategorieController::class,'store']);
Router::route("/api/fournisseur",[FournisseurController::class,'index']);
Router::route("/api/store-fournisseur",[FournisseurController::class,'store']);
Router::route("/api/unite",[UniteController::class,'index']);
Router::route("/JS/categorie", [CategorieController::class, 'indexJs']);
Router::route("/api/categorie",[ ArticleConfectionController::class,'getCategorieConfection']);


