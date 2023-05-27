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
$keys = $_GET['idprof'];



$db_host='localhost'; // ваш хост
$db_name='mhitroce_db'; // ваша бд
$db_user='mhitroce_db'; // пользователь бд
$db_pass='9JkF*HOT'; // пароль к бд

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку
$result = $mysqli->query("SELECT * FROM `news` ORDER BY id DESC"); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
$news = '?idprof='.$keys.'&&idn='.$row['id'].'';

echo '<div class="bl_news">

<div class="im-bl_news">
<img class="image_news" src="lk_platform/news/'.$row['img'].'">
</div>
<div class="inf-bl_news">
<p><span class="date_news">'.$row['data'].'</span></p>
<p><a class="t_news" href="news_info.php'.$news.'"><span class="title_news"><b>'.$row['title'].'</b></span></a></p>

<div class="op_inf-bl_news">
'.$row['text'].'
</div>

</div>

</div>';

}
?>