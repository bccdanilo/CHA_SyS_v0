<?php 


include 'AlunoAtividade.class.php';

class DAOAlunoAtividade {

var $local = 'localhost';
var $user = 'root';
var $pass = '9646';
var $db = 'teste';
var $conexao;
var $error;

function __construct(){
$this->conexao = new mysqli($this->local, $this->user, $this->pass, $this->db);
}




function inserir($alunoatividade){
    $ano = $alunoatividade->getAno();
	$semestre = $alunoatividade->getSemestre();
    $valor = $alunoatividade->getValor();
    $idaluno = $alunoatividade->getIdAluno();
    $idAtividades = $alunoatividade->getIdAtividades();
    $quantidade = $alunoatividade->getQuantidade();



	$sql = "INSERT INTO alunoatividade(datalancamento,ano, semestre, valor, idaluno, idAtividades, quantidade) VALUES (now(),'$ano','$semestre','$valor','$idaluno','$idAtividades','$quantidade')";
    
	if($this->conexao->query($sql)){
		return true;
	}else{
		$this->error=$this->conexao->error;
		return false; 
	}

}



function listar($idaluno,$idatividade){

	$sql = "SELECT alunoatividade.idalunoatividade, alunoatividade.ano, alunoatividade.quantidade,alunoatividade.semestre,alunoatividade.valor FROM alunoatividade WHERE (alunoatividade.idaluno = '$idaluno' AND alunoatividade.idAtividades='$idatividade') ";
	$resultado = $this->conexao->query($sql);
	$alunoatividades = array();
	while($dados = $resultado->fetch_assoc()){
		$alunoatividade = new AlunoAtividade();

		$alunoatividade->setIdAlunoAtividade($dados['idalunoatividade']);
		$alunoatividade->setAno($dados['ano']);
		$alunoatividade->setQuantidade($dados['quantidade']);
		$alunoatividade->setSemestre($dados['semestre']);
		$alunoatividade->setValor($dados['valor']);
		
		$alunoatividades[] = $alunoatividade;
	}
	return $alunoatividades;
}


function listahoras($idaluno,$idatividade,$tipolancamento){

	if($tipolancamento == 1){
		$sql = "SELECT SUM(alunoatividade.valor) as valor FROM alunoatividade WHERE (alunoatividade.idaluno ='$idaluno' and alunoatividade.idAtividades ='$idatividade') GROUP BY alunoatividade.ano";
	}
	if($tipolancamento == 2){
		$sql = "SELECT SUM(alunoatividade.valor) as valor FROM alunoatividade WHERE (alunoatividade.idaluno ='$idaluno' and alunoatividade.idAtividades ='$idatividade') GROUP BY alunoatividade.semestre";
	}
	if($tipolancamento == 3){
		$sql = "SELECT SUM(alunoatividade.quantidade) as valor FROM alunoatividade WHERE (alunoatividade.idaluno ='$idaluno' and alunoatividade.idAtividades ='$idatividade')";
	}


	$resultado = $this->conexao->query($sql);
	$alunoatividades = array();
	while($dados = $resultado->fetch_assoc()){

		$alunoatividade = new AlunoAtividade();
		$alunoatividade->setValor($dados['valor']);
		$alunoatividades[] = $alunoatividade;
		
	}
	return $alunoatividades;
}





function alunoatividadeid($id){
	$sql = "SELECT  alunoatividade.quantidade, alunoatividade.ano, alunoatividade.semestre,alunoatividade.valor FROM alunoatividade WHERE idalunoatividade='$id'";
	$resultado = $this->conexao->query($sql);
	$dados=$resultado->fetch_assoc();
	$alunoatividade = new alunoatividade();


		$alunoatividade->setQuantidade($dados['quantidade']);
		$alunoatividade->setAno($dados['ano']);
        $alunoatividade->setSemestre($dados['semestre']);
		$alunoatividade->setValor($dados['valor']);

		
	return $alunoatividade;

}










function atualizar($alunoatividade,$id){


    $ano = $alunoatividade->getAno();
	$semestre = $alunoatividade->getSemestre();
    $valor = $alunoatividade->getValor();
    $quantidade = $alunoatividade->getQuantidade();



	$sql = " UPDATE alunoatividade SET valor = '$valor', ano = '$ano', semestre='$semestre', quantidade='$quantidade' WHERE idalunoatividade = '$id';";
    
	if($this->conexao->query($sql)){
		return true;
	}else{
		$this->error=$this->conexao->error;
		return false; 
	}


}



}?>
