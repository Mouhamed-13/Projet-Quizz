<?php  $listU=$this->manager->findAllByScore();

    define("NBREVALEURPARPAGE",15);
    $totalValeur=count($listU);
    $nbrePage=ceil($totalValeur/NBREVALEURPARPAGE);
        ?>

<div class="container right" style="width: 700px; height:auto; display:flex;flex-direction:row;margin-top:-155px">
<div class="LJjoueurListe">
		<div class="LJtopJoueur" style="display: flex;flex-direction: column;margin-top: 160px;align-items: center;"> <strong style="color:#818181;font-size: 24px;"> LISTE DES JOUEURS PAR SCORE </strong></div>
		
		<div class="LJmiddleJoueur" style="border:solid 1px #51bfd0;height: auto;padding: 0px 60px 0px 60px;width: auto;border-radius: 10px;">
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
           ?>

<table style="color: #818181;font-size: 23px;margin-left: 22px;">
       
       <tr style="border-spacing: 10%;">
           <th style="">Nom</th>
           <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           
           <th style="">Prénom</th>
           
           <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           <th style="">Score</th>
       </tr>


           <?php
  
      for ($i=$indiceDepart; $i <= $indicefin ; $i++) { 
        if (isset($listU[$i])) {
            $nomC= explode (" ",$listU[$i]->getFullName());
          
            ?>

       
       
                   <tr style="font-size: 21px;">
                       <td style=""><?php if(isset($nomC[1])){ echo $nomC[1]; } ?></td>
                       
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td style=""><?php if(isset($nomC[0])){ echo $nomC[0]; } ?></td>
                       
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                       <td style=""><?= $listU[$i]->getScore() ?></td>
                   </tr> 
       
       
          
          
        
        
        
    <?php
        }
      }
         ?>
		</table>
		</div>
        

		<div class="LJbottomJoueur">
        <div class="flex-container" style="display:flexbox;display: flex;flex-wrap: nowrap;justify-content: flex-end;margin-left: -520px;">
       
        <?php if ($pageActuel >1 ) {
      ?>
        <a type="submit" role="button" class="btn pt-2" href="<?=WEBROOT?>/jeu/listeJoueur/<?= $precedent ?>" style=" width:100px;height:40px ; background-color:#3addd6 ; color: #f8fdfd;margin: 4px -1px 0px 520px">Précédent </a>
                       
                        <?php } 
                if ($pageActuel !=$nbrePage ) {
        
        ?>

		<a type="submit" role="button" class="btn pt-2" href="<?=WEBROOT?>/jeu/listeJoueur/<?= $suivant ?>" style=" width:100px;height:40px ; background-color:#3addd6 ; color: #f8fdfd;margin: 4px 9px 0px 442px">Suivant</a>
		
                        <?php } ?>
        </div>
		</div>
	</div>
        </div>