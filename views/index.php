<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8>
  <title>Fire Log Viewer</title>
  <link rel="stylesheet" href="/assets/fire_assets/application.css" type="text/css" charset="utf-8">
  <script src="/assets/fire_assets/application.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8">
    var jQuery  = require("jqueryify");
    var exports = this;
    jQuery(function(){
      var App = require("index");
      exports.app = new App({el: $("body")});
    });
  </script>
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
        <li><a>2011</a></li>
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
      <p>&copy; Keith Loy 2012</p>
    </footer>
  </div>
</div>
</body>
</html>