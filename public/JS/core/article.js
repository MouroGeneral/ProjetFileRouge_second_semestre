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
 submitBtn.addEventListener('click', async function handleFormSubmission() {
    const value = libelleCategorie.value;
    const option = document.createElement("option");
    option.value = value;
    option.textContent = value;
    categorieSelect.appendChild(option);
    categorieSelect.value = value;

    const uniteModal = uniteModalCategorie.value;
    const convertisseurModal = convertisseurDefaut.value;

    try {
        const response = await Api.postData(`${WEB_ROUTE}/categorie-add`, {
            libelle1: value,
            unitedefaut: uniteModal,
            conversion: convertisseurModal
        });

        // Handle the response data here
        console.log("Response:", response);

    } catch (error) {
        // Handle errors here
        console.error("Error:", error);
    }
}
)
// Call the function to initiate the form submission and API call
handleFormSubmission(); 