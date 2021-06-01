<?php
  session_start();
    if(@$_SESSION["valider"]!="true"){
      header("location:deposer_annonce.php");
      exit();
    }
   $bd=@mysqli_connect("localhost","root","","sakankbdd") or die("Erreur de connexion");
   @$alb=$_POST['img_info'];
   $inputss=$_SESSION["inputs"];
   $selectss=$_SESSION["selects"];
   $id=1;
   $album=array();
    $i=1;

   if(isset($_POST['submit'])){
      $album=explode("  ", $alb);
      $timestamp = date('Y-m-d H:i:s');
      mysqli_query($bd,"insert into offres values ('','$id',$_SESSION[prix],'$inputss[Titre]','$timestamp','$selectss[2]','$selectss[3]',$_SESSION[surf_tot],'$selectss[1]','$selectss[0]',$_SESSION[nbr_chbr],$_SESSION[nbr_bain],'$inputss[Descript]','$_SESSION[mp]')") or die("connexion failed");
      $id_of= mysqli_query($bd,"select id_offre  from offres where id_user=$id ORDER BY id_offre DESC");
      $tab=mysqli_fetch_assoc($id_of);
      $id_offre=(int)$tab["id_offre"];
      if(!empty($album)){
        for ($k=0; $k < sizeof($album)-1; $k++) { 
          mysqli_query($bd,"insert into images values ('','$id_offre','$album[$k]')");
        }
      }
      $_SESSION["valider"]="false";
      header("location:success_page.php");
    }
?>