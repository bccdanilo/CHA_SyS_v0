<?php

include 'GrupoAtividade.class.php';

class DAOGrupoAtividade extends DAO{


function listar(){
	$sql = "SELECT * FROM grupoatividade where Curso_idCurso = '1'";
	$resultado = $this->conexao->query($sql);
	$grupoatividades = array();
	while($dados = $resultado->fetch_assoc()){
		$grupoatividade = new GrupoAtividade();

		$grupoatividade->setIdGrupoAtividade($dados['idGrupoAtividade']);
		$grupoatividade->setDescricao($dados['Descricao']);
		$grupoatividade->setCurso_idCurso($dados['Curso_idCurso']);
		$grupoatividade->setOrdemListagem($dados['OrdemListagem']);
		
		$grupoatividades[] = $grupoatividade;
	}
	return $grupoatividades;
}





}?>