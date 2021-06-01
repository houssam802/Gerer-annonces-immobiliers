<?php require './serveur/modifier_image_serv.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Modification images</title>
    <?php require './serveur/head.php';?>
    <link rel="stylesheet" type="text/css" href="CSS/disposer_image.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./scripts/modifier_image.js"> </script>
    <style>
    .files{
        align-content: flex-start;
        border: 2px dashed #57596c !important;
        width:100%;
        margin: 0;
        padding: 0;
    }
    #input_contenair{
        display:flex;
        flex-direction:column; 
        background-color:white;
        border-radius: 0.3rem;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    #input_contenair_enf1{
      background-image: url('Images/download_icon.png');
      background-size:30%;
      background-position: 50% 50%;
      background-repeat: no-repeat;
      width: 100%;
      height: 70%;
      cursor: pointer;
    }
    #input_contenair_enf2{
      text-align: center;
      color: #57596c;
      font-size: 14pt;
      font-family: sans-serif;
      cursor: pointer;
    }
    </style>
    

</head>
<body>
  <div class="container-fluid">
    <div class="row col-lg-13">
     <form class="form col-12" method="post">
       <div class="container-fluid">
         <label>
            <h3>Disposer vos photos</h3>
          </label><br />
           <div class="row form-group" id="parent" style="display:flex; width:100%;height:100%; justify-content: flex-start; padding: 0;margin-left: 0; padding-left:2%;">
             <div class="col-sm-6 col-md-3" style=" display:flex; height:175px;order:2;padding: 0; margin:0; margin-right: 4%;">
              <div class="form-group files">
                <input id="file" type="file" name="file" style="display: none;" class="form-control" />
                <label id="input_contenair" for="file">
                  <div id="input_contenair_enf1"></div>
                  <label id="input_contenair_enf2">Clique ici</label>
                </label>
               </div>
             </div>
          </div>
      </div>
      
         <button type="submit" name="submit" class="btn btn-default" id="disposer" style="border:solid 1px black;">Submit</button>


      <input type="text" name="img_info" id="img_infos" value="" style="width: 100%; height: 40px; display: none;">

     </form> 
    </div> 
  </div>

  <?php
      $bd=@mysqli_connect("localhost","root","","sakankbdd") or die("Erreur de connexion");
      $id_image= mysqli_query($bd,"select nom_image from images where id_offre=$id");
        while($imgs = mysqli_fetch_assoc($id_image)){
                  
    ?>
  <script defer>
    var lenght_initial=0;
    par=document.getElementById('parent');
        if(!catalogue_serveur.includes('<?php echo $imgs["nom_image"];?>')){
            catalogue_serveur.push('<?php echo $imgs["nom_image"];?>');
            elem=document.createElement("div");
            elem.setAttribute("id","Cadre"+i+""); 
            elem.classList.add('col-md-3');
            elem.classList.add('col-sm-6');
            elem.classList.add('myClass');
            elem.style.order="1";
            par.appendChild(elem);

            elemimg=document.createElement("img");
            elemimg.setAttribute("id",'<?php echo $imgs["nom_image"];?>'); 
            elem.appendChild(elemimg);

            elem2=document.createElement("div");
            elem2.setAttribute("id","boutton"+i+"");
            elem2.className="blocm";
            elem2.setAttribute("onclick","gg("+i+")");
            elem.appendChild(elem2);
            elem21=document.createElement("div");
            elem22=document.createElement("div");
            elem2.appendChild(elem21);
            elem2.appendChild(elem22);
            document.getElementById('img_infos').value="";
            for( j = 0; j < catalogue_serveur.length; j++){
            document.getElementById('img_infos').value += catalogue_serveur[j] + "   ";
            }

            elemimg.style.width="100%";
            elemimg.style.height="100%";
            elemimg.src='<?php echo $imgs["nom_image"];?>';
            i++;
            lenght_initial++;
        }
  
   </script>
<?php }?>

</body>
