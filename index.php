<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<head>
	<meta charset="utf-8">
	<title>Антиплагіат</title>
	<style type="text/css">
		body{
			background-image: url("./72.png");
			background-size: cover;
		}
		div{
			margin-top: 20px;
			padding-left: 400px;
		}
		#form{
			margin-right: 600px;
		}
		#btn{
			margin-top: 10px;
		}

	</style>
</head>

<body>
<div>
<h3><b>Виберіть файл тесту для перевірки на унікальність(.txt)</b></h3>
<form action="index.php" method="get" enctype="multipart/form-data" id="form">
    <input type="file" name="example" class="form-control form-control-lg" accept=".txt">
	<button type="submit" name="button" id="btn"class="btn btn-primary">Перевірити</button>
</form>
	<h4>Відсоток плагіату:
	<?php
	require_once "shingles.php";

	$source1 = file_get_contents('./old.txt',FILE_USE_INCLUDE_PATH);
	$source1 = explode("\r",$source1);

	$source2 = file_get_contents($_GET['example'],FILE_USE_INCLUDE_PATH);
	$source2 = explode("\r",$source2);
	
	$shingles = new Shingles();
	echo $shingles->analyze($source1, $source2);
	?>
	%</h4>
</div>
</body>
</html>




