<?php
/**
 * Fixtures
 *
 * 1) Cria tabelas se nao existir
 * 2) Deleta registros do Banco
 * 3) Inclui registros
 */

require_once('database.php');


//Deleta Tabelas
deleteTable();

//Cria tabelas
createTable();

//cria registros
insert('paginas',array(
	'titulo'=>'Home',
	'conteudo'=>'      <div class="starter-template">
        <h1>Bem vindo ao site XY</h1>
        <p class="lead">Olá, seja bem vindo ao site exemplo do Curso: <b>Trilhando caminho com PHP</b>.</p>
      </div>',
	'rota'=>'home'
	));

insert('paginas',array(
	'titulo'=>'Empresa',
	'conteudo'=>'<br>
<h1>A Empresa</h1>
',
	'rota'=>'empresa'
	));


insert('paginas',array(
	'titulo'=>'Produtos',
	'conteudo'=>'<br>
<h1>Produtos From Database</h1>
',
	'rota'=>'produtos'
	));


insert('paginas',array(
	'titulo'=>'Serviços',
	'conteudo'=>'<br>
<h1>Serviços</h1>
',
	'rota'=>'servicos'
	));

