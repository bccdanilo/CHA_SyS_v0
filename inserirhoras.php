<!DOCTYPE html>
<html>
<title>sisCHA</title>
<meta charset="UTF-8">
<style>



         #c{ text-align: center;
	position:absolute;
	left:30%;
	right:30%;
}


        #a{background-color:#cdcdc1;
	width:100%;
        height:460px;
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
</style>




<body id="c">

<?php

	include 'Dao/DAOAtividades.class.php';
	$at = $_GET["at"];
    $id = $_GET["id"];
	$daoaividades = new DAOAtividades;
	$atividades = $daoaividades->AtividadeID($at);

?>









<div id="a">
<h5> <?php echo $atividades->getDescricaoatividade(); ?></h5>


<form method="POST" action="Include/horas.php">



<?php 
    $a = $atividades->getTipolancamento();
    if($a == 1){
        echo 'Ano: <input type="text" name="ano"> </br></br>';
        echo 'Horas:</br> <input type="text" name="valor"> </br></br>';
        echo '<input type="hidden" name="semestre" value="0"/>';
        echo '<input type="hidden" name="quantidade" value="0"/>';
    }
    if($a == 2){
        echo 'Semestre: <input type="text" name="semestre"> </br></br>';
        echo 'Horas:</br> <input type="text" name="valor"> </br></br>';
        echo '<input type="hidden" name="ano" value="0"/>';
        echo '<input type="hidden" name="quantidade" value="0"/>';
    }
    if($a == 3){
        echo 'Quantidade: <input type="text" name="quantidade"> </br></br>';
        echo '<input type="hidden" name="ano" value="0"/>';
        echo '<input type="hidden" name="semestre" value="0"/>';
        echo '<input type="hidden" name="valor" value="0"/>';
    }

echo '<input type="hidden" name="idatividades" value='.$at.'>';
echo '<input type="hidden" name="idaluno" value='.$id.'>';



?>





<input type="submit" value="Salvar" onClick="">
</form>

</div>


</body>
</html>