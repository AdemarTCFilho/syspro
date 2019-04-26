<style>
#painel{
    font-family:"Arial";
    width:95%;
    margin:0 auto;
    border: 1px solid #eee;
    padding: 16px;
    background-color: #fff;
}

#painel h1{
    font-size: 80px;
    color: blue;        
}

#painel h2{
    font-size: 35px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: blue;
   color: white;
   text-align: center;
}

#consultorio {
    font-size: 50px;
}

#medico {
    font-size: 45px;
}

html{
    background-color: #eee;
}

</style>

<div id="painel">

<!-- conta quantos foram chamados, inicializa com 0 -->
<input type="hidden" id="total" value="0"> 

<!-- exibe o nome do proximo -->
<h2>Paciente:</h2>
<h1 id="proximo">Carregando...</h1> 

<hr>
<!-- exibe o nome dos 5 ultimos -->
<!--<h2>Ultimos chamados:</h2>
<div id="ultimos">Carregando...</div>--> 

<div id="som"></div>
<h3 id="consultorio">Carregando...</h3>
<h3 id="medico">Carregando...</h3> 
</div>
<footer class="footer">
    
    <h2><marquee behavior="scroll" direction="left">WORK MED SERVICOS MEDICO HOSPITALAR LTDA.</marquee></h2>
</footer>
<!-- jquery -->
<script  src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script>
    setInterval(function(){
        total = $("#total").val();
        $.ajax({
            url: 'painel.php',
            type: 'GET',
            dataType: 'json', //espera o retorno em jSon
            success: function(json){
                //Só chama o proximo se a contagem de pacientes que chegou é maior 
                //que a ultima registrada
                if(total < json.total){
                    //NOME DO ULTIMO
                    $("#proximo").html(json.proximo);
                    $("#consultorio").html(json.consultorio);
                    $("#medico").html(json.medico);

                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar
                    $("#proximo").fadeOut(); //efeito para piscar
                    $("#proximo").fadeIn(); //efeito para piscar

                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar
                    $("#consultorio").fadeOut(); //efeito para piscar
                    $("#consultorio").fadeIn(); //efeito para piscar

                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar
                    $("#medico").fadeOut(); //efeito para piscar
                    $("#medico").fadeIn(); //efeito para piscar

                    //ARMAZENA A ULTIMA CONTAGEM
                    $("#total").val(json.total);

                    // escreve os ultimos
                    var nome_ultimos ='';
                    for(i=0; i< json.ultimos.length; i++){
                        nome_ultimos += json.ultimos[i].nome + '<br>';
                    }                    
                    $("#ultimos").html(nome_ultimos);

                    $("#ultimos").fadeOut(); //efeito para piscar
                    $("#ultimos").fadeIn(); //efeito para piscar

                    //REFAZ O HTML DO SOM PRA TOCAR O BEEP
                    $("#som").html("<embed loop='false' src='beep.mp3' hidden='true'  autoplay='true'>");

                }
            }
        });       
    }, 10* 1000); //EXECUTA A CADA 15 SEGUNDOS
  </script>