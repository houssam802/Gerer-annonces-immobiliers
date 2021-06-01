<?php
if($_POST["action"] == 'supprime_fichier')
{
    if(file_exists($_POST["path"])){
        unlink($_POST["path"]);
    }
}
?>