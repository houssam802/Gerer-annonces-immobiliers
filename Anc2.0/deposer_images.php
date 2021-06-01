<?php require './serveur/deposer_image_serv.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>deposer Image</title>
    <?php require './serveur/head.php';?>
    <link rel="stylesheet" type="text/css" href="CSS/deposer_image.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="./scripts/deposer_image.js" defer></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row col-lg-13">
     <form class="form col-12" method="post">
       <div class="container-fluid">
         <label>
            <h3>deposer votre photos</h3>
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
      
         <button type="submit" name="submit" class="btn btn-default" id="deposer" style="border:solid 1px black;">Submit</button>


      <input type="text" name="img_info" id="img_infos" value="" style="width: 100%; height: 40px; display: none;">

     </form> 
    </div> 
  </div>
</body>
