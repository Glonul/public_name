<?
require 'db.php';

$conn = new mysqli("localhost", "mhitroce_db", "9JkF*HOT", "mhitroce_db");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>
<meta http-equiv="content-type"  charset="utf-8"> 

<title>Платформа клуба F5 | Форма восстановления пароля: поиск аккаунта.</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<style>
    p.zug {
         width:auto;
         padding:2%;
          animation: pulse 1s infinite;
          
          height:50px;
          text-align:center;
    }
    @keyframes pulse{
  0%{
    opacity: 1;
  }
  50%{
    opacity: 0;
  }
  100%{
    opacity: 1;
  }
}
</style>

<?
if (isset($_POST['email'])) {
    
    $db_host='localhost'; // ваш хост
$db_name='mhitroce_db'; // ваша бд
$db_user='mhitroce_db'; // пользователь бд
$db_pass='9JkF*HOT'; // пароль к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query("SELECT * FROM `users` WHERE email = '$email'"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
   
  $vp = password_verify($row['password']); 
 
}
    
    
    
    // несколько получателей
$to = ''.$email.''; // обратите внимание на запятую

// тема письма
$subject = 'Восстановление пароля';

// текст письма
$message = '
<html>
<head>
  <title>Восстановление пароля</title>
</head>
<body>
  <p>Здравствуйте! Вы подали заявку на восстановление пароля. Вот Ваш пароль: '.$vp.'</p>
 
</body>
</html>
';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


// Отправляем
mail($to, $subject, $message, $headers);
    
    if (mail == TRUE) {
        echo '
        <script>
        alert ("Мы отправили Вам письмо с паролем!");
        </script>
         <meta http-equiv="refresh" content="0; url=http://mhitroce.beget.tech/authorization/vpass.php" />
            
        ';
    }
    
}
?>