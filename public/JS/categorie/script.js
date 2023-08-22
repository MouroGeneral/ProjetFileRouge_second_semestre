import {Api} from "./../core/api";
import {WEB_ROUTE} from "./../core/bootstrap";
window.addEventListener("load",async function() {
   const data = await Api.getData(`${WEB_ROUTE}/categorie`).then(function (data) {
       tbody.innerHTML= "";
       for (let cat of data){
       tbody.innerHTML+=`
       <tr>
       <td>${cat.id}</td> 
       <td>${cat.libelle}</td>
       <th scope="col">Id_Categorie</th>
       <th scope="col">LibelleCategorie</th>
       <th scope="col">Action</th>
     </tr>`;
    }
   });
});
formSaveCategorie.onsubmit = async (e) =>{
    e.preventDefault();
   const value = libelle.value; 
   await Api.postData(`${WEB_ROUTE}/categorie`,{libelle:value}).then(function (data) {

   });
}