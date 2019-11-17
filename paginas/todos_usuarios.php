<?php
    include_once '../php/all_pages.php';
?>
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-5" style="text-align: center">Todos Usuarios</h4>

		
        <div class="row">
            <div class="col-sm-12 border-bottom">
                <span><strong>Usuario</strong></span>                
            </div>
            
             <?php
                $usuario = new Usuario();
                $usuario->listarTodosUsuarios();
            ?>
            
        </div>
	</div>
</div>