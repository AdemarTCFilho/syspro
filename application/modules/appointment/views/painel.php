<?php
    include "db.php";

    //ARMAZENA O TOTAL
    $consulta = "SELECT * FROM chamar ";
    $executar = $conexao->query($consulta); 
    $total = mysqli_num_rows($executar);

    //SELECIONA APENAS OS 6 ULTIMOS
    $sql = "SELECT * FROM chamar ORDER BY id DESC LIMIT 6";
    $exec = $conexao->query($sql); 
    $ultimos = array();
    $i = 0;

    while($chamar = $exec->fetch_array()){
        //eis o proximo
        if($i==0){
            $proximo = $chamar['nome'];
            $proximo_consul = $chamar['consultorio'];
            $proximo_medico = $chamar['medico'];
        }else{

            // forma os 5 ultimos
            array_push($ultimos,
                array('nome' => $chamar['nome'],
                      'consultorio' => $chamar['consultorio'],
                      'medico' => $chamar['medico']
            )
            ); 
            //para pegar mais que 5, aumente o limit no $sql;
        }
        $i++;
    }

    echo json_encode(
        [
            'total' => $total, //quantos nomes foram chamados
            'proximo' => $proximo, // nome do proximo
            'consultorio' => $proximo_consul,
            'medico' => $proximo_medico,
            'ultimos' => $ultimos // array contendo o nome dos 5 ultimos
        ]
    );

?>