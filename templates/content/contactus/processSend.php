<?php

error_reporting(-1);
ini_set('display_errors', 'On');
$msgClass = 'errorDiv';
if (isset($_POST['submit'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];
}
if (!empty($name) && !empty($email) && !empty($mensaje)) {
    echo '<p class="alert alert-danger">Hay errores en el formulario, intente de nuevo.</p>';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
        echo 'Por favor ingresa un correo valido';
    } 
    
}
$headers = "FROM: ventas@bussineswebsite.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n" ;
$headers .= "Content-Type: text/html; charset=utf-8\r\n"; 
if(mail($nombre, $email, $mensaje,$headers)){
	echo "mail enviado correntamente";
	}else{
	$errorMessage = error_get_last()['msg'];
	echo $errorMessage;
}

?>