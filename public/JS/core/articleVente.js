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
const inputeElement = document.getElementById("venteInput");
const submitArticle = document.getElementById("submit");
const feedbackElement = document.getElementById("feedbackMessage");

async function checkVenteExistence(libelle) {
    const response = await fetch("http://localhost:8000/article-vente-select");
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
const libelle1 = document.getElementById("libelle1");



document.getElementById('submitBtn').addEventListener('click', async (e) => {
   e.preventDefault();

   const value = libelle1.value;

 
   try {
     // Your API call and form reset logic here
     await Api.postData(`${WEB_ROUTE}/categorie-vente-store`, { libelle1: value});
 
     const newOption = document.createElement('option');
     newOption.value = value;
     newOption.textContent = value;
     categorieventeSelect.appendChild(newOption);
     categorieventeSelect.value = value;
    


   } catch (error) {
     console.error('An error occurred:', error);
   }
 });