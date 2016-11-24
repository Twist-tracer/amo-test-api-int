<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Twist Tracer" />
    <title>Консоль</title>

    <!-- Bootstrap -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Highlight.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <link rel="stylesheet" type="text/css" href="styles/main.css" />
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">Навигация</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="http://test.loc">amoCRM API interface <span class="sr-only">(current)</span></a></li>
                        <li><a href="http://test.loc?page=test_ajax">Host for test ajax requests</a></li>
                        <li><a href="http://test.loc/count_double_rows.php">Подсчет одинаковых строк</a></li>
                        <li><a href="http://test.loc/Логирование.txt">Шаблоны для логирования</a></li>
                    </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row submit-btn-wrap">
		<div class="col-md-10 col-md-offset-1">
			<button type="button" id="send-request" class="btn btn-default">Отправить запрос</button>
		</div>
	</div>
	<div class="row">
		<div class="request col-md-5 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Request</h3>
				</div>
				<div class="panel-body">
					<pre>
						<code id="request" class="php"><?=$request_str?></code>
					</pre>
				</div>
			</div>
		</div>
		<div class="response col-md-5">
			<div id="response-panel" class="panel panel-<?=$status?>">
				<div class="panel-heading">
					<h3 class="panel-title">Response</h3>
				</div>
				<div class="panel-body">
					<pre>
						<code id="response" class="json"></code>
					</pre>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script src="js/main.js"></script>
</body>
</html>