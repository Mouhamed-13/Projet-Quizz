<?php

class UserManager extends Manager{
   
    function __construct(){
        $this->className="User";
    }



    public function create($objet){
        $sql="INSERT INTO `user` (`id`, `fullName`, `login`, `pwd`, `profil`, `avatar`,`score`,`nbreQuest`) VALUES 
        (NULL, '".$objet->getFullName()."', '".$objet->getLogin()."', '".$objet->getPwd()."', '".$objet->getProfil()."', '".$objet->getAvatar()."', '".$objet->getScore()."', '".$objet->getNbreQuest()."');";

        $result=$this-> ExecuteUpdate($sql);

        return $result[0]!=0;
    }
    public function update($objet){

    }
    public  function delete($id){
      
    }


    public function findAllByScore(){
        $sql="SELECT fullName,score FROM `user` WHERE profil='joueur' order by score DESC";
        
            return $this-> ExecuteSelect($sql);
       
    }

    public function NewScore($id,$score){
        $sql="UPDATE `user` SET `score` = '$score' WHERE `user`.`id` = '$id';";
        
            return $this-> ExecuteUpdate($sql);
       
    }

    public function NbreQuest($id,$nbre){
        $sql="UPDATE `user` SET `nbreQuest` = '$nbre' WHERE `user`.`id` = '$id';";
        
            return $this-> ExecuteUpdate($sql);
       
    }


    
    public function AllUser(){
        $sql="SELECT * FROM `user`  order by id";
        
            return $this-> ExecuteSelect($sql);  
    }

    


    public function findAll(){
        $sql="SELECT fullName,score FROM `user` WHERE profil='joueur' order by score DESC";
        
            return $this-> ExecuteSelect($sql);  
    }
    public function findById($id){

    } 
    
    public function findNbreQuestById($id){
        $sql="SELECT nbreQuest FROM `user` WHERE `id` = '$id' ";
        return $this-> ExecuteSelect($sql); 
    } 

    public function loginExist($login){
        $sql="select * from user where login='$login'";
        $users= $this-> ExecuteSelect($sql);

        if (array_key_exists(0, $users)) {
            return $users[0];
           }else {
               return null;
           }
    }

    public function getUserByLoginAndPwd($login,$pwd){
       $sql="select * from user where login='$login' and pwd='$pwd'";
       $users= $this-> ExecuteSelect($sql);
       if (array_key_exists(0, $users)) {
        return $users[0];
       }else {
           return null;
       }
       
    } 
}

//INSERT INTO `user` (`id`, `fullname`, `login`, `pwd`, `profil`, `avatar`) VALUES
// (NULL, 'admin', 'admin', 'admin', 'admin', 'admin.jpeg'),
// (NULL, 'joueur', 'joueur', 'joueur', 'joueur', 'joueur.jpeg');