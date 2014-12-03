<?php
/**
 * Send Message 
 */

//Se não for POST envia para a página de contato
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	header('location:index.php?page=contato');
}

$data = $_POST['data'];

//Simula envio com sucesso
?>
<br>
<div class="alert alert-success" role="alert">Dados enviados com sucesso. Abaixo seguem os dados que você enviou.</div>

<ul class="list-unstyled">
	<li><b>Nome: </b> <?php echo $data['nome'];  ?> </li>
	<li><b>E-mail:</b> <?php echo  $data['email'];  ?></li>
	<li><b>Assunto:</b> <?php echo $data['assunto'];  ?></li>
	<li><b>Mensagem:</b> <?php echo $data['mensagem'];  ?></li>
</ul>
