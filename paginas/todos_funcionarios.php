<?php
    include_once '../php/all_pages.php';
?>
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-5" style="text-align: center">Todos Funcionarios</h4>

		
        <div class="row">
            <div class="col-sm-12 border-bottom">
                <span><strong>Funcionario</strong></span>                
            </div>
            
             <?php
                $funcionario = new Funcionario();
                $funcionario->listarTodosFuncionarios();
            ?>
            
        </div>
	</div>
</div>