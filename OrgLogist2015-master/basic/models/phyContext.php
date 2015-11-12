<?php

namespace app\models;

class PhyContext {

  private $phyModel;

  public function setPhyModel($onePhyModel){
      $this->phyModel=onePhyModel;
  }
  
  public function getVolume(){
      return $this->phyModel->handleVol();
  }
  
  public function getMaxWeight(){
      return $this->phyModel->handleMaxW();
  }
}
