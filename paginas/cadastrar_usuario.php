<?php
    include_once '../php/all_pages.php';
?>
<style>
    
</style>
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-5" style="text-align: center">Cadastrar Usuario</h4>

		
        <div class="row justify-content-center">
            <div class="form-group">
                <form action="php/processamento.php?acao=cadastrarUsuario" method="post" class="border p-5 border-dark rounded shadow">
                    <input type="text" name="nome" placeholder="Nome do Usuario" class="form-control" required><br>
                    <input type="text" name="cpf" placeholder="CPF" class="form-control" required><br>
                    <input type="text" name="telefone" placeholder="Telefone" class="form-control" required><br>
                    <input type="text" name="endereco" placeholder="Endereco" class="form-control" required><br>
                    <input type="text" name="funcionario" placeholder="Funcionario" class="form-control" required><br>
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </form>                
            </div>
        </div>
	</div>
</div>