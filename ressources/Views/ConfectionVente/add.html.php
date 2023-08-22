
<?php
     
    //  $arrayDetails = [];
    //  if(Session::isset('arrayDetails')){
    //    $arrayDetails = Session::get("arrayDetails");
    //  // Session::unset("arrayDetails");
    //  }

    //  $errors = [];
    //  if(Session::isset('errors')){
    //     $errors = Session::get("errors");
    //     Session::unset("errors");
    //  }
      ?> 


<div class="contenu" style='width:80%; height:auto; float: right; margin-top:2.4%;'>
       <h4 style="color:#002879;margin-top:0%;margin-left:15%">Ajouter d'articles confection a un article de vente</h4>
        <div class="container" style="width:70%;background: #D7D7D7;border-radius:8px;margin-left:5%">
                <form id="form">
                <input type="hidden" name="path" value="confectionvente-store">                
                           <div class="row">
                           <div class="col md-6">
                                     <div class="form-group"  style="margin-top:1%">
                                          <label for="" >Article vente</label>
                                          <input type="text" class="form-control" id="inputArticle" value="" name="libelle"  style="margin-top:-0.5%">
                                          <div id="messageinput" style="color:red">
                                            </div>
                                      </div>
                                  </div>
                            </div>     
                        
                         <div class="partie3" style="width:100%;height:100px;display:flex;justify-content:space-between">
                         <div class="col md-6">
                                   <div class="form-group" style="margin-top:2%;width:70%" >
                                     <label for="" style="margin-top:2%">ArticleConfection</label>
                                      <select class="form-control" name="id" id="selectArticle" style="margin-top:-1%;height:40px">
                                      <option value="0">choisir Article</option>
                                      </select>
                                       <div id="message" style="color:red">
                                       </div>
                                     </div>
                                    </div>

                            <div class="col md-6">
                            <div class="form-group" style="margin-top:2%">
                                          <label for="" style="margin-top:2%">Quantite</label>
                                          <input type="text" class="form-control" style="width:70%;margin-top:-1%"
                                          value="" name="qteCV" id="quantiteCV">
                                           <div id="messagequantite" style="color:red">
                                           </div>            
                             </div>
                              </div>

                                <input type="submit" class="btn btn-primary " 
                                 style="background:#002879;height:40px;margin-top:4%;width:10%" name="ok"  value="ok" id="ok">
                                    
                         </div>
                         
                         <table class="table table-hover" style="margin-top:1%;width:100%;" id="table">
                                 <tr>
                                   <th scope="col">Article</th>
                                   <th scope="col">Quantite</th>
                                   <th scope="col">Action</th>
                                 </tr>
                                 <div>
                                  <tr>
                                    <td>cc</td>
                                    <td>10</td>
                                 </tr> 
                                 </div>
                                   
                                   
                       </table>
                     
                                    <div class="card-foter text-center">
                                      <input type="submit" class="btn btn-primary " value="enregistrer" name="enregistrer" id="enregistrer"
                                       style="width: 50%;margin-top:0.5%;background:#002879">
                                    </div>
        </form>
  </div>
</div>



<script type="text/javascript">
  // recuperation des elements a partir de leur propriete id
  const selectArticle = document.querySelector("#selectArticle")
  const quantite = document.querySelector("#quantiteCV")
  const ok = document.querySelector("#ok")
  const message = document.querySelector("#message")
  const form = document.querySelector("#form")
  const messagequantite = document.querySelector("#messagequantite")
  const messageinput = document.querySelector("#messageinput")
  const enregistrer = document.querySelector("#enregistrer")
  const inputArticle = document.querySelector("#inputArticle")
  const table = document.querySelector("#table")

async function loadData() {
  displyeElement.textContent = await getArticleConfection('ConfectionVente/configuration.json');
 // alert("Mouro");
}


//validation des champs
      ok.addEventListener("click",function(event){
        
          event.preventDefault();
          if (selectArticle.value === ""){
          message.innerHTML = "ce champ est obligatoire"
          }else;if (quantite.value === "" || quantite.value <= 0){
          messagequantite.innerHTML = "la valeur saisi est incorrect"
          }else{
              reinitialisation();
              
            }
          
        }) 

        enregistrer.addEventListener("click",function(event){
          event.preventDefault();
          if (inputArticle.value === ""){
          messageinput.innerHTML = "ce champ est obligatoire"
          }else{
              reinitialisationVente();     
            }
        })



let reinitialisation = ()=>{
      selectArticle.value = "";
      quantite.value = "";
};
let reinitialisationVente = ()=>{
  inputArticle.value = "";
}
//const myRequest = new Request("http://localhost:8000/confectionvente-add-select");
      selectArticle.addEventListener("click",function(event){
        
const myRequest = new Request("http://localhost:8000/confectionvente-add-select");
          fetch(myRequest)
          .then(response => {
            if (!response.ok) {
              throw new Error(`Erreur HTTP : ${response.status}`);
            }
            return response.json(); 
          })
          .then(data => {
            console.log(data)
            sessionStorage.setItem('data', JSON.stringify(data));
            data.forEach(element => {
            const option = document.createElement('option');
            option.value = element.id; 
            option.textContent = element.libelle;
            selectArticle.appendChild(option);
              });
            })
          .catch(error => {
            console.error('Erreur :', error);
            });

      })

// URL vers laquelle vous souhaitez effectuer la requête POST
const url = 'https://api.example.com/data'; 


const dataToSend = {
  key1: 'value1',
  key2: 'value2'
}; // Les données que vous souhaitez envoyer au serveur

fetch(url, {
  method: 'POST', // Utilisation de la méthode POST
  headers: {
    'Content-Type': 'ConfectionVente/configuration.json', // Spécification du type de contenu
    // Autres en-têtes si nécessaire
  },
  body: JSON.stringify(dataToSend) // Conversion des données en JSON
})
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur de réseau - Statut ' + response.status);
    }
    return response.json(); // Analyse de la réponse JSON
  })
  .then(data => {
    // Faites quelque chose avec les données reçues en réponse
    console.log(data);
  })
  .catch(error => {
    // Gérer les erreurs
    console.error('Une erreur s\'est produite:', error);
  });

 </script> 



  




     


