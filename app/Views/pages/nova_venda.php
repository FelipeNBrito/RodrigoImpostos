<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Venda
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-8 col-md-6">
			<input type="text" id="produtos" name="produtos" style="width: 70%;" >

            <br /><br />
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th>% Imposto</th>
                    <th>Valor dos Impostos</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <h5>Valor Total: R$ <div style="display: inline" id="valorTotal"></div> </h5>
            <h5>Valor Impostos: R$ <div style="display: inline" id="valorImposto"></div> </h5>

            <button onclick="salvarCompra()">Salvar Compra</button>
		</div>
	</div>
</div>
<!-- /#page-wrapper -->

<script>

    const table = $("#dataTables");
    let valorTotal = 0.00;
    let valorImposto = 0.00;

    $(document).ready(function() {
        $("#valorTotal").text(valorTotal);
        $("#valorImposto").text(valorImposto);

        $( "#produtos" ).autocomplete({
            source:  function (request, response) {
                $.getJSON("/produtos/json", function (data) {
                    response($.map(data, function (obj) {
                        return {
                            label: obj.nome,
                            value: obj.id
                        };
                    }));
                });
            },
            minLength: 2,
            select: function( event, ui ) {
                pegarDetalhesProduto(ui);
            }
        });
    });

    function pegarDetalhesProduto(obj) {
        const id = obj.item.value;
        let qntde = 1;

        $.getJSON( "/produtos/details/"+id, function( data ) {
            precoTotal = parseFloat(data.preco) * qntde;
            precoImpostos = (precoTotal * parseFloat(data.imposto)) / 100;

            valorTotal = valorTotal + precoTotal;
            valorImposto = valorImposto + precoImpostos;

            $("#valorTotal").text((valorTotal).toFixed(2));
            $("#valorImposto").text((valorImposto).toFixed(2));

            let linhaTabela = "<tr><td>" + data.nome + "</td>";
            linhaTabela += "<td><input type='number' id='qtde' value='1' step='1' min='0' /></td>";
            linhaTabela += "<td>"+ (data.preco) +"</td><td>" + precoTotal.toFixed(2) + "</td><td>" + data.imposto + "</td><td>" + (precoImpostos).toFixed(2) + "</td></tr>";
            $('#dataTables tr:last').after(linhaTabela);
        });
    }
    
    function updatePrices() {
        
    }
    
    function salvarCompra() {
        let arrayProdutos = [];
        for (var i = 1, row; row = table[0].rows[i]; i++) {
            const obj = new Object();
            obj.nome = row.cells[0].innerHTML;
            obj.qntde = row.cells[1].getElementsByTagName("input")[0].value;
            arrayProdutos.push(obj);
        }

        const jsonObj = JSON.stringify(arrayProdutos);

        $.ajax({
            type: "POST",
            url: "/vendas/salvar",
            data: jsonObj,
            success: function (data) {
                console.log(data);
            },
        });
    }
</script>