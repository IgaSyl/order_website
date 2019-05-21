<!doctype html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>order form mail</title>
    <!--<style type="text/css">   TUTAJ MOŻESZ OSTYLOAC INFO O WYSŁANEJ WIADOMOŚĆ
    </style>-->

</head>

<body>
    <?php
if(!$_POST) exit;
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$webType = trim($_POST['web-type']);
$colorPicker = trim($_POST['colorPicker']);
$colorDescription = trim($_POST['colorDescription']);
$webHeader = trim($_POST['webHeader']);
$contact = trim($_POST['contact']);
$aboutCompany = trim($_POST['aboutCompany']);
$additionalMenuEl = trim($_POST['additionalMenuEl']);
$rodo = trim($_POST['rodo']);
$googleMapKey = trim($_POST['googleMapKey']);
$attachedFileName =trim($_FILES['attachedFile']['name']);

$data=date("Y-m-d");
$czas=date("H:i");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';  

$mail = new PHPMailer;
// $mail->SMTPDebug = 2;

$mail->isSMTP(); 				
$mail->Host = 'smtp.gmail.com'; 		
$mail->SMTPAuth = true; 			
$mail->Username = 'iganowak02@gmail.com'; 
$mail->Password = 'phpmail1';			
$mail->SMTPSecure = 'tls';		
$mail->Port = 587;				
$mail->CharSet = "UTF-8";                       
$mail->SMTPOptions = array(
   'ssl' => array(
       'verify_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true
   )
);

$mail->From = 'iganowak02@gmail.com';		
$mail->FromName = 'Iga Sylwestrowicz';			
$mail->addAddress('iganowak02@gmail.com');	
$mail->isHTML(true);				
$mail->Subject = 'Mail wdrożeniowy: zamówienie projektu strony www.';
$mail->Body    = "
<html>
    <head>
        <style>
            h3{color:#a9022e; border-bottom: 1px solid black;width: 35%;}
            p{color: black;}
            .italic {font-style: italic;}
            .bold{font-weight: 600;}
        </style>
    </head>
    <body>
        <h2>: zamówienie projektu strony www.</h2>
        <p>data zamówienia:<b> $data </b>o godz. $czas</p>
        <h3>Typ strony responsywnej:</h3>
        <h4> $webType</h4>
        <h3>Szczegółowe wytyczne realizacji:</h3>
        <p><span class='bold' >1) Załączony plik:</span><br> $attachedFileName</p>
        <p><span class='bold' >2) Przewodni kolor:</span><br>  $colorPicker</p>
        <p><span class='bold' >3) Kolorystyka strony:</span><br> $colorDescription</p>
        <p><span class='bold' >4) Nagłówek strony:</span><br> $webHeader</p>
        <p><span class='bold' >5) Treść zakładki </span> <span class='italic'>Kontakt</span>:<br> $contact</p>
        <p><span class='bold' >6) Treść zakładki </span><span class='italic'>O firmie</span>:<br> $aboutCompany</p>
        <p><span class='bold' >7) Dodatkowe elementy menu:</span><br> $additionalMenuEl</p>
        <p><span class='bold' >8) RODO:</span><br> $rodo</p>
        <p><span class='bold' >9) GoogleMapKey:</span><br> $googleMapKey</p>
    </body>
</html>
";

if (!empty($_FILES['attachedFile']) &&
    $_FILES['attachedFile']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['attachedFile']['tmp_name'],
                         $_FILES['attachedFile']['name']);
}

if(!$mail->send()) {
    echo 'Wystąpił błąd podczas wysyłania wiadomości! Błąd: ' . $mail->ErrorInfo;
} else {					
	echo "<div class= 'container' id='success_page' style='border-bottom: 2px solid #a9022e'>";
    echo '<img src="./sources/img/logo.png" alt="logo" style="padding-bottom:100px"/>';
	echo "<h3>Dziękujemy za zamówienie strony WWW.</h3>";
	echo "</div>";
	
}

?>

</body>

</html>