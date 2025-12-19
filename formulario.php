
<?php
function validateEmail($email)
{
   return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
function replaceVariables($code)
{
   foreach ($_POST as $key => $value)
   {
      if (is_array($value))
      {
         $value = implode(",", $value);
      }
      $name = "$" . $key;
      $code = str_replace($name, $value, $code);
   }
   $code = str_replace('$ipaddress', $_SERVER['REMOTE_ADDR'], $code);
   return $code;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'layoutgrid4')
{
   $mailto = 'noelap1961@gmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Website form';
   $message = 'Values submitted from website form:';
   $success_url = './gracias.html';
   $error_url = './energia.html';
   $autoresponder_from = '';
   $autoresponder_to = isset($_POST['email']) ? $_POST['email'] : $mailfrom;
   $autoresponder_subject = '';
   $autoresponder_message = '';
   $eol = "\r\n";
   $error = '';
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response", "h-captcha-response");
   try
   {
      $boundary = md5(uniqid(time()));
      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
      $header .= 'MIME-Version: 1.0'.$eol;
      $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
      $header .= 'X-Mailer: PHP v'.phpversion().$eol;

      if (!validateEmail($mailfrom))
      {
         $error .= "The specified email address (" . $mailfrom . ") is invalid!\n<br>";
         throw new Exception($error);
      }
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
         }
      }
      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
         foreach ($_FILES as $key => $value)
         {
             if ($_FILES[$key]['error'] == 0)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      $autoresponder_header  = 'From: '.$autoresponder_from.$eol;
      $autoresponder_header .= 'Reply-To: '.$autoresponder_from.$eol;
      $autoresponder_header .= 'MIME-Version: 1.0'.$eol;
      $autoresponder_header .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
      $autoresponder_header .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $autoresponder_header .= 'X-Mailer: PHP v'.phpversion().$eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $autoresponder_message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $autoresponder_message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }

      mail($autoresponder_to, $autoresponder_subject, $autoresponder_message, $autoresponder_header);
      $successcode = file_get_contents($success_url);
      $successcode = replaceVariables($successcode);
      echo $successcode;
   }
   catch (Exception $e)
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $e->getMessage(), $errorcode);
      echo $errorcode;
   }
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Equipos Electrodomésticos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/elmol.css" rel="stylesheet">
<link href="css/formulario.css" rel="stylesheet">
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/wb.parallax.min.js"></script>
<script>
$(document).ready(function()
{
   $('#wb_LayoutGrid4').parallax();
});
</script>


</head>
<body>
<div id="wb_LayoutGrid4">
<form name="plantilla" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="LayoutGrid4">
<input type="hidden" name="formid" value="layoutgrid4">
<div class="col-1">
<div id="wb_LayoutGrid6">
<div id="LayoutGrid6">
<div class="col-1">
<div id="wb_ResponsiveMenu1">
<label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Menu<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
<input type="checkbox" id="ResponsiveMenu1-submenu">
<ul class="ResponsiveMenu1" id="ResponsiveMenu1" role="menu">
<li role="menuitem"><a href="./index.html" class="nav-link"><i class="fa fa-home"></i><br>Inicio</a></li>
<li role="menuitem">
<label for="ResponsiveMenu1-submenu-0" class="toggle"><i class="fa fa-television"></i>Equipos<span class="arrow-down"></span></label>
<a href="./energia.html#batBookmark2" class="nav-link"><i class="fa fa-television"></i><br>Equipos<span class="arrow-down"></span></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-0">
<ul role="menu">
<li role="menuitem"><a href="./energia.html#genBookmark2" title="Generadores, convertidores, cargadores, baterias..." class="nav-link">Útiles&nbsp;de&nbsp;energía</a></li>
<li role="menuitem"><a href="" title="Ollas Reina, Arroceras, ollas de presión,  calderos...." class="nav-link">Útiles&nbsp;de&nbsp;cocina&nbsp;pequeños</a></li>
<li role="menuitem"><a href="" title="Fogón de gas, neveras, refrigeradores..." class="nav-link">Útiles&nbsp;de&nbsp;cocina&nbsp;grandes</a></li>
<li role="menuitem"><a href="" title="Neveras, refrigeradores, máquinas para refrigeradores" class="nav-link">Útiles&nbsp;de&nbsp;Refrigeración</a></li>
<li role="menuitem"><a href="" title="SPLITs, ventiladores, ventiladores recargablas..." class="nav-link">Ventilación</a></li>
<li role="menuitem"><a href="" title="TVs, bases y cajitas decodificadoras" class="nav-link">TVs&nbsp;y&nbsp;Utensilios</a></li>
</ul>
</li>
<li role="menuitem"><a href="#contacto_Bookmark1" title="Como contactarnos..." class="nav-link"><i class="fa fa-user"></i><br>Contactos</a></li>
</ul>

</div>
</div>
</div>
</div>
<div id="wb_Text1">
<span style="color:#000000;font-family:Impact;font-size:29px;">Formulario para encargar equipos </span>
</div>

<div id="wb_LayoutGrid5">
<div id="LayoutGrid5">
<div class="col-1">
<label for="" id="Label1">Nombre y Apellidos</label>
<input type="text" id="Editbox1" name="nombre" value="" maxlength="60" spellcheck="false" required placeholder="Nombre y Apellidos">
<label for="" id="Label2">Dirección particular</label>
<input type="text" id="Editbox4" name="direccion" value="" maxlength="60" spellcheck="false" required placeholder="Dirección particular">
<label for="" id="Label3">Carné de Identidad</label>
<input type="text" id="Editbox2" name="ci" value="" maxlength="11" spellcheck="false" required placeholder="Carné de Indentidad">
<label for="" id="Label4">Teléfono de Contacto</label>
<input type="text" id="Editbox3" name="telf" value="" maxlength="8" spellcheck="false" required placeholder="Teléfono de contacto">
<label for="" id="Label5">Municipio de residencia</label>
<select name="munic" size="1" id="Select1" required title="Municipio">
<option selected value="Cienfuegos">Cienfuegos</option>
<option value="Abreus">Abreus</option>
<option value="Aguada">Aguada</option>
<option value="Cruces">Cruces</option>
<option value="Cumanayagua">Cumanayagua</option>
<option value="Lajas">Lajas</option>
<option value="Palmira">Palmira</option>
<option value="Rodas">Rodas</option>
</select>
</div>
</div>
</div>
<div id="wb_LayoutGrid1">
<div id="LayoutGrid1">
<div class="col-1">
<input type="submit" id="Button1" name="submit" value="Encargar">
</div>
</div>
</div>
</div>
</form>
</div>
<div id="upStickyLayer">
<div id="wb_upIcon">
<a href="#LayoutGrid6"><div id="upIcon"><i class="fa fa-arrow-up"></i></div></a></div>
</div>
</body>
</html>