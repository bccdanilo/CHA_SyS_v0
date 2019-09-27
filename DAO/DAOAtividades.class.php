<?php

include 'DAO.class.php';
include 'Atividades.class.php';

class DAOAtividades extends DAO{


function listar($idGrupoAtividade){
	$sql = "SELECT * FROM atividades where idGrupoAtividade = '$idGrupoAtividade'";
	$resultado = $this->conexao->query($sql);
	$atividades = array();
	while($dados = $resultado->fetch_assoc()){
		$atividade = new Atividades();

		$atividade->setIdAtividades($dados['idAtividades']);
		$atividade->setDescricaoatividade($dados['descricaoatividade']);
		$atividade->setIdGrupoAtividade($dados['idGrupoAtividade']);
		$atividade->setTipolancamento($dados['tipolancamento']);
		$atividade->setValormaximo($dados['valormaximo']);
		$atividade->setValormaximodois($dados['valormaximodois']);
		
		$atividades[] = $atividade;
	}
	return $atividades;
}


function AtividadeID($idAtividades){
	$sql = "SELECT atividades.tipolancamento, atividades.descricaoatividade,atividades.idAtividades FROM atividades WHERE atividades.idAtividades = '$idAtividades'";
	$resultado = $this->conexao->query($sql);
	$dados=$resultado->fetch_assoc();
	$atividades = new atividades();

		$atividades->setDescricaoatividade($dados['descricaoatividade']);
		$atividades->setIdAtividades($dados['idAtividades']);
		$atividades->setTipolancamento($dados['tipolancamento']);
		
	return $atividades;

}



}?>