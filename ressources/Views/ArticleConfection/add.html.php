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
    <a href="#" class="clickable-icon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
  <a href="#" class="clickable-icon" data-bs-toggle="modal" data-bs-target="#unite">
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

                <div class="col-md-4 position-relative">
 

                    <label for="validationTooltip04" class="form-label">Fourniseur</label>
                    <div class="form-group" style="margin-top: 0%; width: 100%; display: flex;">
                    <input type="text" class="form-control" name="id" id="fournisseur" value="">
                    <a href="#" class="clickable-icon3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="material-symbols-outlined">
                                      add_circle
                                    </span>
                                  </a>
                    <div id="feedbackMessage"></div>
  </div>
                </div>

                <div class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Reference</label>
                    <input type="hiden" class="form-control" name="uniteReference" id="validationTooltip02" value="">
                    <div class="invalid-feedback">
                    </div>
                    <div class="col-md-6 position-relative">
                    <label for="validationTooltip02" class="form-label">Photo</label>
                    <input type="file" class="form-control" name="Photo" id="validationTooltip02" value="">
                    <div class="invalid-feedback">
                    </div>
                    <input type="submit" class="btn btn-primary " 
                    style="background:green;height:40px;margin-top:4%;width:100%" id="valide" name="Valider"  value="valider">
                                           
        </form>
    </div>
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
                    <tbody>
                    </tbody>
                </table>
                <script type="module" src="<?=AssetJs("core/article.js") ?>" ></script>  
                <script type="module" src="<?=AssetJs("categorie/script.js") ?>" ></script>  
             <script type="module" src="<?=AssetJs("core/unite.js") ?>" ></script>  
             <script type="module" src="<?=AssetJs("core/fournisseur.js") ?>" ></script>  
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
<!--  -->
 
             <!-- Votre JavaScript -->
<!-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    const categorieSelect = document.getElementById("categorieSelect");
    const newCategoryInput = document.getElementById("newCategoryInput");
    const NewUniteInput = document.getElementById("NewUniteInput");

    const addNewCategoryBtn = document.getElementById("addNewCategoryBtn");
    const AddNewUniteBtn = document.getElementById("AddNewUniteBtn");
    const addCategoryMessage = document.getElementById("addCategoryMessage");
    const AddUniteMessage = document.getElementById("AddUniteMessage");


    addNewCategoryBtn.addEventListener("click", function () {
      const newCategory = newCategoryInput.value.trim();
      if (newCategory !== "") {
        const option = document.createElement("option");
        option.value = newCategory;
        option.textContent = newCategory;
        categorieSelect.appendChild(option);
        newCategoryInput.value = ""; // Réinitialiser l'input
        addCategoryMessage.textContent = "Catégorie ajoutée avec succès!";
      } else {
        addCategoryMessage.textContent = "Veuillez entrer une catégorie valide.";
        AddUniteMessage.textContent = "Veuillez entrer une unité valide.";
      }
    })
    AddNewUniteBtn.addEventListener("click", function () {
      const newUnite = NewUniteInput.value.trim();
      if (newUnite !== "") {
        const option = document.createElement("option");
        option.value = newUnite;
        option.textContent = newUnite;
        uniteSelect.appendChild(option);
        NewUniteInput.value = ""; // Réinitialiser l'input
        addCategoryMessage.textContent = "Catégorie ajoutée avec succès!";
      } else {
        AddUniteMessage.textContent = "Veuillez entrer une unité valide.";
      }
    });
  });
</script> -->
<!-- Votre JavaScript pour l'ajout d'unité -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const uniteSelect = document.getElementById("uniteSelect");
    const newUniteInput = document.getElementById("newUniteInput");
    const addNewUniteBtn = document.getElementById("addNewUniteBtn");
    const addUniteMessage = document.getElementById("addUniteMessage");

    addNewUniteBtn.addEventListener("click", function () {
      const newUnite = newUniteInput.value.trim();
      if (newUnite !== "") {
        const option = document.createElement("option");
        option.value = newUnite;
        option.textContent = newUnite;
        uniteSelect.appendChild(option);
        newUniteInput.value = ""; // Réinitialiser l'input
        addUniteMessage.textContent = "Unité ajoutée avec succès!";
      } else {
        addUniteMessage.textContent = "Veuillez entrer une unité valide.";
      }
    });
  });
