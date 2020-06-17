<?php

class QuestionManager extends Manager{
   
    function __construct(){
        $this->className="Question";
    }



    public function create($objet){
        $sql="INSERT INTO `question` (`idqtn`, `libelle`, `type`, `nbrePoint`,`id`) VALUES 
        (NULL, '".$objet->getLibelle()."', '".$objet->getType()."', '".$objet->getNbrePoint()."', '".$objet->getId()."');";
        $result=$this-> ExecuteUpdate($sql);

        return $result;

        

    }
    public function update($objet){
        
        $sql="UPDATE user SET  fullname=[.$objet->getFullname($fullName).],login=[.$objet->setLogin($login).],pwd=[.$objet->setPwd($pwd).],profil=[.$objet->setProfil($profil).],score=[.$objet->getScore($score).] WHERE id=$id";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }
    public  function delete($id){
      $sql="DELETE FROM question WHERE id='$id' ";

      return $this->ExecuteUpdate($sql)!=0;
    }

    public function findAllReponse(){

        $sql="select reponses from `question`";
        

        return $this-> ExecuteSelect($sql);
         }

    public function findAll(){

        $sql="select * from `question` order by idqtn";
        

        return $this-> ExecuteSelect($sql);
         }



         public function findAléatoire($nbre){

            $sql="select * from question ORDER BY rand() LIMIT 1,$nbre";
            
    
            return $this-> ExecuteSelect($sql);
             }



         

         public function findByAdmin($id){

            $sql="select * FROM question INNER JOIN user ON question.id = user.id where question.id='$id'";
            
    
            return $this-> ExecuteSelect($sql);
             }

         

         

    public function findById($id){

        $sql="select score,question,repones,nbrePoint from question where id='$id'";

    } 
    
    public function nombreEle($id){

        $sql="select count(*) FROM question";

    } 



    public function questionExist($answer){
        $sql="select * from question where libelle='$answer'";
        $questions= $this-> ExecuteSelect($sql);

        if (array_key_exists(0, $questions)) {
            return $questions[0];
           }else {
               return null;
           }
    }
}