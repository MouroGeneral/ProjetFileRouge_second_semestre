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
                <div class="col-md-4 position-relative">
                    <label for="validationTooltip04" class="form-label">Articles Confection</label>
                    <input type="text" class="form-control" name="libelle" id="ConfectionInput" value="">
                    <div id="feedbackMessage"></div>
                </div>


                
                <div class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="prixAchat" id="validationTooltip02" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="col md-6">
                                   <div class="form-group" style="margin-top:4%;width:70%" >
                                        <label for="" style="margin-top:4%">Categorie</label>
                                        <select class="form-control" name="id" id="categorieSelect" style="margin-top:-1%;height:40px">
                                        <option value="0">choisir Categorie</option>
                                        </select>
                                        <div id="message" style="color:red">
                                        </div>
                                    </div>
                </div>

                <div class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Quantite</label>
                    <input type="number" class="form-control" name="qteArticle" id="validationTooltip02" value="">
                    <div class="invalid-feedback">
                    </div>
                </div>
             
                <div class="col-md-4 position-relative" style="margin-top:3%;">
                    <label for="validationTooltip02" class="form-label">Unite</label>
                    <select class="form-control" name="idU" id="uniteSelect" style="margin-top:-1%;height:40px">
                                        <option value="0">choisir unite</option>
                                        </select>
                        <div class="invalid-feedback">
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationTooltip04" class="form-label">Fourniseur</label>
                    <input type="text" class="form-control" name="id" id="fournisseur" value="">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         +
                    </button>
                    <div id="feedbackMessage"></div>
                   
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
                    style="background:green;height:40px;margin-top:4%;width:100%" name="Valider"  value="valider">
                                           
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
                <script type="module" src="<?=AssetJs("/core/article.js") ?>" ></script>  
             <script type="module" src="<?=AssetJs("/core/unite.js") ?>" ></script>  
             <script type="module" src="<?=AssetJs("/core/fournisseur.js") ?>" ></script>  
             <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
