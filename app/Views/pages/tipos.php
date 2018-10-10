<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tipos
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
					<th>Tipo</th>
					<th>Percentual de Impostos</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
					<?php

						foreach ($this->params['tipos'] as $tipo) {
							echo "<tr>";
							echo "<td>".$tipo->getNome()."</td>";
							echo "<td>".$tipo->getPercentualImposto()."</td>";
							echo "<td>";
							echo "<a href=\"/tipos/editar/".$tipo->getId()."\" \"><i class=\"fa fa-pen\" aria-hidden=\"true\"></i></a>";
							echo "<a href=\"/tipos/deletar/".$tipo->getId()."\" \"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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

