  	var id_offre;
  	function ck(element){
  		id_offre=element.substring(0,element.length-1);
  		if(element.includes('M')){
           window.location.href="Modifier_annonce.php?annonce=" + id_offre;
  		}
  	}
		 $(document).ready(function(){
	        $("#delete").on("click", function () {
	           window.location.href="liste_annonce_personnel.php?annonce=" + id_offre; 
	      });
      });