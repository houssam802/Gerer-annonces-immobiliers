<?php
  session_start();

  $id=1;

  $indice=@$_GET['annonce'];
  $bd=@mysqli_connect("localhost","root","","sakankbdd") or die("Erreur de connexion");
  if($indice!=''){
  $imgs= mysqli_query($bd,"select *  from images where id_offre=$indice");
      $tab_img = mysqli_fetch_assoc($imgs);
      if($tab_img!=NULL){
         mysqli_query($bd,"DELETE FROM images WHERE id_offre=$indice");
      }
      mysqli_query($bd,"DELETE FROM offres WHERE id_offre=$indice");
      header("location:liste_annonce_personnel.php");
  }
  $indice='';

   $ty_de_bien="";
   $cat="";//categorie
   $surface="";
   $offres= mysqli_query($bd,"select *  from offres where id_user=$id ORDER BY id_offre DESC");
   echo "<div class=\"container col-lg-8 col-md-8 col-sm-12\" style=\"padding: 0; margin:auto; margin-top:20px;\">";
   echo "<div class=\"row container\" style=\"padding:0; margin:auto;\">";
   while($tab = mysqli_fetch_assoc($offres)) {
   	  foreach($tab as $cleusb => $va){
					if($cleusb=="id_offre"){
					$id_image= mysqli_query($bd,"select nom_image from images where id_offre=$va");
					$rempli = 0;
					$imgs = array();
						while($row = $id_image->fetch_assoc()) {
							$rempli=1;
							array_push($imgs,$row["nom_image"]);
						}
					$tab_img='';
					$image_choisi=0;
					echo "<div id=\"$va\" class=\"row contientannonce\" style=\"border:solid 1px black;justify-content:flex-end; margin:auto; margin-bottom:15px; height:190px;\">";
					echo "<div class=\"col-lg-4 col-md-4 col-sm-12 \" style=\"margin:0; padding:0; opacity:0.5;height:100%;\">";
					if($rempli==1){
						foreach($imgs as $valeurr) {
							if ($image_choisi==0) {
								$tab_img="../Anc2.0/".$valeurr;
							  	echo "<img src=\"$tab_img \" width=100% height=100%>";
							} 
							$image_choisi++;
						}
						echo "<div class=\"bottom-left\" style=\"position: absolute; opacity:0.5; bottom: 8px; left: 16px; color:white;\">$image_choisi&nbsp<span class=\"fa fa-camera\"></span></div>";
					}else{
                     	echo "<img src=\"../Anc2.0/Images/defaut_image.jpg\" height=100% width=100%  style=\"border-right:solid 1px black; \">";      
					}
					echo "</div>";
					echo "<div class=\"col-lg-8 col-md-8 col-sm-12\" style=\"margin:0; padding:0;opacity:0.5; padding-left:10px;\">";
				}

				if($va=="Vente") $ty_de_bien=" DH";
				if($va=="Location (Par mois)") $ty_de_bien=" DH/Mois";
				if($va=="Location (Par nuit)") $ty_de_bien=" DH/Nuit";
	  }
			foreach($tab as $cleusb => $va){
					if($cleusb=="prix_offre"){
					echo "<div class=\"container\" style=\"font-size:15pt; margin-bottom:10px;\">";
					echo "<div class=\"row\">";
					echo "<div class=\"col-lg-6 col-md-6 col-sm-6\" style=\" font-weight: bold; padding:0px; font-size:16pt;\">";
					echo number_format($va).$ty_de_bien;
					echo "</div>";
				} 
				if($cleusb=="date_ajout_offre"){
					echo "<div class=\"col-lg-6 col-md-6 col-sm-6\" style=\"font-size:11pt; text-align: right;\">";
					$phpdate = strtotime( $va );
					$mysqldate = date( 'd-m-Y H:i', $phpdate );
					$mysqldatecopy = date( 'd/m/Y H:i', $phpdate );
					$aujourdhui = date('d-m-Y H:i');
					$diff = abs(strtotime($mysqldate) - strtotime($aujourdhui));
					$min = floor($diff / (60*60*24));
					if($min==0){
						$dat = date( 'H:i', $phpdate );
						echo "Aujourd'hui à ".$dat;
					} elseif ($min==1) {
						$dat = date( 'H:i', $phpdate );
						echo "Hier à ".$dat;
					} else echo $mysqldatecopy;
					echo "</div>";
					echo "</div>";
					echo "</div>";
				}
			}
			foreach($tab as $cleusb => $va){
			    if($cleusb=="categorie_offre"){
					$cat=$va;
				}
				if($cleusb=="superficie_offre"){
					$surface=$va;
				}
				if($cleusb=="localisation_ville_offre"){
					$loca_ville=$va;
				}
				if($cleusb=="localisation_quartier_offre"){
					$loca_quartier=$va;
				}
			}
			foreach($tab as $cleusb => $va){
				if($cleusb=="id_offre"){
					echo "<div style=\"font-size:10pt; color:gray;  margin-bottom:10px;\">";
					echo "<span class=\"fa fa-map-marker\"></span>&nbsp&nbsp".$loca_quartier." , ".$loca_ville;
					echo "</div>";
				}
				if($cleusb=="nom_offre"){
					echo "<div style=\"font-size:14pt;  margin-bottom:10px;\">";
					echo ucfirst($va);
					echo "</div>";
				}
				if($cleusb=="nmbre_pieces_offre"){
					echo "<div style=\"font-size:12pt;\">";
					echo $cat."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					echo $va."&nbsp<span class=\"fa fa-bed\"></span>&nbsp&nbsp&nbsp";
				}
				if($cleusb=="nmbre_saledebain"){
					echo $va."&nbsp<span class=\"fa fa-bath\"></span>&nbsp&nbsp&nbsp&nbsp";
					echo $surface." m²";
					echo "</div>";
				}
			}

			echo "</div>";	

		echo "</div>";

	}
	echo "</div>";
	echo "</div>";


	$_SESSION["modifier"]="true";
  
?>


<script defer>
<?php
   $bd=@mysqli_connect("localhost","root","","sakankbdd") or die("Erreur de connexion");
   $offres= mysqli_query($bd,"select *  from offres where id_user=$id ORDER BY id_offre DESC");
   while($tab = mysqli_fetch_assoc($offres)) {
   	 foreach($tab as $cleusb => $va){
	   if($cleusb=="id_offre"){?>
		par=document.getElementById("<?php echo $va ?>");
		elem=document.createElement("div");
	    elem.setAttribute("id","<?php echo $va ?>"); 
	    elem.classList.add('blocm');
	    par.appendChild(elem);
	    elem_1=document.createElement("button"); 
	    elem_1.setAttribute("onclick","ck('<?php echo $va ?>M')");
	    elem_1.classList.add('fa');
	    elem_1.classList.add('btn');
	    elem_1.classList.add('fa-pencil');
	    elem_1.classList.add('btn-success');
	    elem_1.innerText="Modifier";
	    elem.appendChild(elem_1);
	    elem_2=document.createElement("button");
	    elem_2.setAttribute("onclick","ck('<?php echo $va ?>S')");
	     elem_2.setAttribute("data-toggle","modal");
	     elem_2.setAttribute("data-target","#popup");
	    elem_2.classList.add('fa');
	    elem_2.classList.add('btn');
	    elem_2.classList.add('fa-times');
	    elem_2.classList.add('btn-danger');
	    elem_2.innerText="Supprimer";
	    elem.appendChild(elem_2);
    <?php }}}?>


</script>