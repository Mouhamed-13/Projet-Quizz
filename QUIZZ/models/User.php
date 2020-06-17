<?php
class User implements IManager{
    private $id;
    private $fullName;
    private $login;
    private $pwd;
    private $profil;
    private $avatar;
    private $score=0;
    private $nbreQuest=0;

    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getFullName(){
        return $this->fullName;
    }
    public function getlogin(){
        return $this->login;
    }
    public function getPwd(){
        return $this->pwd;
    }
    public function getProfil(){
        return $this->profil;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getScore(){
        return $this->score;
    }

    public function getNbreQuest(){
        return $this->nbreQuest;
    }

    public function setNbreQuest($nbreQuest){
        $this->nbreQuest=$nbreQuest;
    }

    public function setlogin($login){
        $this->login=$login;
    }

    public function setFullName($fullName){
        return $this->fullName=$fullName;
    }

    public function setPwd($pwd){
        $this->pwd=$pwd;
    }

    public function setProfil($profil){
        $this->profil=$profil;
    }
    public function setAvatar($avatar){
        $this->avatar=$avatar;
    }

    public function setScore($score){
        $this->score=$score;
    }


    public function calculScore(){

        return null;

    }
    public function hydrate($row){
        if (isset($row['id'])) {
            $this->id=$row['id'];
        }

        if (isset($row['fullName'])) {
            $this->fullName=$row['fullName'];
        }

        if (isset($row['login'])) {
            $this->login=$row['login'];
        }

        if (isset($row['pwd'])) {
            $this->pwd=$row['pwd'];
        }

        if (isset($row['profil'])) {
            $this->profil=$row['profil'];
        }

        if (isset($row['avatar'])) {
            $this->avatar=$row['avatar'];
        }

        if (isset($row['score'])) {
            $this->score=$row['score'];
        }

        if (isset($row['nbreQuest'])) {
            $this->nbreQuest=$row['nbreQuest'];
        }
       
       
       
       
       
       
       
    }
}