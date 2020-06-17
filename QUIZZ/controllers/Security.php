<?php
   
  class Security extends Controller {

    public function __construct(){
        //Appel au constructeur de la classe-mére
        parent::__construct();
        $this->dirname="security"; 
        $this->layout="layout_connexion";
        $this->manager=new UserManager();
        
        
    }

    public function loadViewInscriptionA(){
      $this->layout="layout_admin";
      $this->views="inscription";
      $this->render();
     
   }

   public function loadViewInscriptionJ(){
      $this->views="inscription";
      $this->render();
     
   }

    public function index(){
       
       $this->views="connexion";
       $this->render();
       
    }
    public function seConnecter(){
         //extract permet d'extraire les valeurs d'un tableau associatif sur ces clés

         if (isset($_POST['btn_submit'])) {
            //Passer par le formulaire de connexion
              extract($_POST);
              $this->validator->is_empty($login,'login');
              $this->validator->is_empty($pwd,'pwd');
              if ($this->validator->is_valid()) {
               //Connexion à la base de donnée
               $user=null;
               $user= $this->manager->getUserByLoginAndPwd($login,$pwd);
               if(!empty($user)){
                  //Login et mdp correct
               
               $_SESSION['userConnect']=serialize($user);

                     if ($user->getProfil()=="admin") {
                       
                        $this->layout="layout_admin";
                        $this->views="inscription";
                        $this->render();
                     } else {
                        header("location:".WEBROOT."/jeu/joueurInt");
                        $this->dirname="jeu";
                        $this->layout="layout_joueur";
                        $this->views="interfaJ";
                        $this->render();
                     
                        
                     }
               
               }else {
                  //Login ou mdp incorrect
               $this->data['err_login']="Login ou Mot de passe incorrect";
               $this->views="connexion";
               $this->render();
               }
            }else {
               //Champs non remplies
               $erreurs=$this->validator->getErrors();
               $this->data['erreurs']=$erreurs;
               $this->views="connexion";
               $this->render();
            }
         }
         else {
            //Passer par l'url
            $this->index();
         }
      

       
    }

    public function seDeconnecter(){
       //Destruction des données utilisateur
         session_destroy();
         unset($_SESSION['userConnect']);

         $this->views="connexion";
         $this->render();
    }

    public function creerUtlisateur(){
      $target_dir = "./assets/img/Uploads/";


      extract($_POST);
      
      
      

     
      

      if (isset($_POST['btn_inscription'])) {
         
         //Passer par le formulaire de connexion
         //Joueur ou Admin
         $profil="joueur";
         $layout="layout_connexion";
         $views="connexion";
        if (isset($_SESSION['userConnect'])) {
         //Admin
         $profil="admin";
         $layout="layout_admin";
         $views="inscription";
         } 
           


         //Validation image
         
           $this->validator->is_image("imgUser",'image',$target_dir);
           //Validation empty
           $this->validator->is_empty($login,'login');
           $this->validator->is_empty($password1,'password1');
           $this->validator->is_empty($password2,'password2');
           $this->validator->is_empty($nom,'nom');
           $this->validator->is_empty($prenom,'prenom');
           if ($this->validator->is_valid()) {
              //Validation des mots de passe
               $this->validator->is_egal($password1,$password2,'password2',"Les mots de passe sont différents");
               if ($this->validator->is_valid()) {
                  //Login existe
                  $user=$this->manager->loginExist($login);
                  if ($user==null) {
                     $nomComp=$prenom." ".$nom;
                     $userInsert=new User();
                     $userInsert->setLogin($login);
                     $userInsert->setPwd($password1);
                     $userInsert->setFullName($nomComp);
                     $userInsert->setProfil($profil);
                     $userInsert->setAvatar($_FILES["imgUser"]['name']);
                     $result=$this->manager->create($userInsert);
                     
                     if($result==true){
                     $this->data['err_login']="Compte créé avec succés";
                     $this->layout=$layout;
                     $this->views=$views;
                     $this->render();
                     

                     }

                  } else {
                     $this->data['err_login']="Login existe déja";
                     $this->layout=$layout;
                     $this->views="inscription";
                     $this->render();
                     
                  }
                  

           }else {

                  $erreurs=$this->validator->getErrors();
                  $this->data['erreurs']=$erreurs;
                  $this->layout=$layout;
                  $this->views="inscription";
                  $this->render();
              }
              



           }else {
            //Champs non remplies
            $erreurs=$this->validator->getErrors();
            $this->data['erreurs']=$erreurs;
            $this->layout=$layout;
            $this->views="inscription";
            $this->render();
         }

      
         }else {
            $this->layout=$layout;
            $this->views="inscription";
            $this->render();
         }
            
    
    }
   }