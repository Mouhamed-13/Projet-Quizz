
<div class="container right" style="width: 700px; height:580px;border-radius: 10px; border: solid #51bfd0 3px;margin:19px 0px 0px 0px;align-content: center;">
 <div class="right-one" style="height: 150px;text-align: center;width: 650px;border:solid 1px #51bfd0;margin: 17px 0px 0px 6px;background-color: #e7e8e8;">
<?php
$user = unserialize($_SESSION['userConnect']);
$questionsParPage=1; //Nous allons afficher 1 question par page.
 

//Une connexion SQL doit être ouverte avant cette ligne...
if(!(isset($_SESSION['userConnect'])) || $_SESSION['connexion']==0){
  $quest=$this->managerQ->findAléatoire($user->getNbreQuest());
  $_SESSION['connexion']=1;
  $_SESSION['questions']=$quest;
  $_SESSION['questions']=serialize($quest);
}
$quest=unserialize($_SESSION['questions']);



$listR=$this->managerR->findAll();

 
$total=count($quest); //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.

 
if(isset($_GET['url'])) // Si la variable $_GET['page'] existe...
{
     $lienJ= explode ("/",$_GET['url']);
     if (isset($lienJ[2])) {
      $pageActuelle=intval($lienJ[2]);
     }else {
      $pageActuelle=$_SESSION['page'];
     }
     
 
     if($pageActuelle>$user->getNbreQuest()) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$user->getNbreQuest();
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$precedent = $pageActuelle-1;
$suivant = $pageActuelle + 1;
$premiereEntree=($pageActuelle-1)*$questionsParPage; // On calcule la première entrée à lire
$premierefin=$premiereEntree+$questionsParPage-1;
// La requête sql pour récupérer les messages de la page actuelle.

?>

<div style="margin: 46px 0px 0px 0px;font-family: bold underlined;font-size: 28px;font-weight: bold;font-style: italic;text-decoration: underline;"> QUESTION <?php echo $pageActuelle ?>/<?= $user->getNbreQuest();  ?>:</div>
<div style="margin: 6px 0px 0px 0px;font-family: bold ; font-size: 28px;"> <?php echo $quest[$pageActuelle-1]->getLibelle() ?></div>
</div>
<div class="right-one" style="height: 45px; width: 55px; border:solid 1px #51bfd0 ;margin: 15px 0px 0px 562px; background-color: #e7e8e8;">
<div style="font-family:bold ;font-size: 25px;text-align: center;"> <?php echo $quest[$pageActuelle-1]->getNbrePoint()?>pts</div>
<form action="<?=WEBROOT?>/jeu/joueurInt" method="post">
<?php
  
for($i=$premiereEntree; $i<=$premierefin; $i++){ 


  switch ($quest[$i]->getType()) {
    case 'checkbox':
for ($j=0; $j <count($listR) ; $j++) { 

  if ($listR[$j]->getIdqtn()==$quest[$i]->getIdqtn()) {

    echo '</div>
         <div style=" margin: 0px 0px 0px 64px;font-size: 35px;">
        <input type="checkbox" value="'.$listR[$j]->getLibelle().'" name="fichierC'.$j.'" id="fichier'.$j.'">
        <label >'. $listR[$j]->getLibelle().'</label>';

    }
    
    }
  break;

  case 'radio':
    for ($j=0; $j <count($listR) ; $j++) { 
    
      if ($listR[$j]->getIdqtn()==$quest[$i]->getIdqtn()) {
    
        echo '</div>
             <div style=" margin: 0px 0px 0px 64px;font-size: 35px;">
            <input type="radio" value="'.$listR[$j]->getLibelle().'"  name="fiche" id="fich">
            <label >'. $listR[$j]->getLibelle().'</label>';  
        }
        
        }
      break;

      case 'texte':
        for ($j=0; $j <count($listR) ; $j++) { 
        
          if ($listR[$j]->getIdqtn()==$quest[$i]->getIdqtn()) {
        
            echo '</div>
            <div style=" margin: 0px 0px 0px 64px;font-size: 30px;"><input style="width:400px; height:50px" type="text" name="fichierT" id="fichierT" placeholder="Donnez la bonne réponse">';
        
            }
            
            }
          break;

  }
}


        if ($pageActuelle==1) {
         
        

        ?>
           </div>
           
        <div style="margin-left: 63px;">
            <button type="submit" class="btn pt-2" style="font-family: bold; width:100px;height:50px ; background-color:#818181 ; color: #f8fdfd;margin: 21px 0px 0px 0px" disabled > Precédent </button>
          
          <?php 
          
        }else{
          
          ?>
            </div>
        <div style="margin-left: 63px;">
        <button type="submit" name="precede" class="btn pt-2" style="font-family: bold; width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: 21px 0px 0px 0px" > Precedent </button>
           
            <?php 
        }
            if($pageActuelle != $user->getNbreQuest()){
              
              ?>
               <button type="submit" name="suive" class="btn pt-2" style=" font-family: bold;width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: -78px 7px 0px 458px"> Suivant </button>
              <?php  
            }else{
              ?>
            <button type="submit" name="termine" class="btn pt-2" style=" font-family: bold;width:100px;height:50px ; background-color:#3addd6 ; color: #f8fdfd;margin: -78px 7px 0px 458px"> Terminer </button>
<?php
            }

              ?>
        

        
        </div>
        </form>
        </div>


