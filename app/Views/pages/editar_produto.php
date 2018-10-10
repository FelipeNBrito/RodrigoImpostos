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
		<div class="col-lg-8 col-md-6">
			<form role="form" action="/produtos/atualizar" method="post">
				<input type="hidden" name="id" value="<?php echo $this->params['produto']->getId() ?>">
				<div class="form-group">
					<label>Nome</label>
					<input class="form-control" name="nome" id="nome" value="<?php echo $this->params['produto']->getNome() ?>">
					<p class="help-block">Nome do produto</p>
				</div>
				<div class="form-group">
					<label>Preço</label>
					<input class="form-control" name="preco" id="preco" value="<?php echo $this->params['produto']->getPreco() ?>">
					<p class="help-block">Preço, em reais</p>
				</div>
				<div class="form-group">
					<label>Tipo do produto</label>
					<select class="form-control" name="tipo_id">
						<?php
						foreach($this->params['tipos'] as $tipo) {
							echo "<option value=\"".$tipo->getId()."\" ";
							if($tipo->getId() == $this->params['produto']->getTipo()) echo 'elected="selected"'.">";
							echo $tipo->getNome();
							echo "</option>";
						}
						?>
					</select>
				</div>

				<button type="submit" class="btn btn-default">Salvar</button>
			</form>
		</div>
	</div>
</div>
<!-- /#page-wrapper -->