import {Api} from "./../core/api.js";
import {WEB_ROUTE} from "./../core/bootstrap.js";

const libelle1 = document.getElementById("libelle1");
const unitedefaut = document.getElementById("unitedefaut");
const conversion = document.getElementById("conversion");


document.getElementById('submitBtn').addEventListener('click', async (e) => {
   e.preventDefault();

   const value = libelle1.value;
   const value1 = unitedefaut.value.trim();
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
 });
 categorieSelect.addEventListener("change",async function(){
  const id = categorieSelect.options[categorieSelect.selectedIndex].value
  await Api.postData(`${WEB_ROUTE}/categorie-getUnite`,{idCategorie: id}).then(function (data) {
          // console.log(data);           
   }) 
  })

 
  
  categorieSelect.addEventListener('change', async function () {
    const uniteBtn = document.getElementById('uniteBtn');
      async function populateSelectWithData1() {
          try {
              const response = await fetch("http://localhost:8000/api/UniteByCategorie");
              const datas = await response.json();
              // Fetch unite_par_defaut data
              const uniteParDefautResponse = await fetch("http://localhost:8000/api/categorie");
              const uniteParDefautData = await uniteParDefautResponse.json();
  
              // Clear existing options
              uniteSelect.innerHTML = '';
  
              datas.forEach(data => {
                const uniteParDefautValue = uniteParDefautData.find(item => item.id === data.id);
              
                const option = document.createElement("option");
            
                if (uniteParDefautValue && uniteParDefautValue.unite_par_defaut) {
                    option.value = `${data.id}_libelle`;
                    option.textContent = `${data.libelle}`;
                } else {
                  option.value = `${data.id}_libelle`;
                  option.textContent = `${data.libelle}`;
                }
                uniteBtn.style.display = 'block';
                uniteSelect.appendChild(option);
            });
            
          } catch (error) {
              console.error("Error fetching data:", error);
          }
      }
  
      populateSelectWithData1();
  });