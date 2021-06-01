<?php require './serveur/liste_annonce_personnel_serv.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>liste_annonce_personnel</title>
	    <?php require './serveur/head.php';?>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
		<link rel="stylesheet" type="text/css" href="filter.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
		<style>
			.fa:before{
				margin-right: 6px;
			}
			.btn{
				padding: 9px;
				width: 105px;
				 margin: 3px;
				 outline:none !important;
				 -webkit-appearance: none; box-shadow: none !important;
			}
			.blocm{
			  position: absolute;
			  display: flex;
			  align-self: flex-end;
			  opacity: 1;
			  border: none;
			  cursor: pointer;

			}
		</style>
		<script src="./scripts/liste_annonce_pers.js" defer></script>
</head>
<body>
	<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="border:none; padding-bottom: 0;">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="border:none;">
	        êtes vous vouloir de le supprimer ? 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:20%;">Non</button>
	        <button type="button" class="btn btn-primary" id="delete" style="width:20%;">Oui</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>