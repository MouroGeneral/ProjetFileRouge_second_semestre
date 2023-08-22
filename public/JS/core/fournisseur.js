const inputElement = document.getElementById("fournisseur");
const checkboxContainer = document.getElementById("checkboxContainere");

async function fetchSuppliersContaining(letters) {
  const response = await fetch("http://localhost:8000/saisir-fournisseur");
  const fournisseurs = await response.json();

  const matchingSuppliers = fournisseurs.filter(
    fournisseur => fournisseur.prenomF.toLowerCase().includes(letters.toLowerCase())
  );

  return matchingSuppliers;
}