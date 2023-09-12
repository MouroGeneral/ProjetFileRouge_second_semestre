import { WEB_ROUTE } from "./bootstrap.js";
import {Api} from "./../core/api.js";
const categorieventeSelect = document.getElementById("categorieventeSelect");

async function populateSelectWithDatas() {
    try {
        const response = await fetch("http://localhost:8000/api/categorievente"); 
        const datas = await response.json();

        datas.forEach(data => {
            const option = document.createElement("option");
            option.value = data.id;
            option.textContent = data.libelle;
            categorieventeSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
populateSelectWithDatas() ;
async function populateSelectWithData1() {
    try {
        const response = await fetch("http://localhost:8000/api/article-ind"); 
        const datas = await response.json();
           tbody.innerHTML = ""
        datas.forEach(data => {
           tbody.innerHTML +=`
           <tr>
               <td>${data.libelle}</td>
               <td>${data.prixAchat}</td>
          
             
                </tr>`
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
  }
  populateSelectWithData1();
const inputeElement = document.getElementById("venteInput");
const submitArticle = document.getElementById("submit");
const feedbackElement = document.getElementById("feedbackMessage");

async function checkVenteExistence(libelle) {
    const response = await fetch("http://localhost:8000/api/article-vente");
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

const venteInput = document.getElementById('venteInput');
const tailleSelect = document.getElementById('tailleSelect');
const prixInput = document.getElementById('prixInput');
const montantInput = document.getElementById('montantInput');
const ProductionInput = document.getElementById('ProductionInput');
 document.getElementById('valide').addEventListener('click', async (e) => {
  e.preventDefault();

  const value = venteInput.value;
  const value1 = tailleSelect.value;
  const value2 = prixInput.value;
  const value3 = montantInput.value;
  const value4 = ProductionInput.value;
  const value5 = categorieventeSelect.value;


  try {
    // Your API call and form reset logic here
    await Api.postData(`${WEB_ROUTE}/article-vente-store`, { venteInput: value,tailleSelect:value1,prixInput:value2,montantInput:value3,ProductionInput:value4,categorieventeSelect: value5 });

  


  } catch (error) {
   console.error('An error occurred:', error);
  }
});



 let l = 1;
 let formValues = [];
 let formValues2 = [];
 let total = 0;
 const addArticle = document.getElementById('addArticle'); // Remplacez 'votreIDAddArticle' par l'ID réel de votre élément bouton
 
 document.addEventListener('DOMContentLoaded', function () {
   const categoryTableBody = document.getElementById('categoryTableBody');
   addNewRow();
 
   addArticle.addEventListener('click', function () {
     l += 1;
     addNewRow();
   });
   const tableau = document.getElementById('tableau')
   async function populateSelectWithDatavente() {
    try {
        const response = await fetch("http://localhost:8000/api/article-vente"); 
        const datas = await response.json();
           tableau.innerHTML = ""
        datas.forEach(data => {
           tableau.innerHTML +=`
           <tr>
           <td>${data.libelle}</td>
           <td>${data.taille}</td>
               <td>${data.prixVente}</td>
               <td>${data.quantiteVente}</td>
               <td>${data.montant}</td>
               <td>${data.IdCategorieVente}</td>
               <td>
               <div class="action" style="display: flex;justify-content:space-around">
               <a name="" id="detail" role="button" class="btn btn-primary" 
                     href="" style="background-color: blue;">DetailProduction</i>
                 </a>

               <a href=""
               onclick="return confirm('etes vous sure de vouloir archiver cette projet ?')";>
               <i class="fas fa-archive" style="color:red"></i></a>

               </div>
             </td>
                </tr>`
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
  }
  populateSelectWithDatavente();

   function addNewRow() {
     const row = document.createElement('tr');
     row.innerHTML = `
       <td>
         <div class="form-group has-success">
           <label class="form-label" for="inputvalid">libelle</label>
           <input type="text" name="referent" value="" class="form-control" id="libelle">
         </div>
       </td>
       <td>
         <div class="form-group has-success">
           <label class="form-label" for="inputvalid">quantite</label>
           <div style="display:flex">
           <input type="text" name="referent" value="" class="form-control" id="quantite${l}">
           <span id="spann${l}" value = "">(convert)</span>
           </div>
         </div>
       </td>
     `;
 
     categoryTableBody.appendChild(row);
 
     const libelleInput = document.getElementById('libelle');
     const quantiteInput = document.getElementById(`quantite${l}`);
 
     if (libelleInput.value == "") {
       quantiteInput.disabled = true;
       addArticle.disabled = true;
     }
 
     let trouve = false;
     let dernierValeur = "";
 
     libelleInput.addEventListener('input', async function (event) {
       dernierValeur = event.target.value;
       const response = await fetch("http://localhost:8000/article-select");
       const data = await response.json();
       data.forEach(element => {
         if (element.libelle == dernierValeur) {
           addArticle.disabled = false;
           quantiteInput.disabled = false;
           //validation numerique
           const errorMessage = document.getElementById(`errorMessage${l}`);
 
           addArticle.addEventListener('click', async function () {
             const libelleValue = libelleInput.value;
             const quantiteValue = +quantiteInput.value;
             total += quantiteValue * +element.prixAchat;
             cProduction.value = total;
             formValues.push({ libelle: libelleValue, quantite: quantiteValue, id: element.id, libelle2: libelleCategorie2 });
           });
 
           trouve = true;
         }
         if (trouve) {
           quantiteInput.disabled = false;
         } else {
           quantiteInput.disabled = true;
         }
       });
     });
   }
 });
 