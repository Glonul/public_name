<HEAD>
     <link rel="shortcut icon" href="images/logo.png">
<link rel="stylesheet" href="css/module.css">
<link rel="stylesheet" href="css/device.css">
<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/popup.css">
</HEAD>
<body>
<?
require 'db.php';

$db_host='localhost'; // ваш хост
$db_name='mhitroce_db'; // ваша бд
$db_user='mhitroce_db'; // пользователь бд
$db_pass='9JkF*HOT'; // пароль к бд

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query("SELECT * FROM `reviews` ORDER BY id DESC"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    $ocenka = $row['ocenka'];
    if ($ocenka == '1') {
       $s_ocenka = "&#9733;"; 
    }
     if ($ocenka == '2') {
       $s_ocenka = "&#9733;&#9733;"; 
    }
     if ($ocenka == '3') {
       $s_ocenka = "&#9733;&#9733;&#9733;"; 
    }
     if ($ocenka == '4') {
       $s_ocenka = "&#9733;&#9733;&#9733;&#9733;"; 
    }
     if ($ocenka == '5') {
       $s_ocenka = "&#9733;&#9733;&#9733;&#9733;&#9733;"; 
    }
echo '
<!-- ШАБЛОН КОММЕНТАРИЯ -->
<div class="maket_comments">
<p class="f_mes"><span class="sp_client">'.$row['fio'].' </span> <span class="sp_el">ОЦЕНКА <i class="pl_ht">'.$s_ocenka.'</i></span> <span class="sp_dt"><b>'.$row['data'].'</b></span></p>

<p class="in_mes">'.$row['text'].'</p>

<p class="meneger_pr"><span class="dr_pr">ПРЕИМУЩЕСТВА:</span> '.$row['pr'].'</p>
<p class="meneger_ned"><span class="dr_pr">НЕДОСТАТКИ:</span> '.$row['nd'].'</p>
</div>
<!-- END MAKETS COMMENTS -->
';
}
?>
</body>