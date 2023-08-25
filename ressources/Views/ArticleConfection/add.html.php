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
      <h4 class="card-title text-center mb-3"> Ajouter des Articles de Confection </h4>
      <form class="row g-3" novalidate method="post" action="<?= WEB_ROUTE ?>">
            <input id="qteAppro" type="hidden" name="qteAppro" value="0">
            <input id="idAppro" type="hidden" name="idAppro" value="0">
            <div class="col-md-3 position-relative">
                <label for="validationTooltip04" class="form-label">Articles Confection</label>
                <input type="text" class="form-control" name="libelle" id="ConfectionInput" value="">
                <div id="feedbackMessage"></div>
            </div>
           
            <div class="col-md-3 position-relative">
                <label for="validationTooltip02" class="form-label">Prix</label>
                <input type="number" class="form-control" name="prixAchat" id="validationTooltip02" value="">
                <div class="invalid-feedback">
                </div>
            </div>

            <!-- Votre HTML existant -->
            <div class="col md-6">
              <label for="" style="margin-top: 0%">Categorie</label>
                  <div class="form-group" style="margin-top: 6%; width: 100%; display: flex;">
                    <select class="form-control" name="id" id="categorieSelect" style="margin-top: -1%; height: 40px;">
                        <option value="0">choisir Categorie</option>
                        <!-- Les options de catégorie seront ajoutées ici -->
                    </select>
                    <a href="#" class="clickable-icon"style="margin-top: 1%;margin-left: 6%" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      <span class="material-symbols-outlined plus">
                          add_circle
                      </span>
                    </a>
                    <div id="message" style="color: red;"></div>
                  </div>
            </div>

            <!-- Le pop-up d'ajout de catégorie -->
            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une nouvelle catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                
                  <div class="modal-body">
                        <input type="text" id="libelle1" class="form-control" placeholder="Nouvelle catégorie">
                        <input type="text" id="unitedefaut" class="form-control" placeholder="Nouvelle unité">
                        <label for="libelle" class="form-label">Conversion</label>
                        <input type="text" class="form-control" id="conversion" value="1">
                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="submitBtn">Ajouter</button>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-3 position-relative">
                <label for="validationTooltip02" class="form-label">Quantite</label>
                <input type="number" class="form-control" name="qteArticle" id="validationTooltip02" value="">
                <div class="invalid-feedback">
                </div>
            </div>

                        <!-- Votre HTML existant -->
            <div class="col-md-3 position-relative" style="margin-top: 3%;">
              <label for="validationTooltip02" class="form-label">Unite</label>
              <div class="form-group" style="margin-top: 0%; width: 100%; display: flex;">

                <select class="form-control" name="idU" id="uniteSelect" style="margin-top: -1%; height: 40px;">
                  <option value="0">choisir unite</option>
                  <!-- Les options d'unité seront ajoutées ici -->
                </select>
                <a href="#" class="clickable-icon"style="margin-top: 1%;margin-left: 6%" data-bs-toggle="modal" data-bs-target="#unite">
                  <span class="material-symbols-outlined plus">
                    add_circle
                  </span>
                </a> 
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <!-- Le pop-up d'ajout d'unité -->
            <div class="modal fade" id="unite" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une nouvelle unité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="newUniteInput" class="form-control" placeholder="Nouvelle unité">
                    <div id="addUniteMessage" style="color: red;"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="addNewUniteBtn">Ajouter</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 position-relative">
              <label for="validationTooltip04" class="form-label">Fournisseur</label>
              <div class="form-group" style="margin-top: 0%; width: 100%; display: flex;">
                <input type="text" class="form-control" name="id" id="fournisseur" value="">
                <a href="#" class="clickable-icon3"style="margin-top: 6%;margin-left: 6%" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <span class="material-symbols-outlined">add_circle</span>
                </a>
                <div id="feedbackMessage"></div>
              </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un Fournisseur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Your form for adding supplier information goes here -->
                    <form id="addSupplierForm">
                      <div class="mb-3">
                        <label for="supplierName" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="supplierFistName" name="supplierFistName">
                    
                    
                        <label for="supplierName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="supplierName" name="supplierName">
                      </div>
                      <!-- Add more input fields for supplier details if needed -->
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="saveSupplierButton">Enregistrer</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 position-relative">
              <label for="validationTooltip02" class="form-label">Reference</label>
              <input type="hiden" class="form-control" name="uniteReference" id="validationTooltip02" value="">
              
              <div class="invalid-feedback"> </div>
              <div class="col-md-6 position-relative">

                    <label for="validationTooltip02" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="Photo" id="validationTooltip02" value="">
                    <div class="invalid-feedback"></div>
                    
                    <input type="submit" class="btn btn-primary " style="background:green;height:40px;margin-top:4%;width:100%" id="valide" name="Valider"  value="valider">
              </div>
            </div>
      </form>
    </div>
        <table class="table">
          <thead>
              <tr>
                  <th scope="col">Article</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Quantite</th>
                  <th scope="col">Unite</th>
                  <th scope="col">Fourniseur</th>
                  <th scope="col">Reference</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
        </table>
  </div>
</div>
<script type="module" src="<?=AssetJs("core/article.js") ?>" ></script>  
<script type="module" src="<?=AssetJs("categorie/script.js") ?>" ></script>  
<script type="module" src="<?=AssetJs("core/unite.js") ?>" ></script>  
<script type="module" src="<?=AssetJs("core/fournisseur.js") ?>" ></script>  

<!--  -->
 
<!-- Votre JavaScript pour l'ajout d'unité -->
<!-- <script>

</script> -->
<!-- Votre JavaScript pour la validation -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const confectionInput = document.getElementById("ConfectionInput");
    const prixInput = document.getElementById("validationTooltip02");
    const quantiteInput = document.getElementById("validationTooltip02"); // Utilisez un ID unique ici
    const uniteSelect = document.getElementById("uniteSelect");
    const fournisseurInput = document.getElementById("fournisseur");
    const valideform = document.getElementById("valide");

    valideform.addEventListener('click', function (event) {
      let isValid = true;

      // Validation pour le champ Confection
      if (confectionInput.value.trim() === "") {
        isValid = false;
        showErrorMessage("Veuillez remplir le champ Articles Confection", confectionInput);
      }

      // Validation pour le champ Prix
      if (prixInput.value === "") {
        isValid = false;
        showErrorMessage("Veuillez remplir le champ Prix", prixInput);
      }

      // Validation pour le champ Quantité
      if (quantiteInput.value === "") {
        isValid = false;
        showErrorMessage("Veuillez remplir le champ Quantité", quantiteInput);
      }

      // Validation pour le champ Unité
      if (uniteSelect.value === "0") {
        isValid = false;
        showErrorMessage("Veuillez choisir une unité", uniteSelect);
      }

      // Validation pour le champ Fournisseur
      if (fournisseurInput.value.trim() === "") {
        isValid = false;
        showErrorMessage("Veuillez remplir le champ Fournisseur", fournisseurInput);
      }

      // Si la validation a échoué, empêche la soumission du formulaire
      if (!isValid) {
        event.preventDefault();
      }
    });

    // Fonction pour afficher un message d'erreur
    function showErrorMessage(message, inputElement) {
      const feedbackMessage = inputElement.parentElement.querySelector(".invalid-feedback");
      feedbackMessage.textContent = message;
      inputElement.classList.add("is-invalid");
    }
  });
</script>


