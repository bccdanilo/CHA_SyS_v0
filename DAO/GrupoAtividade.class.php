<?php

class GrupoAtividade{
private $idGrupoAtividade;
private $descricao;
private $Curso_idCurso;
private $OrdemListagem;

function setIdGrupoAtividade($idGrupoAtividade){
$this->IdGrupoAtividade=$idGrupoAtividade;
}
function getIdGrupoAtividade(){
return $this->IdGrupoAtividade;
}



function setDescricao($descricao){
$this->Descricao=$descricao;
}
function getDescricao(){
return $this->Descricao;
}


function setCurso_idCurso($Curso_idCurso){
$this->Curso_idCurso=$Curso_idCurso;
}
function getCurso_idCurso(){
return $this->Curso_idCurso;
}


function setOrdemListagem($OrdemListagem){
$this->OrdemListagem=$OrdemListagem;
}
function getOrdemListagem(){
return $this->OrdemListagem;
}


}
?>