</script>
<!-- Votre JavaScript pour la validation -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const confectionInput = document.getElementById("ConfectionInput");
    const prixInput = document.getElementById("validationTooltip02");
    const quantiteInput = document.getElementById("validationTooltip02"); // Utilisez un ID unique ici
    const uniteSelect = document.getElementById("uniteSelect");
    const fournisseurInput = document.getElementById("fournisseur");
    const valideform = document.getElementById(valide);

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
 
             <!-- Categorie Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter une categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      </div>
      <form novalidate id="categorie">
        <div class="modal-body">
          <div class="mb-3">
            <label for="libelle" class="form-label">Libelle</label>
            <input type="text" class="form-control" id="libelle1">
          </div>
          <div class="col-md-8 mb-3">
            <label for="libelle" class="form-label">Unite par defaut</label>
            <input type="text" class="form-control" id="unitedefaut">
          </div>
          <div class="col-md-2 mb-3 position-absolute conversion">
            <label for="libelle" class="form-label">Conversion</label>
            <input type="text" class="form-control" id="conversion" value="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

        <!-- Fournisseur Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fournisseur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form novalidate id="addFournisseur">
        <div class="modal-body">
          <div class="mb-3">
            <label for="libelle" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="prenom">
          </div>
          <div class="mb-3">
            <label for="libelle" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
        <!-- <script type="text/javascript">
  const selectCategorie= document.querySelector("#selectCategorie")
  const  ConfectionInput = document.querySelector("#ConfectionInput")
  window.addEventListener("load",async function(){
    const selectCategorie = document.querySelector('#selectCategorie')
     await Api.getData("http://localhost:8000/categorie-add-select").then(function (data) {
        data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectCategorie.appendChild(option);
             });
    });

    const selectUnite = document.querySelector('#selectUnite')
    await Api.getData(`${WEB_URL}/unite`).then(function (data) {
       data.forEach(element => {
           const option = document.createElement('option');
           option.value = element.id; 
           option.textContent = element.libelle;
           selectUnite.appendChild(option);
       });
   });


//lister Articles de confections
   await Api.getData(`${WEB_URL}/articleconfection-list`).then(function (data) {
    tbody.innerHTML = ""
    for(let cat of data){
    tbody.innerHTML += `
              <tr class="table">
              <th scope="row">${cat.id}</th>
              <td>${cat.libelle}</td>
              <td>${cat.prixAchat}</td>
              <td>${cat.qteStock}</td>
              <td>${cat.referent}</td>
              <td>
              <div class="action" style="display: flex;justify-content:space-around">
              <a href="">
              <i class="fas fa-solid fa-pen-to-square"></i></a>
              
              <a name="" id="deleteCategorie" class="btn btn-primary" href="#" role="button"
                  > <i class="fas fa-archive" style="color:#002879"></i></a>
              </div>
              </td>
              </tr> 
    `
    }
 });
  
  
 })

 /*  ok.addEventListener("click",function(event){
         
         event.preventDefault();
         if (selectCategorie.value === ""){
         message.innerHTML = "ce champ est obligatoire"
         }else;if (quantite.value === "" || quantite.value <= 0){
         messagequantite.innerHTML = "la valeur saisi est incorrect"
         }else{
            reinitialisation();
             
          }
        
      }) 

      enregistrer.addEventListener("click",function(event){
         event.preventDefault();
         if (ConfectionInput.value === ""){
         messageinput.innerHTML = "ce champ est obligatoire"
         }else{
            reinitialisationVente();     
          }
      })



let reinitialisation = ()=>{
    selectCategorie.value = "";
    quantite.value = "";
};
let reinitialisationVente = ()=>{
    ConfectionInput.value = "";
}
//const myRequest = new Request("http://localhost:8000/confectionvente-add-select");
selectCategorie.addEventListener("click",function(event){

    Request = new Request("http://localhost:8000/categorie-add-select");
    fetch(myRequest)
          .then(response => {
            if (!response.ok) {
              throw new Error(`Erreur HTTP : ${response.status}`);
            }
            return response.json(); 
          })
          .then(data => {
            console.log(data)
            sessionStorage.setItem('data', JSON.stringify(data));
            data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectCategorie.appendChild(option);
              });
            })
          .catch(error => {
            console.error('Erreur :', error);
            });

      })
    </script> */ -->
