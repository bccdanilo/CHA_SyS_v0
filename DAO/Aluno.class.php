<?php

class Aluno{
private $idaluno;
private $nome;
private $sobrenome;
private $email;
private $senha;
private $matricula;
private $curso;
private $semestre;


function setIdaluno($idaluno){
$this->Idaluno=$idaluno;
}
function getIdaluno(){
return $this->Idaluno;
}



function setNome($nome){
$this->Nome=$nome;
}
function getNome(){
return $this->Nome;
}


function setSobrenome($sobrenome){
$this->Sobrenome=$sobrenome;
}
function getSobrenome(){
return $this->Sobrenome;
}


function setEmail($email){
$this->Email=$email;
}
function getEmail(){
return $this->Email;
}

function setSenha($senha){
$this->Senha=$senha;
}
function getSenha(){
return $this->Senha;
}

function setMatricula($matricula){
$this->Matricula=$matricula;
}
function getMatricula(){
return $this->Matricula;
}

function setCurso($curso){
$this->Curso=$curso;
}
function getCurso(){
return $this->Curso;
}

function setSemestre($semestre){
$this->Semestre=$semestre;
}
function getSemestre(){
return $this->Semestre;
}

}
?>
