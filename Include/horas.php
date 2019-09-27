<?php
include '../DAO/DAOAlunoAtividade.class.php';

$alunoatividade = NEW AlunoAtividade();

$alunoatividade->setAno($_POST['ano']);
$alunoatividade->setValor($_POST['valor']);
$alunoatividade->setSemestre($_POST['semestre']);
$alunoatividade->setQuantidade($_POST['quantidade']);
$alunoatividade->setIdAtividades($_POST['idatividades']);
$alunoatividade->setIdAluno($_POST['idaluno']);


$daoalunoatividade = new DAOAlunoAtividade;

if($daoalunoatividade->inserir($alunoatividade)){
	echo '<script>       window.close();   </script>';
}else{
		echo $daoalunoatividade->error;
	}




  ?>

