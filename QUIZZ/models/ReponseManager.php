<?php

class ReponseManager extends Manager{
   
    function __construct(){
        $this->className="Reponses";
    }



    public function create($objet){
        $sql="INSERT INTO `reponses` (`idRep`, `libelle`, `idqtn`, `repVrai`) VALUES 
        (NULL, '".$objet->getLibelle()."', '".$objet->getIdqtn()."', '".$objet->getRepVrai()."');";

        return $this-> ExecuteUpdate($sql)!=0;

    }
    public function update($objet){
        
        $sql="UPDATE user SET  fullname=[.$objet->getFullname($fullName).],login=[.$objet->setLogin($login).],pwd=[.$objet->setPwd($pwd).],profil=[.$objet->setProfil($profil).],score=[.$objet->getScore($score).] WHERE id=$id";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }
    
    public function findAll(){

        $sql="select reponses.libelle,reponses.repVrai,reponses.idqtn FROM question INNER JOIN reponses ON question.idqtn = reponses.idqtn order by reponses.idqtn";
        return $this-> ExecuteSelect($sql);
         }

    public function findById($id){

        $sql="select score,question,repones,nbrePoint from question where id='$id'";
        
       return $this-> ExecuteSelect($sql);

    }  
    
    public function findTrueRep($id){

        $sql="SELECT * FROM `reponses` WHERE idqtn='$id' AND repVrai=1";
        
       return $this-> ExecuteSelect($sql);

    }  

    public  function delete($id){
        $sql="DELETE FROM question WHERE id='$id' ";
  
        return $this->ExecuteUpdate($sql)!=0;
      }

    public function reponseExist($rep,$idqtn){
        $sql="select * from reponses where libelle='$rep' and idqtn='$idqtn'";
        $reponses= $this-> ExecuteSelect($sql);

        if (array_key_exists(0, $reponses)) {
            return $reponses[0];
           }else {
               return null;
           }
    }
}