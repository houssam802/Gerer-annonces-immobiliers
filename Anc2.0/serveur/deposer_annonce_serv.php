<?php
   session_start();
   $_SESSION["valider"]="false";
   $_SESSION["selects"]=array();


   $id=1;

   @$df=$_POST['select_info'];
   $inputs=array();
   $bin=array("Piscine"=>"0","Jardin"=>"0","Balcon"=>"0","Ascenseur"=>"0","Terrasse"=>"0","Meublé"=>"0","Sécurité"=>"0","Parking"=>"0","Duplex"=>"0","Concierge"=>"0");
    $i=1;
    $remplir=true;
    foreach ($_POST as $key => $value) {
         if($key!="submit"){
          @$inputs[$key]=$_POST[$key];
         }
    }
   $valid=true;
    if(isset($_POST['submit'])){

     foreach ($_POST as $key => $value) {
     if(empty($value) && $key!="submit" && $key!="file" && $key!="Adresse" && $key!="img_info"){
                 $valid=false;
       }
     }
      $_SESSION["selects"]=explode("  ", $df);
      $sim=similar_text($_SESSION["selects"][3], 'CHOISISSEZ VOTRE SECTEUR', $pourc);
      if($sim>=18) $valid=false;
      if($valid==true){
             ///////////////////////////////////////
           //////////////////////////////////////
            foreach($bin as $key2 => $value2){
              if(!empty($_POST['suplem'])){
                foreach($_POST['suplem'] as $value1){
                  if($i==$value1){
                      $bin[$key2]="1";
                  }
                }
              }
              if($i<=sizeof($bin)-1){
                  $i+=1;
              }
            }  
            $_SESSION["inputs"]=$inputs;
              $_SESSION["mp"]=implode('',$bin);
              $_SESSION["prix"]=(int)$inputs["Prix"];
              $_SESSION["surf_tot"]=(int)$inputs["Srf_Tot"];
              $_SESSION["nbr_chbr"]=(int)$_SESSION["selects"][4];
              $_SESSION["nbr_bain"]=(int)$_SESSION["selects"][5];

        $_SESSION["valider"]="true";
       }
    }

    if(isset($_POST['submit'])){
      foreach ($_POST as $key => $value) {
         if(empty($value) && $key!="submit" && $key!="file" && $key!="Adresse" && $key!="img_info"){
            echo "  key=$key";
          }
      }
      if($sim>=18) echo "  sim=$sim";      
              
    }



?> 