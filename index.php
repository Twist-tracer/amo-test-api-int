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
					<li class="active"><a href="#">amoCRM API interface <span class="sr-only">(current)</span></a></li>
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
			<button type="button" class="btn btn-default">Отправить запрос</button>
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
						<code class="php">
$leads['request']['leads']['add']=array(
  array(
    'name'=>'Deal for buying a cow',
    //'date_create'=>1298904164, //optional
    'status_id'=>142,
    'price'=>300000,
    'responsible_user_id'=>215302,
    'tags' => 'Important, USA', #Теги
    'custom_fields'=>array(
      array(
        'id'=>427496, # id поля типа multiselect
        'values'=>array( # id значений передаются в массиве values через запятую
            1240665,
            1240664
        )
      ),
      array(
        'id'=>427497, # id поля типа radiobutton
        'values'=>array(
          array(
            'value'=>1240667
          )
        )
      ),
      array(
        'id'=>427231, # id поля типа date
        'values'=>array(
          array(
            'value'=>'14.06.2014' # в качестве разделителя используется точка
          )
        )
      ),
      array(
        #Смарт адрес
        'id'=>458615, #Уникальный индентификатор заполняемого дополнительного поля
        'values'=>array(
          array(
            'value' => 'Address line 1',
            'subtype' => 'address_line_1',
          ),
          array(
            'value' => 'Address line 2',
            'subtype' => 'address_line_2',
          ),
          array(
            'value' => 'Город',
            'subtype' => 'city',
          ),
          array(
            'value' => 'Регион',
            'subtype' => 'state',
          ),
          array(
            'value' => '203',
            'subtype' => 'zip',
          ),
          array(
            'value' => 'RU',
            'subtype' => 'country',
          )
        )
      )
    )
  ),
  array(
    'name'=>'Deal for sailing a horse',
    //'date_create'=>1298904164, //optional
    'status_id'=>7087609,
    'price'=>600200,
    'responsible_user_id'=>215309,
    'custom_fields'=>array(
      array(
        #Нестандартное дополнительное поле типа "мультисписок", которое мы создали
        'id'=>426106,
        'values'=>array(
          1237756,
          1237758
        )
      )
    )
  )
);
						</code>
					</pre>
				</div>
			</div>
		</div>
		<div class="response col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Response</h3>
				</div>
				<div class="panel-body">
					<pre>
						<code class="json">
{
"response":  {
  "leads":  {
    "add":  [
    {
      "id":  3655494,
      "request_id":  0
    },
    {
      "id":  3655495,
      "request_id":  1
    }
  ]
  },
  "server_time":  1374756396
}
}
						</code>
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
</body>
</html>