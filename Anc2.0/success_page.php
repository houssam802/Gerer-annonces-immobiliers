<?php
  session_start();
    if(@$_SESSION["valider2"]!="true" && @$_SESSION["valider"]!="true"){
      header("location:disposer_annonce.php");
      $_SESSION["valider"]!="false";
      $_SESSION["valider2"]!="false";
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Success</title>
     <link rel="stylesheet" href="css/success.css">
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>

<body>

<div class="check_mark">
  <div class="sa-icon sa-success animate">
    <span class="sa-line sa-tip animateSuccessTip"></span>
    <span class="sa-line sa-long animateSuccessLong"></span>
    <div class="sa-placeholder"></div>
  </div>
</div>
<div class="text"><h2>Congratulation, votre Annonce est bien effectuer !</h2></div>
</body>

</html>