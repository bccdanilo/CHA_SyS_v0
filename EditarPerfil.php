<!DOCTYPE html>
<html>
<title>sisCHA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;  background-color: #FFF; }
p{ text-align:left}


  .w3-row{
            background-color: #FFF;
  }
		table {
			width: 100%;
		}
		
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
		th,
		td {
			padding: 5px;
			text-align: left;
		}
		
		tr:nth-child(even) {
			background-color: #eee;
		}
		
		tr:nth-child(odd) {
			background-color: #fff;
		}
		
		th {
			background-color: black;
			color: white;
		}
		
		#box-toggle,#box-toggle2,#box-toggle3,#box-toggle4,#box-toggle5,#box-toggle6,#box-toggle7,#box-toggle8,#box-toggle9,#box-toggle10{
			text-align: center;
      background-color: #FFF;
		}

</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">








<!-- Sidebar/menu -->


<?php
			include 'DAO/DAOAluno.class.php';

	$id = $_GET["id"];
	$daoaluno = new DAOAluno;
	$aluno = $daoaluno->AlunoPorId($id);



echo '
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <h3 class="w3-padding-64 w3-center"><b>'.$aluno->getNome().' '.$aluno->getSobrenome().'</b></h3>

   <div>
          <p><i class="fa fa-sticky-note fa-fw w3-margin-right w3-large w3-text-teal"></i>'.$aluno->getMatricula().'</p>
		  <p><i class="fa fa-calendar-o fa-fw w3-margin-right w3-large w3-text-teal"></i>'.$aluno->getSemestre().'º Semestre</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>'.$aluno->getCurso().'</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>'.$aluno->getEmail().'</p>
  </div> 

  <br/>

  <a href="EditarPerfil.php?id= '.$aluno->getIdaluno().'"  onclick="w3_close()" class="fa fa-pencil w3-bar-item w3-button" style ="text-align:left; color:black"  > Editar Perfil</a> 
  <a href="logar.html" onclick="w3_close();" class="fa fa-sign-out w3-bar-item w3-button" style ="text-align:left; color:black"  > Sair</a>';
  
?>





  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">Fechar</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding"><?php echo $aluno->getNome(); ?></span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  

<!-- Tabela -->
  <div class="w3-row">


<br/><br/><br/><br/>
<table style="width:100%" border=2>
				<tr>
					<th colspan="1" style ="text-align:center;font-size: 25px;">Editar Perfil </th>
				</tr>
      </table>



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



<div class ="formulario">
<form action="Include/EditarAluno.php" method="POST" name="Form" >
<table border="0">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<tr>
	<td> Nome: </td>
	<td><input type="text" name="nome" placeholder="Nome" value="<?php echo $aluno->getNome(); ?>"/> </td>
</tr>


<tr>
	<td> Sobrenome: </td>
	<td><input type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo $aluno->getSobrenome(); ?>" /> </td>
</tr>

<tr>
<td>Curso:</td> <td> <select name="curso">  
<option> Selecione </option>
				<?php while($dados = mysqli_fetch_array($query)) { ?>
 					 <option value="<?php echo $dados['idcurso'] ?>"> <?php echo $dados['nomecurso'] ?> </option>
 				<?php } ?>
                 </select></td>
</br></br>
</tr>


<tr>
	<td> Matricula: </td>
	<td><input type="text" name="matricula" placeholder="Matricula" value="<?php echo $aluno->getMatricula(); ?>" /> </td>
</tr>

<tr>
	<td> E-mail: </td>
	<td><input type="text" name="email" placeholder="E-mail" value="<?php echo $aluno->getEmail(); ?>" /> </td>
</tr>

<tr>
	<td> Semestre: </td>
	<td><input type="text" name="semestre" placeholder="Semestre" value="<?php echo $aluno->getSemestre(); ?>" /> </td>
</tr>

<tr>
	<td> Senha: </td>
	<td><input type="password" name="senha" placeholder="Senha" value="<?php echo $aluno->getSenha(); ?>" /> </td>
</tr>

<tr>
	<td><input type="reset" value="Restaurar"/> </td>
	<td><input type="submit" value="Atualizar"/> </td>	
</tr>


</table>
</form>
</div>

</div>



  <div class="w3-black w3-center w3-padding-24">asdf</a></div>

<!-- End page content -->
</div>


<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

</script>
</body>
</html>
