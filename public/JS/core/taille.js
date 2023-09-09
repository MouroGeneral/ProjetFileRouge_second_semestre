import { WEB_ROUTE } from "./bootstrap.js";
import {Api} from "./../core/api.js";
const tailleSelect = document.getElementById("tailleSelect");


async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/taille-add-select"); 
        const datas = await response.json();

        datas.forEach(data => {
            const option = document.createElement("option");
            option.value = data.idT;
            option.textContent = data.libelleT;
           tailleSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
populateSelectWithData(); 
const libelle2 = document.getElementById("libelle2");



document.getElementById('submitBtnn').addEventListener('click', async (e) => {
   e.preventDefault();

   const value = libelle2.value;

 
   try {
     // Your API call and form reset logic here
     await Api.postData(`${WEB_ROUTE}/taille-store`, { libelle2: value});
 
     const newOption = document.createElement('option');
     newOption.value = value;
     newOption.textContent = value;
     tailleSelect.appendChild(newOption);
     tailleSelect.value = value;
    


   } catch (error) {
     console.error('An error occurred:', error);
   }
 });