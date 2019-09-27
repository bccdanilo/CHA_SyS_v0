<?php

class Atividades{

    private $descricaoatividade;
    private $idAtividades;
    private $idGrupoAtividade;
    private $tipolancamento;
    private $idAluno;
    private $valormaximo;
    private $valormaximodois;


function setDescricaoatividade($descricaoatividade){
$this->Descricaoatividade=$descricaoatividade;
}
function getDescricaoatividade(){
return $this->Descricaoatividade;
}

function setIdAtividades($idAtividades){
$this->IdAtividades=$idAtividades;
}
function getIdAtividades(){
return $this->IdAtividades;
}


function setIdGrupoAtividade($idGrupoAtividade){
$this->IdGrupoAtividade=$idGrupoAtividade;
}
function getIdGrupoAtividade(){
return $this->IdGrupoAtividade;
}


function setTipolancamento($tipolancamento){
$this->Tipolancamento=$tipolancamento;
}
function getTipolancamento(){
return $this->Tipolancamento;
}

function setIdAluno($idAluno){
$this->IdAluno=$idAluno;
}
function getIdAluno(){
return $this->IdAluno;
}




function setValormaximo($valormaximo){
$this->Valormaximo=$valormaximo;
}
function getValormaximo(){
return $this->Valormaximo;
}



function setValormaximodois($valormaximodois){
$this->Valormaximodois=$valormaximodois;
}
function getValormaximodois(){
return $this->Valormaximodois;
}






}
?>