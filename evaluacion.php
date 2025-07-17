<?php
$mailto = "noelap1961@gmail.com";
$subject = "Evaluación";
$message = "Valores entrados";
$header = "From: ".$_POST['email'];
foreach ($_POST as $key => $value)
{
   if (!is_array($value))
   {
      $message .= "\n".$key." : ".$value;
   }
   else
   {
      foreach ($_POST[$key] as $itemvalue)
      {
         $message .= "\n".$key." : ".$itemvalue;
      }
   }
}
mail($mailto, $subject, stripslashes($message), $header);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Evaluación</title>
<meta name="generator" content="WYSIWYG Web Builder 20 - https://www.wysiwygwebbuilder.com">
<link href="index.css" rel="stylesheet">
<link href="evaluacion.css" rel="stylesheet">
</head>
<body>
</body>
</html>