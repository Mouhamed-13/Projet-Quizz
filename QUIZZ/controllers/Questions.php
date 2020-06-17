<?php
   
  class Questions extends Controller {
    public function __construct(){
      parent::__construct();

        $this->dirname="questions";
        $this->layout="layout_admin";
        $this->manager=new QuestionManager();
        $this->managerR=new ReponseManager();
        $this->managerU=new UserManager();
        
    }

    public function listQ(){
       $this->views="listQ";
       $this->render();

       if (isset($_POST['btn_submitNbre'])) {
       
        extract($_POST);

           $this->validator->is_empty($nbreQ,'nbreQ',"nombre de question Obligatoire");

           if ($this->validator->is_valid()) {

             $this->validator->is_positif($nbreQ,'nbreQ',"nombre de question Obligatoire");

             if ($this->validator->is_valid()) {
              $user = unserialize($_SESSION['userConnect']);
              $allUser=$this->managerU->AllUser();
              foreach ($allUser as $key => $users) {
                
              
              $updat=$this->managerU->NbreQuest($users->getId(),$nbreQ);
              if ($updat[0]!=0) {
                $nbre=$this->managerU->findNbreQuestById($users->getId());
                $nbre[0]->setNbreQuest($nbreQ);
              }

            }
               $id= $_SESSION['id'];
               $id++;
               $_SESSION['nbreQ'.$id]=$nbreQ;
               $_SESSION['id']=$id;

             }else {
               $erreurs= $this->validator->getErrors();
               $this->data['err_NbrQ']=$erreurs['nbreQ'];
               $this->render();
             }

           }else {
             $erreurs= $this->validator->getErrors();
             $this->data['err_NbrQ']=$erreurs['nbreQ'];
             $this->render();
           }
          
        
      }
      
       
    
    }
    public function creerQuestion(){
        $this->views="creerQuestion";
        $this->render();
        if(isset($_POST['enregistQuest'])){

          extract($_POST);

          
          $this->validator->is_empty($quest,'quest');
          $this->validator->is_empty($nbre,'nbre');
          $this->validator->is_empty($choise,'choise');
          

          if($this->validator->is_valid()) {

            //Connexion a la Base Donnée
/*
            ;*/
            
            $answer=$this->manager->questionExist($quest);
            if ($answer==null) {
            $user = unserialize($_SESSION['userConnect']);
            $questionInsert=new Question();
            $questionInsert->setLibelle($quest);
            $questionInsert->setNbrePoint($nbre);
            $questionInsert->setType($choise);
            $questionInsert->setId($user->getId());


            $id= $_SESSION['id'];
            $id++;
            $_SESSION["Resultat".$id]=$questionInsert;
          
            $_SESSION['id']=$id;
            
            

            $result=$this->manager->create($questionInsert);

            switch ($questionInsert->getType()) {
              case 'cm':
                
                for($i=2;$i<count($fichier1)+2;$i++){
                  $reponseInsert=new Reponses();

                   $reponseInsert->setIdqtn($result[1]);
                  $reponseInsert->setLibelle($fichier1[$i]);
                
                for($j=$i;$j<count($fichier1)+2;$j++){
                  if (array_key_exists($j, $fich1)) {
                    
                   
                  if($i-1==$fich1[$j]){
                    $reponseInsert->setRepVrai(1);
                     
                   }else{
                    $reponseInsert->setRepVrai(0);
                    
                   }
                $rep=$this->managerR->reponseExist($fichier1[$i],$result[1]);
                if ($rep==null) {
                  $resultR=$this->managerR->create($reponseInsert);
                }
                break;
               }
              }

              }
                break;
              case 'cs':
                  
                for($i=2;$i<count($fichier)+2;$i++){
                  $reponseInsert=new Reponses();

                   $reponseInsert->setIdqtn($result[1]);
                  $reponseInsert->setLibelle($fichier[$i]);

                  if($i-1==$fich){
                    $reponseInsert->setRepVrai(1);
                     
                   }else{
                    $reponseInsert->setRepVrai(0);
                    
                   }
                $rep=$this->managerR->reponseExist($fichier[$i],$result[1]);
                if ($rep==null) {
                  $resultR=$this->managerR->create($reponseInsert);
                }
                
               

              }
                break;
              
              case 'ct':
                    
                  $reponseInsert=new Reponses();

                   $reponseInsert->setIdqtn($result[1]);
                  $reponseInsert->setLibelle($fichierT);
                  $reponseInsert->setRepVrai(1);
                   
                $rep=$this->managerR->reponseExist($fichierT,$result[1]);
                if ($rep==null) {
                  $resultR=$this->managerR->create($reponseInsert);
                }
                    break;
              
              default:
                # code...
                break;
            }
            
            if($result[0]==1){
              $this->data['err_login']="Question créé avec succés";
              $_SESSION['errorQ']=$this->data['err_login'];
              $this->layout="layout_admin";
              $this->views="creerQuestion";
              
              $this->render();
              

              }

            }else {
              $this->data['err_login']="Question existe déja";
              $_SESSION['errorQ']=$this->data['err_login'];
              $this->layout="layout_admin";
              $this->views="creerQuestion";
              $this->render();

           }
      

    }/*else{
      $erreursQ= $this->validator->getErrors();
      $this->data['erreursQ']=$erreursQ;
      $this->views="creerQuestion";
      $this->render();
      
      $errors=$validator->getErrors();
      if(isset($errors['longueur'])){
          $longueur="";
      }
      if(isset($errors['largeur'])){
          $largeur="";
      }
    }
      */
     

    }
    }

    public function passerQuestion(){
         echo 0; 
    }

   }
