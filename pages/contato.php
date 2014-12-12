<br>
<h1>Fale Conosco</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<form action="submit_contato" method="POST">
<div class="panel panel-default">
	<div class="panel-heading">Formulário de Contato</div>
	<div class="panel-body">
		<div class="row form-group">
			<div class="col-md-12">
				<label for="ContatoNome">Nome</label>
				<input type="text" required name="data[nome]" placeholder="Digite seu nome" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="">E-mail</label>
				<input type="email" required name="data[email]" placeholder="Digite seu e-mail" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="">Assunto</label>
				<select name="data[assunto]" required id="" class="form-control">
					<option value="">Selecione</option>
					<option value="Dúvidas">Dúvidas</option>
					<option value="Reclamações">Reclamações</option>
					<option value="Elogios">Elogios</option>
					<option value="Outros">Outros</option>
				</select>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label for="">Mensagem</label>
				<textarea required max-length="500" onfocusout="jQuery('#countWords').text(jQuery(this).val().length);" onkeypress="jQuery('#countWords').text(jQuery(this).val().length);"  name="data[mensagem]" placeholder="Digite sua mensagem" class="form-control"></textarea>
				Máximo de 500 caracteres. Digitados: <b id="countWords">0</b>
			</div>
		</div>

	</div>
	<div class="panel-footer"><button class="btn btn-primary">Enviar Mensagem</button></div>
</div>
</form>