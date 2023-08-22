<?php 
namespace Mouro\Models;
use Mouro\Core\Model;
/**
 * A-Convention sur les Classe
 * 1-Nom Classe PascalCase   Exemple : MaClasse  CategorieModel
 * 2-Les classes portent le meme nom que le fichier
 * 
 *    
 */

 class Fournisseur extends Model{
       //Attributs   ==> Donnees ou informations
         //Convention 
           //1-camelCase  ==> Exemple: monAttribut
        //Formalisme
        //[visibilite(private(-)|public(+)|protected(#)) ] type(php 8>) $attribut
         public  $idF;
         public  $nomF;
         public  $prenomF;
          protected static function tableName(){
                return "fournisseur";
          }
         

       //Methodes   ==> Fonctions 
          //Convention 
           //1-camelCase  ==>  maFonction(arg)
           //Formalisme
        //[visibilite(private(-)|public(+)|protected(#)) ] fonction nomFonction($arg):type

        //Encapsulation
          /**
           * 1-attribut les mettre a private
           * 2-methodes les mettre a public 
           * 3-Chaque attribut est associe a 2 methodes (getters et setters)
           *    //getter permet d'obtenir la valeur de l'attribut ==> fonction
           *   //setter permet de modifier la valeur de l'attribut ==> procedure
           *      
           */

          


           
        
       /*    public function create():int{
          //1-Connexion a la BD
           // $bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=gestion_atelier_php_221;charset=utf8', 'root', 'root');
          // $bdd = new PDO('mysql:host=localhost;dbname=gestion_atelier_php_221;charset=utf8', 'root', '');
             $bdd = parent::openConnexion();
            //2- ECRIRE LA REQUETE ==> CHANGE 1
            //Injection sql
             $req = $bdd->prepare('INSERT INTO '.self::tableName().' (libelle) VALUES (:libelle)');
            //3- EFFECTUE LA REQUETE ==> CHANGE 2
              $req->execute(['libelle' => $this->libelle]);
            //4- FIN DE LA REQUETE ==> CHANGE 3
              if($req->rowCount()>0){
                $this->id= $bdd->lastInsertId();
              }
                   $req->closeCursor();
                 return  $req->rowCount();
            
        }*/
       
         /**
          * Get the value of id
          */ 
         public function getId()
         {
                  return $this->idF;
         }

         /**
          * Set the value of id
          *
          * @return  self
          */ 
         public function setIdF($idF)
         {
              if($idF>0){
                $this->idF = $idF;
              }
                  //$this->id = $id;

                  return $this;
         }

         /**
          * Get the value of libelle
          */ 
         public function getnomF()
         {
                  return $this->nomF;
         }

         /**
          * Set the value of libelle
          *
          * @return  self
          */ 
         public function setnomF($nomF)
         {
                  $this->nomF = $nomF;

                  return $this;
         }
        

         /**
          * Get the value of prenomF
          */
         public function getPrenomF()
         {
                  return $this->prenomF;
         }

         /**
          * Set the value of prenomF
          */
         public function setPrenomF($prenomF): self
         {
                  $this->prenomF = $prenomF;

                  return $this;
         }
 }