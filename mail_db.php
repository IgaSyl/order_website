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
        <h2>Zamówienie projektu strony www</h2>
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
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
                $connect_to_db = new PDO('mysql:host=localhost; dbname=form; charset=utf8', 'root', 'admin');
                $connect_to_db -> exec("SET NAMES 'utf8'");
                $connect_to_db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //setAttribute -> błędy w zapytaniach raportowane jako wyjątki.
        //Operator wywołania `` -> uruchamia zew programy lub polecenia powłoki       
        // prepare() robie szkielet zapytania
        $new_orderValues = 'INSERT INTO `formularz` (`webType`, `attachedFileName`, `colorPicker`, `colorDescription`, `webHeader`, `contact`, `aboutCompany`, `additionalMenuEl`, `rodo`, `googleMapKey`, `created`) VALUES(
            
            :webType,
            :attachedFileName,
            :colorPicker,
            :colorDescription,
            :webHeader, 
            :contact, 
            :aboutCompany, 
            :additionalMenuEl,
            :rodo,
            :googleMapKey,
            NOW())';
        
        $new_order = $connect_to_db -> prepare($new_orderValues);
        
        $new_order -> bindValue(':webType', $webType, PDO::PARAM_STR);
        $new_order -> bindValue(':attachedFileName', $attachedFileName, PDO::PARAM_STR);
        $new_order -> bindValue(':colorPicker', $colorPicker, PDO::PARAM_STR);
        $new_order -> bindValue(':colorDescription', $colorDescription, PDO::PARAM_STR);
        $new_order -> bindValue(':webHeader', $webHeader, PDO::PARAM_STR);
        $new_order -> bindValue(':contact', $contact, PDO::PARAM_STR);
        $new_order -> bindValue(':aboutCompany', $aboutCompany, PDO::PARAM_STR); 
        $new_order -> bindValue(':additionalMenuEl', $additionalMenuEl, PDO::PARAM_STR); 
        $new_order -> bindValue(':rodo', $rodo); 
        $new_order -> bindValue(':googleMapKey', $googleMapKey, PDO::PARAM_STR);
        
        $new_order -> execute();
        $orderNo = $connect_to_db->lastInsertId();
                
                
                echo "<div class= 'container'>";
                echo "<p>Przystępujemy do wdrożenia serwisu internetowego.</p>";
                
                echo "<p>zamówienie nr: $orderNo</p>";
                echo "<p>data zamówienia: <b>$data</b> o godzinie $czas</p>";
                echo "<p style='margin-top: 20px;'>pozdrawiamy,<br>
                Dział Serwisu i Wdrożeń <br>
                Galactica</p>";
                echo "</div>";
                
                }else{
                    echo "proszę uzupełnić formularz i wysłać";
                }
            }
                
            catch(PDOException $e){
                echo "połączenie z bazą nieudane "; 
                exit;  		
                }
        
                /* tą obsługę błędu nie wiem jak napisać s.61 */
        /*
            $new_orderValues1 = 'SELECT id, webType, colorPicker, colorDescription, webHeader, contact, aboutCompany, additionalMenuEl, rodo, googleMapKey, created
                                FROM formularz
                                WHERE id = formularz_id';
                                      // co to????
           try {
               $new_order1 = $connect_to_db -> prepare($new_orderValues1);
               if($new_order1){
                   $new_order1-> execute(array(
                       "formularz_id"=> 1)
                   );
                   $form= $new_order1->fetch();
               }
           }         catch(PDOException $e){
            echo "połączenie z bazą nieudane: " .$e->getMessage(); 
           }
        
?>

</body>

</html>