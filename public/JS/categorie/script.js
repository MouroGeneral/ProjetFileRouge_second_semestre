import {Api} from "./../core/api.js";
import {WEB_ROUTE} from "./../core/bootstrap.js";

const libelle1 = document.getElementById("libelle1");
const unitedefaut = document.getElementById("unitedefaut");
const conversion = document.getElementById("conversion");


document.getElementById('submitBtn').addEventListener('click', async (e) => {
   e.preventDefault();
   const value = libelle1.value;
   const value1 = unitedefaut.value.trim();
   console.log( value1);
   const value2 = conversion.value.trim();
 
   try {
     // Your API call and form reset logic here
     await Api.postData(`${WEB_ROUTE}/store-categorie`, { libelle1: value, unitedefaut: value1, conversion: value2 });
 
     const newOption = document.createElement('option');
     newOption.value = value;
     newOption.textContent = value;
     categorieSelect.appendChild(newOption);
 
     categorieSelect.value = value;
    


   } catch (error) {
     console.error('An error occurred:', error);
   }
 });