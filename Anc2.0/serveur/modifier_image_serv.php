<?php
  session_start();
  $id= $_SESSION['indice'];
    if(@$_SESSION["modifier"]!="true"){
      header("location:Modifier_annonce.php");
      echo $_SESSION["valider"];
      exit();
    }
   $bd=@mysqli_connect("localhost","root","","sakankbdd") or die("Erreur de connexion");
   $offres= mysqli_query($bd,"select *  from offres where id_user=1 and id_offre=$id ORDER BY id_offre DESC");
   $tableaux = mysqli_fetch_assoc($offres);
   $keys_bd= array();
   foreach ($tableaux as $key => $value) {
     array_push($keys_bd,$key);
   }
   $inputss=$_SESSION["inputs"];
   $selectss=$_SESSION["selects"];
   $album=array();
    $i=1;
   if(isset($_POST['submit'])){
      @$alb=$_POST['img_info'];
      $album=explode("   ", $alb);
      $timestamp = date('Y-m-d H:i:s');
      mysqli_query($bd,"UPDATE offres SET $keys_bd[2]='$_SESSION[prix]',$keys_bd[3]='$inputss[Titre]',$keys_bd[5]='$selectss[2]',$keys_bd[6]='$selectss[3]',$keys_bd[7]='$_SESSION[surf_tot]',$keys_bd[8]='$selectss[1]',$keys_bd[9]='$selectss[0]',$keys_bd[10]='$_SESSION[nbr_chbr]',$keys_bd[11]='$_SESSION[nbr_bain]',$keys_bd[12]='$inputss[Descript]',$keys_bd[13]='$_SESSION[mp]' WHERE id_offre=$id ") or die("connexion failed");

      $imgs= mysqli_query($bd,"select *  from images where id_offre=$id");
      $tab_img = mysqli_fetch_assoc($imgs);
      if($tab_img!=NULL){
         mysqli_query($bd,"DELETE FROM images WHERE id_offre=$id");
      }
      if(!empty($album)){
        for ($k=0; $k < sizeof($album)-1; $k++) { 
          mysqli_query($bd,"insert into images values ('','$id','$album[$k]')");
        }
      }
      $_SESSION["modifier"]="false";
      header("location:success_page.php");
     
    }
?>

