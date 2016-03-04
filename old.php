<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	include 'admin/conex.php';
	include 'admin/classes/DatabaseClass.php';
	$database = new Database;
	/*Obtener los datos de la tabla generales*/
	$database->query("SELECT * FROM page_generales");
	$generales = $database->getOne();
	
	echo '<h1>'.$generales['email'].'<h1>';
	echo 'Excelente';
	?>

	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	        	<h4>Una excelente idea aguevo</h4>
	        </div>
	    </div>
	</div>

</body>
</html>