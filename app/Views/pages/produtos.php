<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos
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
                    <th>Produto</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach ($this->params['produtos'] as $produto) {
					echo "<tr>";
					echo "<td>".$produto->getNome()."</td>";
					echo "<td>".$produto->getPreco()."</td>";
					echo "<td>";
					echo "<a href=\"/produtos/editar/".$produto->getId()."\" \"><i class=\"fa fa-pen\" aria-hidden=\"true\"></i></a>";
					echo "<a href=\"/produtos/deletar/".$produto->getId()."\" \"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>";
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

