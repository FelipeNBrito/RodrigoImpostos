<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Vendas
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-9 col-md-6">
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
					<tr>
						<th>Data</th>
						<th>Valor total</th>
						<th>Valor Impostos</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($this->params['vendas'] as $venda) {
						echo "<tr>";
						echo "<td>".$venda->getHoraVenda()."</td>";
						echo "<td>".$venda->getValorTotal()."</td>";
						echo "<td>".$venda->getValorImposto()."</td>";
						echo "<td>";
						echo "<a href=\"/vendas/deletar/".$venda->getId()."\" \"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
						echo "</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /#page-wrapper -->

