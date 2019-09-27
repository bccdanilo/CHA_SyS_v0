<?php
	include '../Dao/DAOAtividades.class.php';
	include '../Dao/DAOAlunoAtividade.class.php';

  $idalunoatividade = $_GET["idAA"];
  $idaluno = $_GET["idD"];
	$atividade = $_GET["idT"];

	$daoatividades = new DAOAtividades();
	$atividades = $daoatividades->AtividadeID($atividade);

  $daoalunoatividade = new DAOAlunoAtividade();
  $alunoatividade = $daoalunoatividade->alunoatividadeid($idalunoatividade);


    $a = $atividades->getTipolancamento();





echo'<form action="conf_att.php?id= '.$idalunoatividade.' " method="POST" name="Form" >';

    if($a == 1){

        echo 'Ano: <input type="text" name="ano"  value='.$alunoatividade->getAno().'> Horas:<input type="text" name="valor" value='.$alunoatividade->getValor().'>';
        echo '<br/><input type="hidden" name="semestre"  value=0>';
        echo '<input type="hidden" name="quantidade"  value=0>';
    }
    if($a == 2){
        echo 'Semestre: <input type="text" name="semestre"  value='.$alunoatividade->getSemestre().'> Horas:<input type="text" name="valor" value='.$alunoatividade->getValor().'> ';
        echo '<input type="hidden" name="ano"  value=0>';
        echo '<input type="hidden" name="quantidade"  value=0>';
    }
    if($a == 3){
        echo 'Quantidade: <input type="text" name="quantidade" value='.$alunoatividade->getQuantidade().'>';
        echo '<input type="hidden" name="ano"  value=0>';
        echo '<input type="hidden"  name="semestre" value=0>';
        echo '<input type="hidden" name="valor"  value=0>';
    }


echo'	<input type="submit" value="Atualizar"/>	';


echo'</form>';
echo '<br/>';
            





  ?>




