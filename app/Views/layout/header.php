<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Vendas de produtos e seus impostos</title>

	<!-- Bootstrap Core CSS -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="/assets/css/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="/assets/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/assets/css/jquery-ui.theme.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="/assets/js/jquery.min.js"></script>
</head>

<body>

<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Vendas</a>
		</div>
		<!-- /.navbar-header -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						<a href="/"><i class="fa fa-dashboard fa-fw"></i> Home</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Produtos<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/produtos/">Lista de Produtos</a>
							</li>
							<li>
								<a href="/produtos/novo">Novo produto</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Tipos<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="/tipos/">Lista de Tipos</a>
							</li>
							<li>
								<a href="/tipos/novo">Novo Tipo</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Vendas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/vendas/">Lista de Vendas</a>
                            </li>
                            <li>
                                <a href="/vendas/nova">Nova Venda</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>