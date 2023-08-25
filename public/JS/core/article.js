import { WEB_ROUTE } from "./bootstrap.js";

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
 submitBtn.addEventListener('click',function(){
   p  
 })
 
 
