<?php
    include_once '../php/all_pages.php';
?>
<div class="panel panel-default">
	<div class="panel-body">
		<h4 class="mb-5" style="text-align: center">Todos Carros</h4>

		
        <div class="row">
            <div class="col-sm-6 border-bottom">
                <span><strong>Carros</strong></span>                
            </div>
            <div class="col-sm-6 border-bottom">
                <span><strong>Situacao</strong></span>                
            </div>
             <?php
                $carro = new Carro();
                $carro->listarTodosCarros();
            ?>
            
        </div>
	</div>
</div>