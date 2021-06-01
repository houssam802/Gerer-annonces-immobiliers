    var i=0;
    var catalogue=[];
    var catalogue_serveur=[];
  $(document).ready(function(){
     $(document).on('change', '#file', function(){ 
        par=document.getElementById('parent');
        if (typeof document.getElementById("file").files[0] !== "undefined"){
        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            alert("Invalid Image File");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        var f = document.getElementById("file").files[0];
        var fsize = f.size||f.fileSize;
        if(fsize > 2000000){
        alert("Image File Size is very big");
        }
        else{
        if(!catalogue.includes(name)){
            catalogue.push(name);

            form_data.append("file", document.getElementById('file').files[0]);
                elem=document.createElement("div");
                elem.setAttribute("id","Cadre"+i+""); 
                elem.classList.add('col-md-3');
                elem.classList.add('col-sm-6');
                elem.classList.add('myClass');
                elem.style.order="1";
                par.appendChild(elem);

            elemimg=document.createElement("img");
                elemimg.setAttribute("id",name); 
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
        $.ajax({
            url:"upload_img.php",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                elemimg.src="Images/loading.gif";
                elemimg.style.width="80%";
                elemimg.style.height="20%";
            },   
            success:function(data) {
                elemimg.src="";
                elemimg.style.width="100%";
                elemimg.style.height="100%";
                catalogue_serveur.push(data);
                    document.getElementById('img_infos').value="";
                for( j = 0; j < catalogue_serveur.length; j++){
                    document.getElementById('img_infos').value += catalogue_serveur[j] + "   ";
                }
                elemimg.src=data;
                i++;
            }
           });
          }
         }
        }
      });
  });
    var ens;
    function gg(ens){
      prt=document.getElementById('Cadre'+ens+'');
      pic=prt.querySelector('img');
      var path=pic.src.substring(25);
      var action="supprime_fichier";
      for( j = 0; j < catalogue_serveur.length; j++){
         if ( j==ens) catalogue_serveur.splice(j,1);
      }
       document.getElementById('img_infos').value="";
       for( j = 0; j < catalogue_serveur.length; j++){
         document.getElementById('img_infos').value += catalogue_serveur[j] + "   ";
      }
         $.ajax({
            url:"delete_img.php",
            method:"POST",
            data:{path:path,action:action}, 
            success:function(data){}
          });
      prt.remove();
      i--;
      for( j = 0; j < catalogue.length; j++){
         if ( j==ens) catalogue.splice(j,1);
      }
    }


    sessionStorage.setItem('reloaded','yes');
    clicked=false;
    $(document).ready(function(){
      $("#deposer").on("click", function () {
          clicked = true;
      });
    });
   window.addEventListener("beforeunload",function(e){ 
   if(clicked==false){
     e.preventDefault();
     e.returnValue='';
    }
    console.log(e);
   if(e.currentTarget.closed==true || sessionStorage.getItem('reloaded') != null){
    if(clicked==false){
    if(catalogue_serveur.length!=0){
     for( j = 0; j < catalogue_serveur.length; j++){
      if(j>lenght_initial){
        var action="supprime_fichier";
        var path=catalogue_serveur[j];
            $.ajax({
              url:"delete_img.php",
              method:"POST",
              data:{path:path,action:action}, 
              success:function(data){}
            });
        }
      }
    }
   }
  }
  });