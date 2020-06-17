<?php  
       $user = unserialize($_SESSION['userConnect']);
       $id=$user->getId();
       $listQ=$this->manager->findByAdmin($id);//c'est un tableau d'objet de type Question renvoie tous les infos
       $listR=$this->managerR->findAll();//c'est un tableau d'objets de type Reponse renvoie libelle repVrai
      
    define("NBREVALEURPARPAGE",5);
    $totalValeur=count($listQ);
    $nbrePage=ceil($totalValeur/NBREVALEURPARPAGE);
        ?>
        
<div class="container right" style="width: 700px; height:auto;border-radius: 10px; border: solid #818181 1px; display:flex;flex-direction:column; margin-top:21px">
<form action="<?=WEBROOT?>/questions/listQ" method="post">
        <div class="right-one" style="display: flex; align-content: center; ">
        
            <p style="margin: 11px 0px 0px 331px; width: auto;">Nbre de question/Jeu </p>
            <input type="text" name="nbreQ" id="nombre" error="error_number" class="form-control  ml-2 pt-2 " style="height: 30px; width:50px;margin-top:10px;" value="<?php 
            if (isset($_SESSION['nbreQ'.$id])) {
              echo $_SESSION['nbreQ'.$id];
            } else {
              echo $user->getNbreQuest();
            }
            
              ?>">
            <button type="submit" name="btn_submitNbre" onclick="isNumbervalide()" class="btn  pt-2" style=" width:60px;height:40px ; background-color:#3addd6 ; color: #f8fdfd;margin: 5px 7px 0px 6px" >OK</button>
            <small class="text-danger" id="error_number"></small>
        </div>
        <div class="right-deux" style="border:solid 1px #818181; height: auto;border-radius: 10px;">
        <ol > 
        <?php 
        if(isset($_GET['url'])){
          $page= explode ("/",$_GET['url']);
          if(isset($page[2])){
          $pageActuel=$page[2];
          if ($pageActuel < 1) {
            $pageActuel = 1;

          }elseif ($pageActuel>$nbrePage) {
            $pageActuel = $nbrePage;
          }
          
        }else{
          $pageActuel = 1;
        }
  
      }else{
				$pageActuel = 1;
			}
      $indiceDepart=($pageActuel-1)*NBREVALEURPARPAGE ;
      $indicefin=$indiceDepart+NBREVALEURPARPAGE-1;

      $suivant = $pageActuel+1;
	   	$precedent = $pageActuel-1;
       if(count($listQ)!=0){
      for ($i=$indiceDepart; $i <= $indicefin ; $i++) { 
        
        if (isset($listQ[$i])) {
          
        
          
          
        echo '<h5 style="color: #818181">'.($i+1).'- '.$listQ[$i]->getLibelle().'</h5> ';
        switch ($listQ[$i]->getType()) {
          case 'checkbox':
            foreach ($listR as $rep=> $reponse) {
              if ($reponse->getIdqtn()==$listQ[$i]->getIdqtn()) {
                if ($reponse->getRepVrai()==1) {
                  echo '<input type="checkbox" onchange="" style="margin-top: 4px;margin-left: 3px;height: 20px;width: 20px;" checked>
                  <label style="color:black;">'.$reponse->getLibelle().'</label>
                  <br/>';
                } else {
                  echo '<input type="checkbox" onchange="" style="margin-top: 4px;margin-left: 3px;height: 20px;width: 20px;">
                  <label style="color:black;">'.$reponse->getLibelle().'</label>
                  <br/>';
                }
                
              }

            }
            
            break;
          case 'radio':

            foreach ($listR as $rep=> $reponse) {
              if ($reponse->getIdqtn()==$listQ[$i]->getIdqtn()) {
                if ($reponse->getRepVrai()==1) {
                  echo '<input type="radio" onchange="" style="margin-top: 4px;margin-left: 3px;height: 20px;width: 20px;"checked>
                  <label style="color:black;">'.$reponse->getLibelle().'</label>
                  <br/>';
                } else {
                  echo '<input type="radio" onchange="" style="margin-top: 4px;margin-left: 3px;height: 20px;width: 20px;">
                  <label style="color:black;">'.$reponse->getLibelle().'</label>
                  <br/>';
                }
                
              }

            }
              
            
            break;
          
          case 'texte':

            foreach ($listR as $rep=> $reponse) {
              if ($reponse->getIdqtn()==$listQ[$i]->getIdqtn()) {
                
                  echo '<input style="width:400px; height:50px" type="text" placeholder="'.$reponse->getLibelle().'" disabled>';
               
              }

            }

                break;
          
          default:
            # code...
            break;
        }
        
         
        }
      }
    }else{
      echo '<div class="alert alert-danger"><strong>Votre liste des questions est vide !</strong> </div>';
    }
                
         
         
         
         ?>
        </ol> 




        
        
        
      </div>
      <div class="flex-container" style="display:flexbox;display: flex;flex-wrap: nowrap;justify-content: flex-end;margin-left: -520px;">

      <?php if ($pageActuel >1 ) {
      ?>
      <a type="submit" role="button" class="btn pt-2" href="<?=WEBROOT?>/questions/listQ/<?=$precedent?>" style=" width:100px;height:40px ; background-color:#3addd6 ; color: #f8fdfd;margin: 4px -1px 0px 520px">Precedent</a>
      
      <?php } 
      if ($pageActuel !=$nbrePage ) {
      ?>
       
       <a type="submit" role="button" class="btn pt-2" href="<?=WEBROOT?>/questions/listQ/<?=$suivant?>" style=" width:100px;height:40px ; background-color:#3addd6 ; color: #f8fdfd;margin: 4px 9px 0px 442px">Suivant </a>
      
      <?php } ?>
      </div>
      </form>
      </div>


        <script>

        window.onload = function() {
            setTimeout(function(){ 
                    document.getElementById("alert").style.display='none';
                }, 3000);
            }



        
        function isNumbervalide()
        {
          let valid=true;
          const select=document.getElementById("nombre")
          var  nombre=document.getElementById('nombre').value;


          select.addEventListener("keyup",function(event){
                if (event.target.hasAttribute("error")) {
                    //recuperer la valeur de l'attribut error
                    let idSmall=event.target.getAttribute("error")
                    //recuperer l'objet Small
                    const errorSmall=document.getElementById(idSmall)
                    errorSmall.innerText=""
                    //innerHTML=>ajouter du contenu HTML dans une balise HTML
                }

                })


          if(!nombre || !Number.isInteger(+nombre))
          {
            valid=false
              document.getElementById('error_number').innerText="Veuillez entrer un nombre";
              
          }else if(nombre<5)
          {

            valid=false
              document.getElementById('error_number').innerText="Le nombre doit etre supérieur ou égal a 5";
              
          }

          if(valid==false){
         event.preventDefault();
          return false;
                   }

          
      return true ;
}

const radios=document.getElementsByTagName("input")

  for(let radio of radios){
    radio.addEventListener("onchange",function(event){
                if (event.target.hasAttribute("checked")) {
                    //recuperer la valeur de l'attribut error
                    document.getElementsByTagName("input").disabled = false;
                    //innerHTML=>ajouter du contenu HTML dans une balise HTML
                }else{
                  document.getElementsByTagName("input").disabled = true;
                }

                })

  

  }          
        
        
        </script>