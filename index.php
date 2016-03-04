<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Bootstrap 3.3.1 -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <style>

      .diff td{
        padding:0 0.667em;
        vertical-align:top;
        white-space:pre;
        white-space:pre-wrap;
        font-family:Consolas,'Courier New',Courier,monospace;
        font-size:0.75em;
        line-height:1.333;
      }

      .diff span{
        display:block;
        min-height:1.333em;
        margin-top:-1px;
        padding:0 3px;
      }

      * html .diff span{
        height:1.333em;
      }

      .diff span:first-child{
        margin-top:0;
      }

      .diffDeleted span{
        border:1px solid rgb(255,192,192);
        background:rgb(255,224,224);
      }

      .diffInserted span{
        border:1px solid rgb(192,255,192);
        background:rgb(224,255,224);
      }

      #toStringOutput{
        margin:0 2em 2em;
      }

    </style>
</head>
<body>
	
<?php 
require 'classes/DiffClass.php'; 

  //MOSTRAR QUE FUE LO QUE CAMBIO
  // compare two files line by line
  // use the defaults only for compare and display what change
  echo Diff::toTable(Diff::compareFiles('old.php', 'new.php'));


  //SI EXISTEN CAMBIOS
  if( Diff::haveChanges( 'old.php', 'new.php' ) )
  {
    //ESCRIBIR UN ARCHIVO ACTUALIZADO CON LOS CAMBIOS
    //and use the ...Clean( functions to write a clean updated file without double lines and other issues.
    echo '<hr>';
    echo '<h1>Se encontraron cambios</h1><br>';
    echo '<hr>';
  	$fp = fopen('salida.php', 'w');
  	$new_file = trim( Diff::toMerge(Diff::compareFilesToCleanOutput('old.php', 'new.php')) );
  	fwrite($fp, $new_file );
  }
  else
  {
    echo '<h3>NO Se encontraron cambios</h3><br>';
  }

?>


</body>
</html>