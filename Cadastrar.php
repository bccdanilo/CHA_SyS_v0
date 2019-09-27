<!DOCTYPE html>
<html>
<title>sisCHA</title>
<meta charset="UTF-8">
<style>



         #c{ text-align: center;
	position:absolute;
	left:30%;
	right:30%;
}


        #a{background-color:#cdcdc1;
	width:100%;
        height:460px;
float:left;

}


	
#rodape {

			
	width: 100%;
			
	height: 50px;
			
	border: 1px solid #cdcdc1;
	
	float: left;
	
	margin-top: 7px;
	
	background-color: #cdcdc1;
		
	background: url('dott.jpg') top left repeat;
	
	color:#cdcdc1; 
		
	font-weight: bolder;
		
	background-color:#000;}
		
		



 </style>
<body id="c">

<?php
$host = 'localhost';
$user = 'root';
$pass = '9646'; 
$con = mysqli_connect($host,$user,$pass);
$db = 'teste'; 
mysqli_select_db($con,$db) or print mysql_error();
$sql = ("SELECT nomecurso,idcurso FROM curso");
$query = mysqli_query($con,$sql);
?>


<div id="a">
<h1>Cadastrar</h1>
<form method="POST" action="Include/cadastro.php">
Nome: <input type="text" name="nome"> </br></br>
Sobrenome: <input type="text" name="sobrenome"> </br></br>
Email: <input type="text" name="email"> </br></br>
Semestre: <input type="text" name="semestre"></br></br>

Curso: <select name="curso">  
<option> Selecione </option>
				<?php while($dados = mysqli_fetch_array($query)) { ?>
 					 <option value="<?php echo $dados['idcurso'] ?>"> <?php echo $dados['nomecurso'] ?> </option>
 				<?php } ?>
                 </select>
</br></br>


Matricula: <input type="text" name="matricula"> </br></br>
Senha: <input type="password" name="senha"> </br></br>
<input type="submit" value="Salvar" >
</form>

</div>

<div id="rodape">
<p id="alinhar">	Copyright � 2017 - All Rights Reserved - Universidade Federal de Goi&aacute;s</p></div>
	
</div>

</body>
</html>