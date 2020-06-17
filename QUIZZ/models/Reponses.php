<?php
class Reponses implements IManager{
    private $idRep;
    private $libelle;
    private $idqtn;
    private $repVrai;


    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function hydrate($row){
        if (isset($row['idRep'])) {
            $this->idRep=$row['idRep'];
        }
        if (isset($row['libelle'])) {
            $this->libelle=$row['libelle'];
        }
        if (isset($row['idqtn'])) {
            $this->idqtn=$row['idqtn'];
        }
        if (isset($row['repVrai'])) {
            $this->repVrai=$row['repVrai'];
        }
       
       
       
       
    }


    public function getIdRep(){
        return $this->idRep;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function getIdqtn(){
        return $this->idqtn;
    }
    public function getRepVrai(){
        return $this->repVrai;
    }

    public function setRepVrai($repVrai){
        $this->repVrai=$repVrai;
    }

    public function setIdqtn($idqtn){
        $this->idqtn=$idqtn;
    }

    public function setLibelle($libelle){
        $this->libelle=$libelle;
    }

    
}