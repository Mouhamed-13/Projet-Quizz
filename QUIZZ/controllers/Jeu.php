<?php
   
  class Jeu extends Controller {
    public function __construct(){
      parent::__construct();

        $this->dirname="jeu";
        $this->layout="layout_joueur"; 
        $this->manager=new UserManager();
        $this->managerQ=new QuestionManager();
        $this->managerR=new ReponseManager();
        
    }

    public function listeJoueur(){
       $this->layout="layout_admin";
       $this->views="listeJoueur";
       $this->render();
    
    }
    public function joueurInt(){
      $result=[];
      if(isset($_POST['rejouer'])){
        foreach ($_SESSION as $keys => $valeurs) {
          if($keys!="id" && $keys!="page" && $keys!="connexion" && $keys!="questions" && $keys!="score" && $keys!="userConnect"){
            unset($_SESSION[$keys]);
          }
        }
        $_SESSION['id']=0;
        $_SESSION['score']=0;
        $_SESSION['page']=1;
        $_SESSION['connexion']=0;

      }


        if (isset($_POST['suive'])) {
          foreach ($_POST as $key => $val) {
            if($key!="suive"){
            $result[$key]=$val;   
            }
          }
            $id= $_SESSION['id'];
            $id++;
            $_SESSION["coche".$id]=$result;
            $_SESSION['id']=$id;
            $pageActuelle=$_SESSION['page'];
            $pageActuelle++;
            $_SESSION['page']=$pageActuelle;
            
          }elseif (isset($_POST['precede'])) {


            $id= $_SESSION['id'];

              unset($_SESSION["coche".$id]);
              
              $id--;
              $_SESSION['id']=$id;

            $pageActuelle=$_SESSION['page'];
            $pageActuelle--;
            $_SESSION['page']=$pageActuelle;



          }elseif (isset($_POST['termine'])) {
            foreach ($_POST as $key => $val) {
              if($key!="termine"){
              $result[$key]=$val;   
              }
            }
              $id= $_SESSION['id'];
              $id++;
              $_SESSION["coche".$id]=$result;
              $_SESSION['id']=$id;
            return $this->Recap();
          }
      $this->data['user']=$_SESSION['userConnect'];
      $this->layout="layout_joueur";
      $this->views="joueurInt";
      $this->render();  
    }

    

    public function Recap(){
      $this->views="Recap";
      $this->render();
      
        
    }

    public function passerQuestion(){
         echo 0; 
    }

   }
