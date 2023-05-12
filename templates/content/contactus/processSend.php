<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST[$nombre])) {
        echo "<p class='alert alert-danger'>Agrega tu nombre</p>";
    }
    if (!empty($_POST[$email])) {
        echo "<p class='alert alert-danger'>Agrega tu correo</p>";
    }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="alert alert-danger mt-3">El correo es incorrecto</p>';
        }
    }
    if (!empty($_POST[$mensaje])) {
        echo "<p class='alert alert-danger'>Agrega tu mensaje</p>";
    } 

    $to = "espejo.erickson@gmail.com, ventas@bussineswebsite.com";
    $headers = "From: espejo.erickson@gmail.com\r\n"; 
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    if(mail($to,$nombre,$email,$mensaje)){
        echo "mail enviado";
        }else{
        $errorMessage = error_get_last()['msg'];
        echo $errorMessage;
    }
}



?>