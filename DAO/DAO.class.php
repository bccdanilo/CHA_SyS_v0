<?php 

class DAO{
var $local = 'localhost';
var $user = 'root';
var $pass = '9646';
var $db = 'teste';
var $conexao;
var $error;

function __construct(){
$this->conexao = new mysqli($this->local, $this->user, $this->pass, $this->db);
}

}

?>
