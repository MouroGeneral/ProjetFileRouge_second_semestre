const categorieSelect = document.getElementById("categorieSelect");


async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/categorie-add-select"); 
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