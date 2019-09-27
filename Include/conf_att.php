<?php
include '../DAO/DAOAlunoAtividade.class.php';

  $idalunoatividade = $_GET["id"];

echo($idalunoatividade);

$alunoatividade = NEW AlunoAtividade();




$alunoatividade->setIdAlunoAtividade($idalunoatividade);
$alunoatividade->setAno($_POST['ano']);
$alunoatividade->setValor($_POST['valor']);
$alunoatividade->setSemestre($_POST['semestre']);
$alunoatividade->setQuantidade($_POST['quantidade']);


$daoalunoatividade = new DAOAlunoAtividade;



if($daoalunoatividade->atualizar($alunoatividade,$idalunoatividade)){
		echo '<script>       window.close();   </script>';
}else{
		echo $daoalunoatividade->error;
	}




  ?>
