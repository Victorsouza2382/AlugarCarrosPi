<?php
    include_once '../php/all_pages.php';
?>
<style>
    
</style>
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-5" style="text-align: center">Receber Carro</h4>

		
        <div class="row justify-content-center">
            <div class="form-group">
                <form action="php/processamento.php?acao=receberCarro" method="post" class="border p-5 border-dark rounded shadow" enctype="multipart/form-data">
                    <input type="text" name="usuario" placeholder="Usuario" class="form-control" required><br>
                    <input type="text" name="placa" placeholder="Placa" class="form-control" required><br>
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </form>                
            </div>
        </div>
	</div>
</div>