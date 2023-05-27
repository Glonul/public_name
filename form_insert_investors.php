<?
require 'db.php';
$keys = $_GET['idprof']; // Уникальный ключ пользователя




$conn = new mysqli("localhost", "mhitroce_db", "9JkF*HOT", "mhitroce_db");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
?>
<?
if ($keys) {
    // Если пользователь авторизован
    echo '
    <meta http-equiv="content-type"  charset="utf-8"> 

<title>Платформа клуба F5 | Инвестирование: регистрация заявки</title>
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
    ';
     $db = mysql_connect("localhost", "mhitroce_db", "9JkF*HOT");
mysql_select_db("mhitroce_db", $db);
mysql_query('SET NAMES utf8');
    if (isset($_POST['title'])&&isset($_POST['telephone'])&&isset($_POST['conditions'])) {
       $title = $_POST['title'];
       $telephone = $_POST['telephone'];
       $conditions = $_POST['conditions'];
       
       
       $data = date("d.m.Y");
       
        if ($title == '') {
           echo '
           <meta http-equiv="refresh" content="0;URL=investors.php?idprof='.$keys.'">
           <script>
           alert ("Забыли ввести название компании или свое ФИО");
           </script>';
       }
       elseif ($conditions == '') {
           echo '
           <meta http-equiv="refresh" content="0;URL=investors.php?idprof='.$keys.'">
           <script>
           alert ("Забыли ввести условия инвестирования");
           </script>';
       }else {
       
         $db_host = "localhost"; 
    $db_user = "mhitroce_db"; // Логин БД
    $db_password = "9JkF*HOT"; // Пароль БД
    $db_base = 'mhitroce_db'; // Имя БД
    $db_table = "INVESTORS"; // Имя Таблицы БД
 // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
    mysqli_query($mysqli, "SET NAMES 'utf8'");
   
$sql = $mysqli->query("INSERT INTO ".$db_table." (title, telephone, conditions, data) VALUES ('$title', '$telephone', '$conditions', '$data')");
if ($sql == TRUE) {
echo '<meta http-equiv="refresh" content="0;URL=investors.php?idprof='.$keys.'">
<script>
alert ("Ваша заявка зарегистрирована. В течении 2-3 часов Вам перезвонит наш коммерческий директор по телефону, который Вы указали в заявке ('.$telephone.').");
</script>
';
}
    }
    }
    
}elseif ($keys == '') {
  // Если пользователь не авторизован  
  
  echo '
    <meta http-equiv="content-type"  charset="utf-8"> 
<title>Платформа клуба F5 | Инвестирование: регистрация заявки</title>
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
    ';
    $db = mysql_connect("localhost", "mhitroce_db", "9JkF*HOT");
mysql_select_db("mhitroce_db", $db);
mysql_query('SET NAMES utf8');
    if (isset($_POST['title'])&&isset($_POST['telephone'])&&isset($_POST['conditions'])) {
       $title = $_POST['title'];
       $telephone = $_POST['telephone'];
       $conditions = $_POST['conditions'];
       
       
       $data = date("d.m.Y");
       
       if ($fio == '') {
           echo '<script>
           alert ("Забыли ввести ФИО");
           </script>
           <meta http-equiv="refresh" content="0;URL=investors.php">
           ';
       }
       elseif ($text == '') {
           echo '<script>
           alert ("Забыли ввести содержание отзыва");
           </script>
           <meta http-equiv="refresh" content="0;URL=investors.php">
           ';
       }else {
       
         $db_host = "localhost"; 
    $db_user = "mhitroce_db"; // Логин БД
    $db_password = "9JkF*HOT"; // Пароль БД
    $db_base = 'mhitroce_db'; // Имя БД
    $db_table = "INVESTORS"; // Имя Таблицы БД
 // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
    mysqli_query($mysqli, "SET NAMES 'utf8'");
   
$sql = $mysqli->query("INSERT INTO ".$db_table." (title, telephone, conditions, data) VALUES ('$title', '$telephone', '$conditions', '$data')");
if ($sql == TRUE) {
echo '<meta http-equiv="refresh" content="0;URL=investors.php">
<script>
alert ("Ваша заявка зарегистрирована. В течении 2-3 часов Вам перезвонит наш коммерческий директор по телефону, который Вы указали в заявке ('.$telephone.').");
</script>
';
}
    }
}
}
?>




