<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
           return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)===0;
    }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
    }
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                   $this->is_number($nombre,$key);
                   if($this->is_valid()){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
                    }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){
    $this->is_positif($nbre1,$key1);
    $this->is_positif($nbre2,$key2);
   if($this->is_valid()){
           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   }

}

public function  is_empty($nbre,$key,$sms=null){
    if(empty($nbre)){
        if($sms==null){
            $sms="Le champs  est Obligatoire";
        }
        $this->errors[$key]= $sms;

        }
    }


    
//Expressions Régulières
    public function  is_email($valeur,$key,$sms=null){
    
    }

    //9chiffres , commence par 77,78,75,76,70
    public function  is_telephone($valeur,$key,$sms=null){
    
    }

    public function is_egal($val1,$val2,$key,$sms=null){
        if($val1!=$val2){
            $sms="Les 2 valeurs saisis sont différents !";
            $this->errors[$key]=$sms;
        }
    }     


    public function  is_image($nbre,$key,$target_dir,$sms=null){
        if($target_dir!=null){

            $target_file = $target_dir . basename($_FILES[$nbre]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
            // Check if image file is a actual image or fake image
            
            $check = getimagesize($_FILES[$nbre]["tmp_name"]);
            if($check !== false) {
               $uploadOk = 1;
            } else {
                $sms= "File is not an image.";
               $uploadOk = 0;
            }
            
   
            // Check if file already exists
            if (file_exists($target_file)) {
                $sms="Sorry, file already exists.";
                $uploadOk = 0;
            }
   
            // Allow certain file formats
            if($imageFileType != "png" && $imageFileType != "jpeg") {
                $sms="Sorry, only JPEG & PNG files are allowed.";
                $uploadOk = 0;
            }
   
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $sms="Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES[$nbre]["tmp_name"], $target_file)) {
                return True;
            } else {
                $sms="Sorry, there was an error uploading your file.";
            }
            }
         
        }else{
            $sms="Le dossier spécifié n'est pas valide";
        }

            $this->errors[$key]= $sms;
    
}


}
?>