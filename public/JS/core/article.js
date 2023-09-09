import { WEB_ROUTE } from "./bootstrap.js";
import {Api} from "./../core/api.js";
const categorieSelect = document.getElementById("categorieSelect");
const submitBtn = document.getElementById("submitBtn");

async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/api/categorie"); 
        const datas = await response.json();

        datas.forEach(data => {
            const option = document.createElement("option");
            option.value = data.id;
            option.textContent = data.libelle;
            categorieSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
 populateSelectWithData();

 async function populateSelectWithData1() {
  try {
      const response = await fetch("http://localhost:8000/api/article-index"); 
      const datas = await response.json();
         tbody.innerHTML = ""
      datas.forEach(data => {
         tbody.innerHTML +=`
         <tr>
             <td>${data.libelle}</td>
             <td>${data.prixAchat}</td>
             <td>${data.qteStock}</td>
             <td>${data.reference}</td>
             <td>${data.photo}</td>
           
              </tr>`
      });
  } catch (error) {
      console.error("Error fetching data:", error);
  }
}
populateSelectWithData1();

const inputeElement = document.getElementById("ConfectionInput");
const submitArticle = document.getElementById("submit");
const feedbackElement = document.getElementById("feedbackMessage");

async function checkVenteExistence(libelle) {
    const response = await fetch("http://localhost:8000/article-select");
    const ventes = await response.json();

    const venteExists = ventes.some(vente => vente.libelle === libelle);

    return venteExists;
}

inputeElement.addEventListener("input", async event => {
    const enteredLibelle = event.target.value.trim();

    if (enteredLibelle.length >= 3) {
        const venteExists = await checkVenteExistence(enteredLibelle);

        if (venteExists) {
            feedbackElement.textContent = `Ce libille existe deja.`;
            feedbackElement.className = "success-messagee"; // Apply appropriate CSS class for success
            submitArticle.disabled = true; // Disable the submit button
        } else {
            feedbackElement.textContent = `Ce libelle n'existe pas.`;
            feedbackElement.className = "error-messagee"; // Apply appropriate CSS class for error
            submitArticle.disabled = false; // Enable the submit button
        }
    } else {
        feedbackElement.textContent = "Veuillez saisir un libelle.";
        feedbackElement.className = ""; // Clear the CSS class
        submitArticle.disabled = true; // Disable the submit button
    }
});


valide.addEventListener("click",function(event){
         
  event.preventDefault();
  if (selectCategorie.value === ""){
    feedbackMessageinnerHTML = "ce champ est obligatoire"
  }else;if (quantite.value === "" || quantite.value <= 0){
    feedbackMessage.innerHTML = "la valeur saisi est incorrect"
  }else{
     reinitialisation();
      
   }
 
}) 

valide.addEventListener("click",function(event){
  event.preventDefault();
  if (ConfectionInput.value === ""){
    feedbackMessage.innerHTML = "ce champ est obligatoire"
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
// Fonction pour ajouter une option à la liste déroulante de catégories
/*function addCategoryOption(id, label) {
  const select = document.getElementById("categorieSelect");
  const option = document.createElement("option");
  option.value = id;
  option.textContent = label;
  select.appendChild(option);
}

// Fonction pour ajouter une nouvelle catégorie
function addNewCategory() {
  const libelle = document.getElementById("libelle1").value;
  const unite = document.getElementById("unitedefaut").value;
  const conversion = document.getElementById("conversion").value;

  // Ajouter la catégorie à la liste déroulante
  const newCategoryId = Math.floor(Math.random() * 1000); // Générer un ID temporaire
  addCategoryOption(newCategoryId, libelle);

  // Effacer les champs du formulaire
  document.getElementById("libelle1").value = "";
  document.getElementById("unitedefaut").value = "";
  document.getElementById("conversion").value = "1";

  // Fermer la fenêtre modale
  const modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
  modal.hide();

  // Afficher un message de succès
  const message = document.getElementById("message");
  message.textContent = "Nouvelle catégorie ajoutée avec succès";
  setTimeout(() => {
      message.textContent = "";
  }, 3000);
}
 */
// Attacher l'événement au bouton "Ajouter" du formulaire modal
/* document.getElementById("submitBtn").addEventListener("click", addNewCategory);

const libelle1 = document.getElementById("libelle1");
const unitedefaut = document.getElementById("unitedefaut");
const conversion = document.getElementById("conversion");
 submitBtn.addEventListener('click', async function(){  
    const value = libelle1.value;
    const value1 = unitedefaut.value.trim();
    console.log( value1);
    const value2 = conversion.value.trim();
  
    try {
      // Your API call and form reset logic here
      await Api.postData(`${WEB_ROUTE}/categorie-store`, { libelle1: value, unitedefaut: value1, conversion: value2 });
  
      const newOption = document.createElement('option');
      newOption.value = value;
      newOption.textContent = value;
      categorieSelect.appendChild(newOption);
  
      categorieSelect.value = value;
     
 
 
    } catch (error) {
      console.error('An error occurred:', error);
    }
}) 
/* document.getElementById('submitBtn').addEventListener('click', async (e) => {
    e.preventDefault();
    
  }); */

