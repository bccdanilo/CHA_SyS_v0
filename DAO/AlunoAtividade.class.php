<?php

class AlunoAtividade{

							

private $idAlunoAtividade;
private $datalancamento;
private $ano;
private $semestre;
private $valor;
private $idaluno;
private $idAtividades;
private $quantidade;

function setIdAlunoAtividade($idAlunoAtividade){
$this->IdAlunoAtividade=$idAlunoAtividade;
}
function getIdAlunoAtividade(){
return $this->IdAlunoAtividade;
}

function setDatalancamento($datalancamento){
$this->Datalancamento=$datalancamento;
}
function getDatalancamento(){
return $this->Datalancamento;
}

function setAno($ano){
$this->Ano=$ano;
}
function getAno(){
return $this->Ano;
}

function setSemestre($semestre){
$this->Semestre=$semestre;
}
function getSemestre(){
return $this->Semestre;
}

function setValor($valor){
$this->Valor=$valor;
}
function getValor(){
return $this->Valor;
}

function setIdAtividades($idAtividades){
$this->IdAtividades=$idAtividades;
}
function getIdAtividades(){
return $this->IdAtividades;
}

function setQuantidade($quantidade){
$this->Quantidade=$quantidade;
}
function getQuantidade(){
return $this->Quantidade;
}


function setIdAluno($idaluno){
$this->IdAluno=$idaluno;
}
function getIdAluno(){
return $this->IdAluno;
}


}
?>
