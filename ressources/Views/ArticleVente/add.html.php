<?php

use Mouro\Core\Session;

$errors = [];
if (Session::isset("errors")) {
    $errors = Session::get("errors");
    Session::unset("errors");
}
?>
<style>
    .success-message {
        color: green;
    }

    .error-message {
        color: red;
    }
</style>
<div class="container mt-5">
    <div class="card mt-5">
        <div class="card-body bg-white">
            <h4 class="card-title text-center mb-3"> Ajouter des Articles De Ventes </h4>
            <form class="row g-3" novalidate method="post">
                <input id="qteAppro" type="hidden" name="qteAppro" value="0">
                <input id="idAppro" type="hidden" name="idAppro" value="0">
                <div class="col-md-6 position-relative">
                    <label for="validationTooltip04" class="form-label">Articles Vente</label>
                    <input type="text" class="form-control" name="libelleVente" id="venteInput" value="">
                    <div id="feedbackMessage"></div>
                </div>

                <div class="col-md-3 position-relative">
              <label for="validationTooltip04" class="form-label" style=" margin-top: 3% ">Reference</label>
              <input type="text" class="form-control" name="uniteReference" id="reference" value="" disabled>
              
              <div class="invalid-feedback"> </div>
             
            </div>
            <div class="col-md-2 position-relative">
              <input type="file"  id="image" style="display: none">
              <label for="image"  >
              Photo
                <img src="<?=AssetImage("photo.png")?>" style=" width:150px; margin-top: 12%; height: 70px; ">
              </label>
              <div class="invalid-feedback"></div>
              
            </div>

            <div class="col-md-4 position-relative">
                <label for="validationTooltip04" class="form-label">Categorie de vente</label>
                <div class="form-group" style=" width: 100%; display: flex;">
                <select class="form-select" id="categorieventeSelect" name="id">
                    <option selected disabled value="">Selectionnez un Categorie</option>
                </select>
                <a href="#" class="clickable-icon"style="margin-top:12%;margin-left: 3%" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      <span class="material-symbols-outlined plus">
                          add_circle
                      </span>
                    </a>
                <div class="invalid-tooltip">
                    Please select a valid state.
                </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une nouvelle catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                 
                        <input type="text" id="libelle1" class="form-control" placeholder="Nouvelle catégorie">
                 
                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="submitBtn">Ajouter</button>
                  </div>
                 
                </div>
              </div>
            </div>

           
            <div class="col-md-4 position-relative">
                <label for="validationTooltip04" class="form-label">Taille</label>
                <div class="form-group" style=" width: 100%; display: flex;">
                <select class="form-select" id="tailleSelect" name="id">
                    <option selected disabled value="">Selectionnez une taille</option>
                </select>
                <a href="#" class="clickable-icon"style="margin-top:12%;margin-left: 3%" data-bs-toggle="modal" data-bs-target="#staticBackdropp">
                      <span class="material-symbols-outlined plus">
                          add_circle
                      </span>
                    </a>
                <div class="invalid-tooltip">
                    Please select a valid state.
                </div>
                </div>
            </div>


            <div class="modal fade" id="staticBackdropp" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une nouvelle taille</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                 
                        <input type="text" id="libelle2" class="form-control" placeholder="Nouvelle taille">
                 
                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="submitBtnn">Ajouter</button>
                  </div>
                 
                </div>
              </div>
            </div>

            <input type="button" class="btn btn-primary " style="background:green;height:100%;margin-top:8%;width:10%;margin-left:4%" id="addArticle" name="ok"  value="ok">

                <!-- <div class="col-md-4 btn2 position-relative">
                    <button class="btn btn-dark" type="submit" name="valider" style="background-color: green;color:white; " >Valider</button>
                </div> -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Libelle</th>
                            <th scope="col">Quantite</th>
                            
                        </tr>

                    </thead>
                    <tbody id="categoryTableBody">
              
                    </tbody>
                </table>
                <div class="col-md-3 position-relative">
                <label for="validationTooltip04" class="form-label">Cout de production</label>
                    <input type="text" class="form-control" name="production" id="ProductionInput" value="0">
                </div>
                <div class="col-md-3 position-relative">
                <label for="validationTooltip04" class="form-label">Montant:</label>
                    <input type="text" class="form-control" name="montant" id="montantInput" value="0">
                </div>

                <div class="col-md-3 position-relative">
                <label for="validationTooltip04" class="form-label">Prix de vente</label>
                    <input type="text" class="form-control" name="prixVente" id="prixInput" value="" >
                </div>

                <input type="submit" class="btn btn-primary " style="background:green;height:100%;margin-top:5%;margin-left:4.5%;width:10%" id="valide" name="Valider"  value="valider">

            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body bg-light">
            <h4 class="card-title">Liste des Articles</h4>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">LibelleArticle</th>                                       
                        <th scope="col">Taille</th>
                        <th scope="col">Prix</th>
                        <th scope="col">quantite</th>
                        <th scope="col">Montant</th>
                        <th scope="col">idCategorie</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                 
                                    <tbody id="tableau">
                                  
                                      </tbody>
                  
                </table>
            </div>
        </div>
    </div>

</div>
<script type="module" src="<?=AssetJs("core/taille.js") ?>" ></script>  
<script type="module" src="<?=AssetJs("core/articleVente.js") ?>" ></script>  

<!-- <script type="module" src="</?=AssetJs("core/article.js") ?>" ></script>  
<script type="module" src="</?=AssetJs("categorie/script.js") ?>" ></script>  
<script type="module" src="</?=AssetJs("core/unite.js") ?>" ></script>  
<script type="module" src="</?=AssetJs("core/fournisseur.js") ?>" ></script> -->