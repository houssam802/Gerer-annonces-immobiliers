<?php require './serveur/modifier_annonce_serv.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Modification d'Annonce</title>
    <?php require './serveur/head.php';?>
    <link rel="stylesheet" type="text/css" href="CSS/disposer_annonce.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      .col-sm-3 .input-group input[type="number"]{
          height:114.8%;
      }
      option:nth-child(1):hover{
        background-color: red;
      }
      .col-lg-5 .form-control.is-invalid, .was-validated .form-control:invalid{
          border-color: #dc3545;
          padding-right: calc(1.5em + .75rem);
          background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
          background-repeat: no-repeat;
          background-position: right 15px center;
          background-size: calc(.75em + .375rem) calc(.75em + .375rem);
      }
    </style>
  </head>
<body>
  <div class="container-fluid">
    <div class="row col-lg-13">
     <form id="<?php echo $_GET['annonce'] ?>" class="form col-12" method="post">
         <div class="form-group col-md-6 col-lg-5"> 
            <label for="T-biens">Type du Bien :</label>
            <select class="form-control" name="T-biens" id="i1">
             <option value="101" class="lip">Appartements</option>
             <option value="102" class="lip">Maisons</option>
             <option value="103" class="lip">Villas</option>
             <option value="104" class="lip">Chambres</option>
             <option value="105" class="lip">Terrains et Fermes</option>
             <option value="106" class="lip">Bureaux et Plateaux</option>
             <option value="107" class="lip">Magasins,Commerces et Locaux industriels</option>  
            </select>
         </div>
        <div class="form-group col-md-6 col-lg-5">  
            <label for="ofr">Offres :</label>
            <select class="form-control" name="ofr" id="i2">
             <option value="201">Vente</option>
             <option value="202">Location (Par mois)</option>
             <option value="203">Location (Par nuit)</option>   
            </select>
            
         </div>
        <div class="form-group col-md-6 col-lg-5">  
          <label for="villes">Villes :</label>
            <select class="form-control" name="villes" id="vil" onchange="myFunction()">
              <?php 
                $l=1;
                $cont=fopen('qartiers/villes.txt','rb');
                while(!feof($cont)){
                  $ligne=fgets($cont);
                  echo "<option value=\"$ligne\">$ligne</option>";
                  $l++;
                }
              ?>
            </select>
         </div>
        <div class="form-group col-md-6 col-lg-5">  
          <label for="Sec">Secteurs:</label>
            <select class="form-control" name="Sec" id="sect" title="choisissez">
            </select>
              
         </div>
        <div class="form-group col-md-6 col-lg-5">  
            <label for="area">Adresse (optionnel)</label>
            <textarea id="area" class="form-control" name="Adresse" onclick="tt()"><?php echo @$inputs["Adresse"] ;?></textarea>
         </div>


        <div class="container-fluid">
          <label style="margin-top: 2%;">
            <h3>Détails du Bien</h3>
          </label><br />
          <div class="row" style="margin-left:2%">
             <div class="form-outline col-sm-3">    
                <label for="Chbr">Chambres</label>    
               <div class="col-10" name="Chbr"> 
                 <select class="form-control" name="N-Chbr" id="N-Chbr">
                     <option value="Ch1">1</option>
                     <option value="Ch2">2</option>
                     <option value="Ch3">3</option> 
                     <option value="Ch4">4</option> 
                     <option value="Ch5">5</option> 
                     <option value="Ch6">6</option> 
                     <option value="Ch7">7</option>   
                     <option value="Ch8">8</option> 
                     <option value="Ch9">9</option> 
                     <option value="Ch10+">10+</option> 
                  </select>
               </div> 
             </div>
              <div class="form-outline col-sm-3">   
                <label for="Sdb">Salle de bain</label>    
               <div class="col-10" name="Sdb"> 
                 <select class="form-control" name="N-Sdb" id="N-Sdb" >
                     <option value="Sd1">1</option>
                     <option value="Sd2">2</option>
                     <option value="Sd3">3</option> 
                     <option value="Sd4">4</option> 
                     <option value="Sd5">5</option> 
                     <option value="Sd6">6</option> 
                     <option value="Sd7+">7+</option>    
                  </select>
               </div> 
             </div>
              <div class="form-outline col-sm-3">   
               <label for="Srf-T" style="margin:0;margin-bottom:2.5%;margin-left:3%;">Surface Totale </label>    
                 <div class="input-group Srf-T">
                 <input type="number" name="Srf_Tot" id="Srf_Tot" class="form-control" min="0" placeholder="0" value="<?php echo $tab["superficie_offre"] ;?>">
                   <div class="input-group-prepend">
                    <div class="input-group-text">m<sup>2</sup></div>
                   </div>
                 </div>
             </div>
         </div>
       </div>
        <div class="container-fluid">
          <label>
            <h3>Détails supplémentaires</h3>
            Vous pouvez sélectionner un ou plusieurs critères
          </label><br />
          <br />
          <div class="row">
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="1" id="1" class="check">
                <label class="lab" for="1">Piscine</label> 
             </div>
              <div class="form-outline col-xs-4 col-md-3 col-lg-1">   
                <input type="checkbox" name="suplem[]" value="2" id="2" class="check">
                <label class="lab" for="2">Jardin</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="3" id="3" class="check">
                <label class="lab" for="3">Balcon</label>
             </div>
              <div class="form-outline col-xs-4 col-md-3 col-lg-1">   
                <input type="checkbox" name="suplem[]" value="4" id="4" class="check">
                <label class="lab" for="4">Ascenceur </label> 
             </div>
              <div class="form-outline col-xs-4 col-md-3 col-lg-1">   
                <input type="checkbox" name="suplem[]" value="5" id="5" class="check">
                <label class="lab" for="5">Terrasse</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="6" id="6" class="check">
                <label class="lab" for="6">Meublé</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="7" id="7" class="check">
                <label class="lab" for="7">Sécurité</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="8" id="8" class="check">
                <label class="lab" for="8">Parking</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="9" id="9" class="check">
                <label class="lab" for="9">Duplex</label>
             </div>
             <div class="form-outline col-xs-4 col-md-3 col-lg-1">    
                <input type="checkbox" name="suplem[]" value="10" id="10" class="check">
                <label class="lab" for="10">Concierge</label>
             </div>
         </div>
       </div>
       <div class="container-fluid">
          <label>
            <h3>Détails supplémentaires</h3>
            Vous pouvez sélectionner un ou plusieurs critères
          </label><br />
          <br />
          <div class="row">
           <div class="form-outline col-sm-6">
               <div class="form-group">   
                <label for="Titre-area" style="margin-left: 2%;">Titre de l'annonce</label>
                <input type="text" name="Titre" id="Titre" class="form-control Titre-area" placeholder="Vos Titre" value="<?php echo  $tab["nom_offre"] ;?>">
               </div>
            </div>
            <div class="form-outline col-sm-6">
             <label for="Titre-area" style=" margin-left: 2%;">Prix de l'annonce</label>
               <div class="input-group" >
                 <input type="number" class="form-control" name="Prix" id="Prix" min="0" placeholder="0" value="<?php echo $tab["prix_offre"] ;?>">
                  <div class="input-group-prepend">
                  <div class="input-group-text">DH</div>
                 </div>
               </div>
            </div>

          </div>
              <div class="form-group">   
                <label for="Descript" style="margin-left: 1%;">Description de l'annonce </label>
                <textarea id="Descript" name="Descript" style="height:100px;" class="form-control"><?php echo $tab["description_offre"] ;?></textarea>
             </div>
      </div>
       <button type="submit" name="submit" class="btn btn-lg btn-primary" style="border:solid 1px black;">Submit</button>


       <input type="text" name="select_info" id="linkin" style="width: 100%; height: 40px; display: none;">
    </form>
     </div> 
    </div> 
  </div>
  <pre id="container" style="display: none;"></pre>

  <script src="./scripts/modifier_annonce.js"></script>
  <script defer>
       found("i1","<?php echo $tab["categorie_offre"];?>");
       found("i2","<?php echo $tab["type_offre"];?>");
       found("vil","<?php echo $tab["localisation_ville_offre"];?>");
       found("N-Sdb","<?php echo $tab["nmbre_saledebain"];?>");
       found("N-Chbr","<?php echo $tab["nmbre_pieces_offre"];?>");
       setTimeout(found2, 500,'<?php echo $tab["localisation_quartier_offre"];?>');



      function found(parent,fils){
        part=document.getElementById(""+parent+"");
         var patt = new RegExp("^"+fils+"$");
        if(parent!="vil" && parent!="i2"){
          for(var i=1;i<=(part.childNodes.length-1)/2;i++){
            if(patt.test(part.querySelector('option:nth-child('+i+')').innerHTML)){
              enf=part.querySelector('option:nth-child('+i+')').getAttribute("value");
               $('#'+parent+'').val(enf);
                $( "select" ).change();
            }
          }
        }else{
          if(parent=="vil"){
            for(var i=1;i< <?php echo $l;?>;i++){
              if(part.querySelector('option:nth-child('+i+')').innerHTML.includes(fils)){
                enf=part.querySelector('option:nth-child('+i+')').getAttribute("value");
                 $('#'+parent+'').val(enf);
                 $( "select" ).change();
                }
             }
          }else{
            for(var i=1;i<(part.childNodes.length-1)/2;i++){
              if(part.querySelector('option:nth-child('+i+')').innerHTML==fils){
                enf=part.querySelector('option:nth-child('+i+')').getAttribute("value");
                 $('#'+parent+'').val(enf);
                 $( "select" ).change();
                }
             }
          }
         }
         
        }

    <?php $i=1;
     foreach ($bin2 as $key => $value) {
      if($value==1){ ?>
        $("#<?php echo $i ?>").prop("checked", true);
    <?php }
       $i++;
     } ?>

 </script>
</body>
</html>
