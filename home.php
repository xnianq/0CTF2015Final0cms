<?php  
error_reporting(0);

@session_start();
posix_setuid(1000);

$fp = empty($_GET['fp']) ? 'fail' : $_GET['fp'];
if(preg_match('/\.\./',$fp))
{
	die('No No No!');
}
if(preg_match('/rm/i',$_SERVER["QUERY_STRING"]))
{
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jumbotron-narrow.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="header clearfix">
				<nav>
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="active"><a href="home.php?key=hduisa123">Home</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">pictures</h3>
			</div>

			<div class="jumbotron">
				<h1>Pictures Storage</h1>
				<p class="lead">在这里上传您的图片,我们将为您保存</p>
				<form action="?fp=upload" method="POST" id="form" enctype="multipart/form-data">
					<input type="file" id="image" name="image" class="btn btn-lg btn-success" style="margin-left: auto; margin-right: auto;">
					<br>
					<input type="submit" id="submit" name="submit" class="btn btn-lg btn-success" role="button" value="上传图片">
				</form>
			</div>
	   	</div> 
	</body>
</html>
<?php  
if($fp !== 'fail')
{
	if(!(include($fp.'.php')))
	{
		?>
		<div class="alert alert-danger" role="alert">文件不存在</div>
		<?php
			exit;
	}
}
?>

