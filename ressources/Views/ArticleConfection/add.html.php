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

                <select class="form-control" name="idU" id="uniteSelect" style="margin-top: -1%; height: 40px;" >
                  <option value="0">choisir unite</option>
                  <!-- Les options d'unité seront ajoutées ici -->
                </select>
                <a href="#"  class="clickable-icon"style="margin-top: 1%;margin-left: 6%" data-bs-toggle="modal" data-bs-target="#unite" >
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
                    <label for="libelle" class="form-label">Conversion</label>
                    <div id="addUniteMessage" style="color: red;"></div>
                    <input type="text" class="form-control" id="conversion" value="1">
                    <div id="addConverMessage" style="color: red;"></div>
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
              <input type="text" name="idFournisseur" class="form-control" id="fournisseur">
              
              <a href="#" class="clickable-icon3" data-bs-toggle="modal" data-bs-target="#exampleModal" id="fournisseurBtn" style="margin-top: 5%; margin-left:5%" >
                  <span class="material-symbols-outlined">add_circle</span>
                </a>
                <div id="feedbackMessage"></div>
               
              </div>
              <small class="error-message">Error message</small>
            <div id="checkboxContainere" class="checked"></div>

            </div>


            <div class="col-md-3 position-relative">
              <label for="validationTooltip02" class="form-label">Reference</label>
              <input type="hiden" class="form-control" name="uniteReference" id="validationTooltip02" value="" disabled>
              
              <div class="invalid-feedback"> </div>
             
            </div>
            
            <div class="col-md-3 position-relative">
              Photo
              <input type="file"  id="image" style="display: none">
              <label for="image"  >
                <img src="<?=AssetImage("photo.png")?>" style=" width: 50%; height: 50%; margin-top: 7%; ">
              </label>
              <div class="invalid-feedback"></div>
              
            </div>
            <input type="submit" class="btn btn-primary " style="background:green;height:40px;margin-top:4%;width:10%" id="valide" name="Valider"  value="valider">
            
            <!-- Fournisseur Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fournisseur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form novalidate id="addFournisseur">
        <div class="modal-body">
          <div class="mb-3">
            <label for="libelle" class="form-label">Categorie</label>
            <input type="text" class="form-control" id="libelle3" disabled>
          </div>
          <div class="mb-3">
            <label for="libelle" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenomF">
          </div>
          <div class="mb-3">
            <label for="libelle" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nomF">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" id="submitBtnefour">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>            

      </form>
    </div>
        <table class="table">
          <thead>
              <tr>
                  <th scope="col">Article</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Quantite</th>
                  <th scope="col">Reference</th>
                  <th scope="col">Photo</th>
            
              </tr>
          </thead>
          <tbody id="tbody">
              
          </tbody>
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
<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
    const categorieSelect = document.getElementById("categorieSelect");
    const uniteSelect = document.getElementById("uniteSelect");
    const fournisseurInput = document.getElementById("fournisseur");
    const newUniteInput = document.getElementById("newUniteInput");
    const submitBtn = document.getElementById("submitBtn");
    const addNewUniteBtn = document.getElementById("addNewUniteBtn");
    const saveSupplierButton = document.getElementById("saveSupplierButton");

    // Catégorie par défaut dans le formulaire principal
    categorieSelect.addEventListener("change", function() {
        document.querySelector(`#categorieSelect option[value="${this.value}"]`).selected = true;
    });

    // Unité par défaut dans le formulaire principal
    uniteSelect.addEventListener("change", function() {
        document.querySelector(`#uniteSelect option[value="${this.value}"]`).selected = true;
    });

    // Générer la liste des fournisseurs"Fournisseur1", "Fournisseur2", "Fournisseur3"
    const allSuppliers = []; // Exemple de liste
    fournisseurInput.addEventListener("input", function() {
        const inputValue = this.value.toLowerCase();
        const filteredSuppliers = allSuppliers.filter(supplier => supplier.toLowerCase().startsWith(inputValue));
        
        // Créer une liste de choix
        const suggestionList = document.createElement("div");
        suggestionList.classList.add("suggestion-list");
        filteredSuppliers.forEach(supplier => {
            const suggestionItem = document.createElement("div");
            suggestionItem.textContent = supplier;
            suggestionItem.classList.add("suggestion-item");
            suggestionItem.addEventListener("click", function() {
                fournisseurInput.value = supplier;
                suggestionList.innerHTML = "";
            });
            suggestionList.appendChild(suggestionItem);
        });
        
        this.parentNode.appendChild(suggestionList);
    });

    // Empêcher le formulaire de se soumettre automatiquement
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();
    });

    // Désactiver le bouton Ajouter dans le popup de catégorie
    submitBtn.disabled = true;

    // Activer le bouton Ajouter lorsque le libellé de la catégorie est saisi
    document.getElementById("libelle1").addEventListener("input", function() {
        submitBtn.disabled = this.value === "";
    });

    // Ajouter une option d'unité et fermer le popup d'unité
    addNewUniteBtn.addEventListener("click", function() {
        const newUniteValue = newUniteInput.value;
        if (newUniteValue !== "") {
            const newUniteOption = document.createElement("option");
            newUniteOption.value = newUniteValue;
            newUniteOption.textContent = newUniteValue;
            uniteSelect.appendChild(newUniteOption);
            uniteSelect.value = newUniteValue;
        }
        const uniteModal = new bootstrap.Modal(document.getElementById("unite"));
        uniteModal.hide();
        newUniteInput.value = "";
    });

    // Enregistrer un nouveau fournisseur
    saveSupplierButton.addEventListener("click", function() {
        const firstName = document.getElementById("supplierFistName").value;
        const lastName = document.getElementById("supplierName").value;
        const newSupplier = firstName  ;
        allSuppliers.push(newSupplier);
        const supplierModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        supplierModal.hide();
    });
    
});
document.addEventListener("DOMContent", function() {
    const tableBody = document.querySelector(".table tbody");
    const valideBtn = document.getElementById("valide");

    valideBtn.addEventListener("click", function() {
        const articleInput = document.getElementById("ConfectionInput").value;
        const prixAchatInput = document.getElementById("validationTooltip02").value;
        const categorieSelect = document.getElementById("categorieSelect");
        const categorieSelectedOption = categorieSelect.options[categorieSelect.selectedIndex].text;
        const quantiteInput = document.getElementById("validationTooltip02").value;
        const uniteSelect = document.getElementById("uniteSelect");
        const uniteSelectedOption = uniteSelect.options[uniteSelect.selectedIndex].text;
        const fournisseurInput = document.getElementById("fournisseur").value;

        // Créer une nouvelle ligne pour le tableau
        const newRow = tableBody.insertRow();
        const cellArticle = newRow.insertCell(0);
        const cellPrix = newRow.insertCell(1);
        const cellCategorie = newRow.insertCell(2);
        const cellQuantite = newRow.insertCell(3);
        const cellUnite = newRow.insertCell(4);
        const cellFournisseur = newRow.insertCell(5);
        const cellAction = newRow.insertCell(6);

        // Remplir les cellules avec les données du formulaire
        cellArticle.textContent = articleInput;
        cellPrix.textContent = prixAchatInput;
        cellCategorie.textContent = categorieSelectedOption;
        cellQuantite.textContent = quantiteInput;
        cellUnite.textContent = uniteSelectedOption;
        cellFournisseur.textContent = fournisseurInput;

        // Ajouter un bouton de suppression
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Supprimer";
        deleteButton.classList.add("btn", "btn-danger", "btn-sm");
        deleteButton.addEventListener("click", function() {
            tableBody.removeChild(newRow);
        });
        cellAction.appendChild(deleteButton);

        // Réinitialiser les champs du formulaire
        document.querySelector("form").reset();
        categorieSelect.selectedIndex = 0;
        uniteSelect.selectedIndex = 0;
        fournisseurInput.value = "";
    });
});

</script> -->
 



