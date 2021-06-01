
<!DOCTYPE html>
<html>
<head>
    <title>Disposer Annonce</title>
    <?php require './serveur/head.php';?>
    <link rel="stylesheet" type="text/css" href="CSS/disposer_annonce.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./scripts/disposer_annonce.js" defer></script>
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
          background-position: right 15px center;
      }
    </style>

  </head>
<body>

  <div class="container-fluid">
    <div class="row col-lg-13">
     <form class="form col-12" method="POST" id="form">
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
            <select class="form-control" name="ofr">
             <option value="201">Vente</option>
             <option value="202">Location (Par mois)</option>
             <option value="203">Location (Par nuit)</option>   
            </select>
            
         </div>
        <div class="form-group col-md-6 col-lg-5">  
          <label for="villes">Villes :</label>
            <select class="form-control" name="villes" id="vil" onchange="myFunction()">
              <?php 
                $l=301;
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
            <select class="form-control" name="Sec" id="sect">
            </select>
              
         </div>
        <div class="form-group col-md-6 col-lg-5">  
            <label for="area">Adresse (optionnel)</label>
            <textarea id="area" class="form-control" name="Adresse"><?php echo @$inputs["Adresse"] ;?></textarea>
         </div>


        <div class="container-fluid">
          <label style="margin-top: 2%;">
            <h3>Détails du Bien</h3>
          </label><br />
          <div class="row" style="margin-left:2%">
             <div class="form-outline col-sm-3">    
                <label for="Chbr">Chambres</label>    
               <div class="col-10" name="Chbr"> 
                 <select class="form-control" name="N-Chbr">
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
                 <select class="form-control" name="N-Sdb" >
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
                 <input type="number" name="Srf_Tot" id="Srf_Tot" class="form-control" min="0" placeholder="0" value="<?php echo @$inputs["Srf_Tot"] ;?>">
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
                <input type="text" name="Titre" id="Titre" class="form-control Titre-area" placeholder="Vos Titre" value="<?php echo @$inputs["Titre"] ;?>">
               </div>
            </div>
            <div class="form-outline col-sm-6">
             <label for="Titre-area" style=" margin-left: 2%;">Prix de l'annonce</label>
               <div class="input-group" >
                 <input type="number" class="form-control" name="Prix" id="Prix" min="0" placeholder="0" value="<?php echo @$inputs["Prix"] ;?>">
                  <div class="input-group-prepend">
                  <div class="input-group-text">DH</div>
                 </div>
               </div>
            </div>

          </div>
              <div class="form-group">   
                <label for="Descript" style="margin-left: 1%;">Description de l'annonce </label>
                <textarea id="Descript" name="Descript" style="height:100px;" class="form-control" value="<?php echo @$inputs["Descript"] ;?>"></textarea>
             </div>
      </div>
       <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary" style="border:solid 1px black;">Submit</button>


       <input type="text" name="select_info" id="linkin" style="width: 100%; height: 40px; display: none;">
    </form>
     </div> 
    </div> 
  </div>
  <pre id="container" style="display: none;"></pre>
</body>
</html>
