<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
	} 
$user = unserialize($_SESSION['userConnect']);
$questionsParPage=1; //Nous allons afficher 1 question par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
$quest=unserialize($_SESSION['questions']);
$listR=$this->managerR->findAll();



$user->getNbreQuest()
?>
	<footer style="width:680px;height: auto;">
    <div id="form" style="width:680px;height: auto;">
	<div id="rep" style="width:657px">

<?php
//$valu=file_get_contents('./BD/nombre.json');
//$valu=json_decode($valu,true);
if(count($quest)!=0){
	$i=0;
	foreach ($_SESSION as $keys => $valeurs) {
		if($keys!="id" && $keys!="page" && $keys!="connexion" && $keys!="questions" && $keys!="score" && $keys!="userConnect"){
			
     while($i <= $user->getNbreQuest()) { 
			if (isset($quest[$i])) {
				echo '<p style="color: #818181;font-size: 24px;">'.($i+1).'- '.$quest[$i]->getLibelle().'</p><div>';
		

		    
			   
				
				$bonneRep=$this->managerR->findTrueRep($quest[$i]->getIdqtn());
				
				foreach ($bonneRep as $reps => $rep) {
				     foreach ($valeurs as $key => $value) {
								
									
									if($value==$rep->getLibelle()){
										echo '<div style="display: flex;"><p style="color:black;margin-right:10px;">'.$value.'</p><p style="color:green;">True</p></div>';
										$score=$quest[$i]->getNbrePoint();
										$_SESSION['score']=$_SESSION['score']+$score;
									    
									}else {
										echo '<div style="display: flex;"><p style="color:black;margin-right:10px;">'.$value.' </p><p style="color:red;">False</p></div></div>';
									
									}
								}
								
							}
						
						
					
				
				  
				
			}
		break;
		}
		$i++;
}
}
}
?>
<h1>Votre score est <?= $_SESSION['score'] ?> points</h1>

</div>
<center id="bas">
	<div id="g"><form method="post" action="<?=WEBROOT?>/jeu/joueurInt">
			<button id ="bouton21" type="submit"style="margin-top: 2px;width: 123px;height: 69px;margin-left: -72px;color:white;" name="rejouer">
                        REJOUER
                    </button>  
					</form></div>
	
</center>
	  </div>
	  <?php
	  		if($user->getScore() < $_SESSION['score']){
	        $this->manager->NewScore($user->getId(),$_SESSION['score']);
			$user->setScore($_SESSION['score']);
		 }
      ?>
</footer>
