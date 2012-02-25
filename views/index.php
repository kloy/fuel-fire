<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Example Page</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="http://dev.courthouse.local/assets/vendor/js/html5.js?1327890888"></script>
	<![endif]-->

	<!-- Le styles -->
	<link rel="stylesheet" type="text/css" href="/assets/fire_assets/css/demo_table_jui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/fire_assets/css/custom-theme/jquery-ui-1.8.16.custom.css" />
	<link rel="stylesheet" type="text/css" href="/assets/fire_assets/bootstrap/bootstrap.css" />
	<style>
		body {
			padding-top: 60px;
		}
		td.warning {
			color:#C09853 !important;
			background-color:#FCF8E3 !important;
			border: 1px solid #FBEED5 !important;
		}
	</style>

	<script type="text/javascript" src="/assets/fire_assets/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/assets/fire_assets/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="/assets/fire_assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="/assets/fire_assets/js/app.js"></script>
</head>

<body>

<div class="topbar">
	<div class="topbar-inner">
		<div class="container-fluid">
		<a class="brand" href="#">Fire Log Viewer</a>
		<ul class="nav">
			<li class="active"><a href="#">Errors</a></li>
			<li><a href="#about">Warnings</a></li>
			<li><a href="#contact">Info</a></li>
			<li><a href="#contact">Other</a></li>
		</ul>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="sidebar">
		<div class="well">
			<h5 id="ymd" data-api="years">Years</h5>
			<ul id="ymd-list">
				<?php foreach($years as $year): ?>
				<li><a href="#"><?php echo $year['year'] ?></a></li>
				<? endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="content">
		<!-- Main hero unit for a primary marketing message or call to action -->
			<ul class="breadcrumb">
			  <li><a href="#">Year: <span class="crumb-val">2012</span></a> <span class="divider">/</span></li>
			  <li><a href="#">Month: <span class="crumb-val">January</span></a> <span class="divider">/</span></li>
			  <li class="active">Day: <span class="crumb-val">1</span></li>
			</ul>
			<div>
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead><tr><th>Logs</th></tr></thead>
					<tbody id="logs"></tbody>
					<tfoot><tr><th>Logs</th></tr></tfoot>
				</table>
			</div>

		<footer>
			<p>&copy; Company 2011</p>
		</footer>
	</div>
</div>

</body>
</html>
