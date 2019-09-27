<!DOCTYPE html>
<html>
<title>sisCHA</title>
<meta charset="UTF-8">
<style>

body{background-color:#cdcdc1;}

         #c{ 
             text-align: center;
	left:100%;
	right:100%;
}


        #a{
	width:100%;
        height:100%;
float:left;

}


	
#rodape {

			
	width: 100%;
			
	height: 50px;
			
	border: 1px solid #cdcdc1;
	
	float: left;
	
	margin-top: 7px;
	
	background-color: #cdcdc1;
		
	background: url('dott.jpg') top left repeat;
	
	color:#cdcdc1; 
		
	font-weight: bolder;
		
	background-color:#000;}



    form{
        text-align:left;
    }
</style>



<script>

    function fecha(){
        window.close();
    }






</script>

<body>

<div id="c">

<?php

	include 'Dao/DAOAtividades.class.php';
	include 'Dao/DAOAlunoAtividade.class.php';
	$at = $_GET["at"];
    $id = $_GET["id"];
	$daoatividades = new DAOAtividades();
	$atividades = $daoatividades->AtividadeID($at);

    $daoalunoatividade = new DAOAlunoAtividade();
    $alunoatividades = $daoalunoatividade->listar($id,$at);

?>










<h5> <?php echo $atividades->getDescricaoatividade(); ?></h5>

</div>

<div id="a">



<?php



            $a = $atividades->getTipolancamento();


			foreach($alunoatividades AS $alunoatividade) {


    if($a == 1){

        echo 'Ano:'.$alunoatividade->getAno().'&nbsp;&nbsp;&nbsp;&nbsp;Horas:'.$alunoatividade->getValor();
    }

    if($a == 2){
        echo 'Semestre: '.$alunoatividade->getSemestre().'&nbsp;&nbsp;&nbsp;&nbsp;Horas:'.$alunoatividade->getValor();
    }

    if($a == 3){
        echo 'Quantidade:'.$alunoatividade->getQuantidade();
    }



echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="Include/atualizah.php?idAA='.$alunoatividade->getIdAlunoAtividade().'&idD='.$id.'&idT='.$at.' ">Atualizar</a>';

echo '<br/>';
            }



?>








<input type="button" value="Fechar" onClick="fecha()">



</div>


</body>
</html>