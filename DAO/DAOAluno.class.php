<?php 


include 'Aluno.class.php';







class DAOAluno {

var $local = 'localhost';
var $user = 'root';
var $pass = '9646';
var $db = 'teste';
var $conexao;
var $error;

function __construct(){
$this->conexao = new mysqli($this->local, $this->user, $this->pass, $this->db);
}





function insert($aluno){
	$nome = $aluno->getNome();
	$sobrenome = $aluno->getSobrenome();
    $email = $aluno->getEmail();
    $senha = $aluno->getSenha();
    $matricula = $aluno->getMatricula();
    $curso = $aluno->getCurso();
	$semestre = $aluno->getSemestre();

	$sql = "INSERT INTO aluno(nome, sobrenome, email, senha, matricula, idcurso, semestre) VALUES('$nome','$sobrenome','$email','$senha', '$matricula', '$curso', '$semestre')";
	if($this->conexao->query($sql)){
		return true;
	}else{
		$this->error=$this->conexao->error;
		return false; 
	}
}


function update($aluno){
	$idaluno = $aluno->getIdaluno();
	$nome = $aluno->getNome();
	$sobrenome = $aluno->getSobrenome();
    $email = $aluno->getEmail();
    $senha = $aluno->getSenha();
    $matricula = $aluno->getMatricula();
    $curso = $aluno->getCurso();
	$semestre = $aluno->getSemestre();
    
	$sql = "UPDATE aluno SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', senha = '$senha', matricula = '$matricula', idCurso ='$curso', semestre = '$semestre' WHERE idaluno = '$idaluno'";
	if($this->conexao->query($sql)){
		return true;
	}else{
			$this->error=$this->conexao->error;
		return false; 
	}
}




function alunoPorId($idaluno){
	$sql = "SELECT aluno.idaluno,aluno.nome,aluno.email,aluno.matricula,aluno.sobrenome,aluno.semestre,aluno.senha,curso.nomecurso FROM aluno inner join curso on curso.idCurso = aluno.idcurso WHERE idaluno='$idaluno'";
	$resultado = $this->conexao->query($sql);
	$dados=$resultado->fetch_assoc();
	$aluno = new aluno();

		$aluno->setIdaluno($dados['idaluno']);
		$aluno->setNome($dados['nome']);
        $aluno->setSobrenome($dados['sobrenome']);
		$aluno->setEmail($dados['email']);
        $aluno->setSenha($dados['senha']);
		$aluno->setMatricula($dados['matricula']);
        $aluno->setCurso($dados['nomecurso']);
		$aluno->setSemestre($dados['semestre']);
		
	return $aluno;

}



function LogaAluno($matricula,$senha){
	$sql = "SELECT idaluno FROM aluno WHERE ((matricula ='$matricula')and (senha ='$senha'))";
	$resultado = $this->conexao->query($sql);
	$dados=$resultado->fetch_assoc();
	$aluno = new aluno();

		$aluno->setIdaluno($dados['idaluno']);
		
	return $aluno;

}




}?>