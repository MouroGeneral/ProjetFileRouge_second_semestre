<?php
use Mouro\Core\Router;
use Mouro\Controllers\Api\CategorieController;
Router::route("/api/categorie",[CategorieController::class,'index']);
//Router::route("/api/categorie/add",[CategorieController::class,'index']);


