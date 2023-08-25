document.addEventListener("DOMContentLoaded", function () {
    const uniteSelect = document.getElementById("uniteSelect");
    const newUniteInput = document.getElementById("newUniteInput");
    const addNewUniteBtn = document.getElementById("addNewUniteBtn");
    const addUniteMessage = document.getElementById("addUniteMessage");

    addNewUniteBtn.addEventListener("click", function () {
      const newUnite = newUniteInput.value.trim();
      if (newUnite !== "") {
        const option = document.createElement("option");
        option.value = newUnite;
        option.textContent = newUnite;
        uniteSelect.appendChild(option);
        newUniteInput.value = ""; // Réinitialiser l'input
        addUniteMessage.textContent = "Unité ajoutée avec succès!";
      } else {
        addUniteMessage.textContent = "Veuillez entrer une unité valide.";
      }
    });
  });

const uniteSelect = document.getElementById("uniteSelect");


async function populateSelectWithData() {
    try {
        const response = await fetch("http://localhost:8000/unite-add-select"); 
        const datas = await response.json();

        datas.forEach(data => {
            const option = document.createElement("option");
            option.value = data.idU;
            option.textContent = data.libelleU;
            uniteSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}
populateSelectWithData(); 