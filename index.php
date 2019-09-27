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
		
		#box-toggle{
			text-align: center;
      background-color: #FFF;
		}
p.dcontexto {
	position: relative;
	font: 16px arial, verdana, helvetica, sans-serif;
	padding: 0;
	color: #039;
	text-decoration: none;
	cursor: help;
	z-index: 24;
}
p.dcontexto:hover {
	background: transparent;
	z-index: 25;
}
p.dcontexto span {
	display: none;

}
p.dcontexto:hover span {
	display: block;
	position: absolute;
	width: 230px;
	top: 0em;
	text-align: justify;
	left: 6em;
	font: 10px Verdana, arial, helvetica, sans-serif;
	padding: 5px 10px;
	border: 1px solid #999;
	background: #E8EBF2;
	color: #000;
}

</style>

<body class="w3-light-grey w3-content" style="max-width:1600px">








<?php
			include 'Dao/DAOAtividades.class.php';
			include 'DAO/DAOAluno.class.php';
			include 'Dao/DAOGrupoAtividade.class.php';
			include 'Dao/DAOAlunoAtividade.class.php';



	$id = $_GET["id"];
	$daoaluno = new DAOAluno;
	$aluno = $daoaluno->AlunoPorId($id);
	$daoGrupoAtividade = new DAOGrupoAtividade();
	$GrupoAtividades = $daoGrupoAtividade->listar();
	$daoAtividade = new DAOAtividades();
	$daoalunoatividade = new DAOAlunoAtividade();



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
  <a href="logar.html" onclick="w3_close();" class="fa fa-sign-out w3-bar-item w3-button" style ="text-align:left; color:black"  > Sair</a> 
';
  
?>





  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">Fechar</a>
</nav>


<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding"><?php echo $aluno->getNome(); ?></span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>


<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<div class="w3-main" style="margin-left:300px">

  <div class="w3-hide-large" style="margin-top:83px"></div>
 


<div class=w3-row>



<p  style="text-align:left;"class="dcontexto"  ><i class="fa fa-info fa-fw w3-margin-right w3-large w3-text-teal"></i> <span>***Importante*** Deixe os popups ativados para que seja possivel inserir valores; As atividades que pedem ano ou semestre coloque o numero referente ao ano. EX 2015 como 1, 2016 como 2, assim em diante, o mesmo para os semestres.Caso ja tenha passado do 8 semestre coloque como 9 semestre. Onde esta em azul ainda é possivel conseguir horas, enquanto no vermelho já atingiu o maximo de horas possiveis nessa atividade</span> 
</p>

		<?php
	


$var = 0;$total = 0;



	echo '<div id=box-toggle>';
		echo '<div class=tgl>';









			foreach($GrupoAtividades AS $GrupoAtividade) {






				 echo '<h5>'.$GrupoAtividade->getDescricao().'</h5>'; 
				$Atividades = $daoAtividade->listar($GrupoAtividade->getIdGrupoAtividade());






echo '<table>'	;	
	echo '<tr> <th> Código </th> <th> Atividades </th> <th  colspan = 2>Opções</th> <th>Horas</th></tr>';	
			foreach($Atividades AS $Atividade) {
				echo '<tr>';
				echo'<td>'. $Atividade->getidAtividades().' </td>';
				echo'<td>'. $Atividade->getDescricaoatividade().' </td>';
				echo'<td> <a href="#" onClick="aparece('. $Atividade->getidAtividades().','.$Atividade->getTipoLancamento().')"> Adicionar </a> </td>';
				echo'<td> <a href="#" onClick="atualizar('. $Atividade->getIdatividades().','.$aluno->getIdaluno().')"> Atualizar </a> </td>';
				$var = 0;

				$alunoatividades = $daoalunoatividade->listahoras($aluno->getIdaluno(),$Atividade->getIdatividades(),$Atividade->getTipolancamento());


				foreach($alunoatividades AS $alunoatividade) {


					if (($Atividade->getTipolancamento() ==1)||($Atividade->getTipolancamento() ==2)){
						if ($alunoatividade->getValor() > $Atividade->getValormaximo()){
							$var = $var + $Atividade->getValormaximo();
						}else{
							$var = $var + $alunoatividade->getValor();
						}
					}else{

						$var = $alunoatividade->getValor() * $Atividade->getValormaximo();

					}




				}




				if ($var < $Atividade->getValormaximodois()){
					echo'<td style=color:blue>'.$var.' </td>';
				}else{
					echo'<td style=color:red>'.$var.' </td>';
				}



				$total = $var + $total;



				echo '</tr>';


				echo '<tr> <td colspan = 5> <table id = '.$Atividade->getidAtividades().' > </table> </td> </tr>'; 


			}

echo '</table>'	;	


echo '<br/>';

			}
				
	echo '</div>';
		echo '</div>';


			?>


</div>















  <div class="w3-black w3-center w3-padding-24">asdf</a></div>

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

function adicionar($des,$id){
	window.open('inserirhoras.php?at='+$des+'&id='+$id,'Janela','scrollbars=no,resizable=yes,width=600,height=300,left=30,top=30'); 
	return false;
}


function atualizar($des,$id){
	window.open('atualizahoras.php?at='+$des+'&id='+$id,'Janela','scrollbars=no,resizable=yes,width=800,height=500,left=30,top=30'); 
	return false;
}

function aparece($p,$c){
	var a = document.getElementById($p);

	if($c == 1){
		var b = "<input type=text name=ano>";
		var d = "Ano de Curso";
	}
	if($c == 2){
		var b = "<input type=text name=semestre>";
		var d = "Semestre de Curso";
	}
	if($c == 3){
		var b = "<input type=text name=quantidade>";
		var d = "Quantidade de Publicações";
	}

	a.innerHTML = "<form method='POST' action='Include/horas.php' enctype='multipart/form-data'> <tr> <td colspan =2  style=text-align:center  > Adicionar Horas </td> </tr> <tr> <td >Título</td> <td > <input type='text' name='titulo'>  </td> </tr> <tr><td >Descrição</td> <td > <input type='text' name='descricao'> </td> </tr> <tr><td >Ano realizado</td> <td > <input type='text' name='anorealizado'> </td> </tr> <tr><td >"+d+"</td> <td > "+b+" </td> </tr> <tr><td >Certificado </td> <td > <input type='file' required name='arquivo'> </td> </tr> <tr><td ><input type=button value= Fechar> </input></td> <td ><input type=submit value=Salvar> </td> </tr> </form>";
	return false;
}





</script>




	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript"> 

jQuery.fn.toggleText = function(a,b) {
return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
}

$(document).ready(function(){
	$('.tgl').before('<span class="teste"><table style=width:100% border=2><tr><th>Horas Totais: </th><th><?php echo $total; ?></th></tr></table><br/> </span>');
	$('.tgl').css('display', 'none')
	$('span', '#box-toggle').click(function() {
		$(this).next().slideToggle('slow')
		.siblings('.tgl:visible').slideToggle('fast');
	
		$(this).toggleText('Horas Totais','Horas Totais')
		.siblings('span').next('.tgl:visible').prev()
		.toggleText('Horas Totais','Horas Totais')

	});

 })





</script>


</body>
</html>
