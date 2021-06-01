   function getxhr(){
            try{xhr=new XMLHttpRequest();}
            catch(e){
               try {xhr=new ActiveXObject("Microsoft.XMLHTTP");}
               catch(e1){
                  try{xhr=new ActiveXObject("Msxml2.XMLHTTP");}
                  catch(e2){
                        alert("AJAX non supporté!");
                  }
               }
            }
            return xhr;
    }
     var str = "";
     var str1 = "";
     var ville =0;
     var times=0;
     var length_sceteur="";
    $( "select" )
      .change(function() {
        str="";
        $( "select option:selected" ).each(function() {
          str += $( this ).text() + "  ";
          document.getElementById('linkin').value = str;
        });
      })
      .trigger( "change" );
      function myFunction() {
       xhr=getxhr();
          xhr.onreadystatechange=function(){
             if(xhr.readyState==4 && xhr.status == 200){
             var contenue=xhr.responseText;
             document.getElementById("container").innerHTML=contenue;
             var elem=document.getElementById("container").innerHTML.split("\n");
             if(ville!=0){
                 list=document.getElementById("sect");
                  while (list.hasChildNodes()) {
                    list.removeChild(list.firstChild);
                  } 
             }
             elem_disb=document.createElement("option");
             elem_disb.setAttribute("disabled","true");
             elem_disb.setAttribute("selected","true");
             elem_disb.innerHTML="CHOISISSEZ VOTRE SECTEUR ";
            document.getElementById("sect").appendChild(elem_disb);
            length_sceteur=elem.length;

             for (var i=0; i< elem.length; i++) {
              elem22=document.createElement("option");
              if(elem[i] != "undefined"){
                ss_elem=elem[i].split("  ");
                elem22.setAttribute("value",ss_elem[0]);
                elem22.innerHTML=ss_elem[0];
                document.getElementById("sect").appendChild(elem22);
              }
             }
             }
            };
             xhr.open("post",'qartiers/'+document.getElementById("vil").value+'.txt',true); 
             xhr.send();
             ville=1;
       }

       function secteur(){
        xhr=getxhr();
          xhr.onreadystatechange=function(){
             if(xhr.readyState==4 && xhr.status == 200){
             var contenue=xhr.responseText;
             document.getElementById("container").innerHTML=contenue;
             var elem=document.getElementById("container").innerHTML.split("\n");
             if(ville!=0){
                 list=document.getElementById("sect");
                  while (list.hasChildNodes()) {
                    list.removeChild(list.firstChild);
                  } 
             }
             elem_disb=document.createElement("option");
             elem_disb.setAttribute("disabled","true");
             elem_disb.setAttribute("selected","true");
             elem_disb.innerHTML="CHOISISSEZ VOTRE SECTEUR ";
            document.getElementById("sect").appendChild(elem_disb);
            length_sceteur=elem.length;

             for (var i=0; i< elem.length; i++) {
              elem22=document.createElement("option");
              if(elem[i] != "undefined"){
                ss_elem=elem[i].split("  ");
                elem22.setAttribute("value",ss_elem[0]);
                elem22.innerHTML=ss_elem[0];
                document.getElementById("sect").appendChild(elem22);
              }
             }
             }
            };
             xhr.open("post",'qartiers/AGADIR.txt',true); 
             xhr.send();
             ville=1;

       }

        function found2(fils){
        part2=document.getElementById("sect");
        var patt = new RegExp("^"+fils+"$");
            for(var i=1;i<=(length_sceteur)+1;i++){
              if(patt.test(part2.querySelector('option:nth-child('+i+')').innerHTML)){
                ent=part2.querySelector('option:nth-child('+i+')').getAttribute("value");
                 $('#sect').val(ent);
                 $('#sect').change();
              }
            }
        }

        var form=document.getElementsByTagName("form")[0];

        form.addEventListener('submit', function(e) {
          var list = $("input[name='suplem[]']:checked").map(function () {
                return this.value;
            }).get();

          var formData = {
            submit: true ,
            suplem : list
          };
          $(".form").serialize().split('&').forEach(element =>{
              ele=element.split("=");
              formData[ele[0]]=$('[name="'+ele[0]+'"]').val();
          });

          $("div").remove(".invalid-feedback");
          $( "input" ).removeClass( "is-invalid" );
          $( "textarea" ).removeClass( "is-invalid" );
          $( "#sect" ).removeClass( "is-invalid" );

            $.ajax({
              type: "POST",
              url: "serveur/modifier_annonce_serv.php?annonce="+form.getAttribute("id"),
              data: formData,
              encode: true,
            }).done(function (data) {
              let all_correct=true;
              data_list=data.split("  ");

              
              data_list.forEach(elem => {
                if(elem.includes("key")){
                  input=document.getElementById(elem.split("=")[1].trim());
                  input.classList.add('is-invalid');
                  txt=document.createElement("div");
                  txt.className="invalid-feedback";
                  txt.innerHTML="Ce champ est vide !";
                  input.parentNode.appendChild(txt);
                  all_correct=false;
                }
                if(elem.includes("sim")){
                  input2=document.getElementById('sect');
                  input2.classList.add('is-invalid');
                  txt=document.createElement("div");
                  txt.className="invalid-feedback";
                  txt.innerHTML="Choisissez le Secteur !";
                  input2.parentNode.appendChild(txt);
                  all_correct=false;
                }
              })
              if(all_correct==true) window.location.href = "Modifier_images.php";
            });
            if(!($('.invalid-feedback').length)){
                e.preventDefault();
              }
        });