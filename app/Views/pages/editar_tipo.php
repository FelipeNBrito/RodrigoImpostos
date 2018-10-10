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
		<div class="col-lg-8 col-md-6">
			<form role="form" action="/tipos/atualizar" method="post">
				<input type="hidden" name="id" value="<?php echo $this->params['tipo']->getId() ?>" />
				<div class="form-group">
					<label>Nome</label>
					<input class="form-control" name="nome" id="nome" value="<?php echo $this->params['tipo']->getNome() ?>">
				</div>
				<div class="form-group">
					<label>Percentual de Imposto</label>
					<input class="form-control" name="percentual" id="percentual" value="<?php echo $this->params['tipo']->getPercentualImposto() ?>">
				</div>

				<button type="submit" class="btn btn-default">Salvar</button>
			</form>
		</div>
	</div>
</div>
<!-- /#page-wrapper -->