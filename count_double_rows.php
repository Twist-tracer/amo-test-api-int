<?php
function parse_csv($file) {
    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
        $num_2 = 0;
        $all_data = [];
        $count_doubles = 0;
        $rows = '';
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            $row++;
            if(array_search($data, $all_data)) { $fill = 'class="warning"'; $count_doubles++; }
            else $fill = '';
            $cells = '';
            $cells .= '<td>'.$num_2.'</td>';
            for ($c = 0; $c < $num; $c++) {
                $cells .= '<td>'.$data[$c] . '</td>';
            }
            $all_data[] = $data;
            $rows .= '<tr '.$fill.'>'.$cells.'</tr>';
            $num_2++;
        }
        fclose($handle);
    }

    return['count' => 'Найдено дублей: '.$count_doubles, 'table' => '<table class="table table table-bordered"'.$rows.'</table>'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Twist Tracer" />
    <title>Поиск дублирующихся строк</title>

    <!-- Bootstrap -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                            <li><a href="http://test.loc">amoCRM API interface</a></li>
                            <li><a href="http://test.loc?page=test_ajax">Host for test ajax requests</a></li>
                            <li class="active"><a href="http://test.loc/count_double_rows.php">Подсчет одинаковых строк <span class="sr-only">(current)</span></a></li>
                            <li><a href="http://test.loc/Логирование.txt">Шаблоны для логирования</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-default">Подсчитать и вывести</button>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_FILES['file']['tmp_name'])) {
                    $result = parse_csv($_FILES['file']['tmp_name']);
                }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <?php echo isset($result['count']) ? $result['count'] : ''?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" style="max-height: 625px">
                        <?php echo isset($result['table']) ? $result['table'] : ''?>
                    </div>
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
