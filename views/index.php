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
	<link rel="stylesheet" type="text/css" href="/assets/vendor/css/demo_table_jui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/vendor/jquery-ui-1.8.16.custom/css/bootstrap/jquery-ui-1.8.16.custom.css" />
	<link rel="stylesheet" type="text/css" href="/assets/vendor/css/bootstrap.jui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/layout.css" />
	<style>
		td.warning {
			color:#C09853; background-color:#FCF8E3; border: 1px solid #FBEED5;
		}
	</style>

	<script type="text/javascript" src="/assets/vendor/js/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="/assets/vendor/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.js"></script>
	<script type="text/javascript" src="/assets/vendor/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
	$(function() {
		$.get(window.location.pathname + '/warnings/2012_01_26', function (data) {

			console.log(data);
			var html = '';
			$.each(data, function (index, item) {
				html += '<tr><td class="warning">' + item + '</span></td></tr>';
			});

			$('#logs').html(html);
		});
	});
	</script>
</head>

<body>

	<div class="topbar">
		<div class="fill">
			<div class="container">
				<a class="brand" href="#">Fire Log Viewer</a>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="content">
			<div class="page-header">
				<h1>Fire Log Viewer <small>The easiest way to view fuel logs</small></h1>
			</div>
			<div class="row" style="margin-left:0;">
				<div class="span4">
					<p>testing</p>
			    </div>
			    <div class="span8">
					<table>
					  <thead>
					    <tr>
					      <th>Logs</th>
					    </tr>
					  </thead>
					  <tbody id="logs"></tbody>
					</table>
				</div>
			</div>
		</div>

		<footer>
			<p>&copy; Keith Loy 2012</p>
		</footer>

	</div> <!-- /container -->

</body>
</html>
