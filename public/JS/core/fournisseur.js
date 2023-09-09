import { WEB_ROUTE } from "./bootstrap.js";
import {Api} from "./../core/api.js";
//const response = await fetch("http://localhost:8000/saisir-fournisseur");
const NomFour = document.getElementById("nomF");
const PrenomFour = document.getElementById("prenomF");
document.getElementById('submitBtnefour').addEventListener('click', async (e) => {
  e.preventDefault();

  const NomFour = nomF.value;
  const PrenomFour = prenomF.value;

  try {
    // Your API call and form reset logic here
    await Api.postData(`${WEB_ROUTE}/fournisseur-store`, { nomF: NomFour  ,prenomF:PrenomFour});

  } catch (error) {
    console.error('An error occurred:', error);
  }
});


const inputElement = document.getElementById("fournisseur");
const checkboxContainer = document.getElementById("checkboxContainere");

async function fetchSuppliersContaining(letters) {
  const response = await fetch("http://localhost:8000/api/fournisseur");
  const fournisseurs = await response.json();

  const matchingSuppliers = fournisseurs.filter(
    fournisseur => fournisseur.prenomF.toLowerCase().includes(letters.toLowerCase())
  );

  return matchingSuppliers;
}

inputElement.addEventListener("input", async (event) => {
  const lettersTyped = event.target.value.trim();
  
  if (lettersTyped === "") {
    // Clear checkboxes
    checkboxContainer.innerHTML = "";
  } else {
    const matchingSuppliers = await fetchSuppliersContaining(lettersTyped);
    
    // Clear previous checkboxes
    checkboxContainer.innerHTML = "";

    if (matchingSuppliers.length > 0) {
      matchingSuppliers.forEach(supplier => {
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "selectedSuppliers"; // Use an array to hold selected suppliers
        checkbox.value = supplier.prenomF;

        const label = document.createElement("label");
        label.textContent = supplier.prenomF;

        checkboxContainer.appendChild(checkbox);
        checkboxContainer.appendChild(label);
      });
    } else {
      checkboxContainer.textContent = "Pas de fournisseurs trouvé avec un prenom contenant '" + lettersTyped + "'.";
    }
  }
});
/* document.addEventListener('DOMContentLoaded', async function() {
    const addSupplierButton = document.getElementById('saveSupplierButton');
    const supplierFirstNameInput = document.getElementById('supplierFirstName');
    const supplierNameInput = document.getElementById('supplierName');
    
    addSupplierButton.addEventListener('click', function() {
      const firstName = supplierFirstNameInput.value;
      const lastName = supplierNameInput.value;
      
      if (firstName && lastName) {
        const requestData = {
          firstName: firstName,
          lastName: lastName
        };
  
        // Send a POST request to the server
        fetch('/add_supplier', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // The supplier was added successfully
            // You can update the UI as needed, like adding the new option to the dropdown
          } else {
            alert('Une erreur est survenue lors de l\'ajout du fournisseur.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
        
        supplierFirstNameInput.value = '';
        supplierNameInput.value = '';
        
        $('#exampleModal').modal('hide');
      } else {
        alert('Veuillez remplir tous les champs du fournisseur.');
      }
    });
    const supplierInput = document.getElementById('fournisseur');
    const supplierList = document.getElementById('supplierList'); // L'élément qui contient la liste des fournisseurs
  
    const allSuppliers = []; // Remplissez cette liste avec tous les fournisseurs existants
   
    // Écoutez l'événement "input" dans le champ de saisie du fournisseur
    supplierInput.addEventListener('input', function() {
      const searchString = supplierInput.value.toLowerCase(); // Convertissez en minuscules pour une correspondance insensible à la casse
      
      // Filtrer les fournisseurs qui commencent par la chaîne de recherche
      const filteredSuppliers = allSuppliers.filter(supplier => supplier.toLowerCase().startsWith(searchString));
      
      // Mettez à jour l'interface utilisateur avec les fournisseurs filtrés
      updateSupplierList(filteredSuppliers);
    });
  
    // Fonction pour mettre à jour l'interface utilisateur avec les fournisseurs filtrés
    function updateSupplierList(filteredSuppliers) {
      supplierList.innerHTML = ''; // Effacez la liste existante
      
      // Ajoutez les fournisseurs filtrés à la liste
      filteredSuppliers.forEach(supplier => {
        const option = document.createElement('option');
        option.value = supplier;
        supplierList.appendChild(option);
      });
    }
  }); */
  /* const fournisseurInput = document.getElementById("fournisseur").value;
  const newUniteInput = document.getElementById("newUniteInput");
  const submitBtn = document.getElementById("submitBtn");
  const addNewUniteBtn = document.getElementById("addNewUniteBtn");
  const saveSupplierButton = document.getElementById("saveSupplierButton");
  saveSupplierButton.addEventListener("click", function() {
    const firstName = document.getElementById("supplierFistName").value;
    const lastName = document.getElementById("supplierName").value;
    const newSupplier = firstName  ;
    allSuppliers.push(newSupplier);
    const supplierModal = new bootstrap.Modal(document.getElementById("exampleModal"));
    supplierModal.hide();
});

   */