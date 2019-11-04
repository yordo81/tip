$(function(){

    $("#aduana").change(function() {

        $("#aduana").each(function() {

            aduana = $('#aduana').val();

            $.post("http://localhost/qbo/index.php/storemov/verifica", {aduana : aduana}, function(data) {

                if(data === null|| data===''){

                    alert('CODIGO DE ADUANA NO EXISTE\n intente de nuevo');

                    document.getElementById("aduana").value=null;

                    document.getElementById("aduana").focus();

                    $("#nombreAduana").html(data);

                }

                else{

                    $("#nombreAduana").html(data);

                }

 

            });

        });

    });

});