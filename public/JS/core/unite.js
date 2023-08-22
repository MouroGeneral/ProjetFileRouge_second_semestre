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