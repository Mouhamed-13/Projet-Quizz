<?php
class Question implements IManager{
    private $idqtn;
    private $nbrePoint;
    private $libelle;
    private $type;
    private $id;


    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function hydrate($row){
        if (isset($row['idqtn'])) {
            $this->idqtn=$row['idqtn'];
        }

        if (isset($row['nbrePoint'])) {
            $this->nbrePoint=$row['nbrePoint'];
        }

        if (isset($row['libelle'])) {
            $this->libelle=$row['libelle'];
        }

        if (isset($row['type'])) {
            $this->type=$row['type'];
        } 
        
        if (isset($row['id'])) {
            $this->id=$row['id'];
        } 
          
    }


    public function getIdqtn(){
        return $this->idqtn;
    }

    public function getId(){
        return $this->id;
    }

    public function getNbrePoint(){
        return $this->nbrePoint;
    }

    public function getLibelle(){
        return $this->libelle;
    }
    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type=$type;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setNbrePoint($nbrePoint){
        $this->nbrePoint=$nbrePoint;
    }

    public function setLibelle($libelle){
        $this->libelle=$libelle;
    }

    
}